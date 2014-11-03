<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler;

use Indigo\Ruler\Rule\Logical;
use Indigo\Ruler\Builder\HasAssertion;
use Indigo\Ruler\Builder\HasModifier;
use Indigo\Ruler\Builder\HasTargetValue;
use Indigo\Ruler\Builder\HasParameter;

/**
 * Responsible for constructing sets of rules from formatted arrays
 *
 * @author Steve West
 */
class Builder
{
    /**
     * @var Library
     */
    protected $ruleLibrary;

    /**
     * @var Library
     */
    protected $assertionLibrary;

    /**
     * @var Library
     */
    protected $resultLibrary;

    /**
     * @var Library
     */
    protected $modifierLibrary;

    /**
     * @param Library $ruleLibrary
     * @param Library $assertionLibrary
     * @param Library $resultLibrary
     * @param Library $modifierLibrary
     */
    public function __construct(
        Library $ruleLibrary,
        Library $assertionLibrary,
        Library $resultLibrary,
        Library $modifierLibrary
    ) {
        $this->ruleLibrary = $ruleLibrary;
        $this->assertionLibrary = $assertionLibrary;
        $this->resultLibrary = $resultLibrary;
        $this->modifierLibrary = $modifierLibrary;
    }

    /**
     * @return Library
     */
    public function getRuleLibrary()
    {
        return $this->ruleLibrary;
    }

    /**
     * @param Library $ruleLibrary
     */
    public function setRuleLibrary(Library $ruleLibrary)
    {
        $this->ruleLibrary = $ruleLibrary;
    }

    /**
     * @return Library
     */
    public function getAssertionLibrary()
    {
        return $this->assertionLibrary;
    }

    /**
     * @param Library $assertionLibrary
     */
    public function setAssertionLibrary(Library $assertionLibrary)
    {
        $this->assertionLibrary = $assertionLibrary;
    }

    /**
     * @return Library
     */
    public function getResultLibrary()
    {
        return $this->resultLibrary;
    }

    /**
     * @param Library $resultLibrary
     */
    public function setResultLibrary(Library $resultLibrary)
    {
        $this->resultLibrary = $resultLibrary;
    }

    /**
     * @return Library
     */
    public function getModifierLibrary()
    {
        return $this->modifierLibrary;
    }

    /**
     * @param Library $modifierLibrary
     */
    public function setModifierLibrary(Library $modifierLibrary)
    {
        $this->modifierLibrary = $modifierLibrary;
    }

    /**
     * Populates the given processor with the rule sets as outlined in the $data
     *
     * @param array     $data
     * @param Processor $processor
     *
     * @return Processor
     */
    public function build(array $data, Processor $processor = null)
    {
        if ($processor === null) {
            $processor = new Processor;
        }

        // Pull out the rule sets and build each one
        if (isset($data['rule_sets'])) {
            foreach ($data['rule_sets'] as $set) {
                $processor->addRuleSet($this->buildRuleSet($set));
            }
        }

        return $processor;
    }

    /**
     * Builds a full rule set with a rule and results
     *
     * @param array $data
     *
     * @return RuleSet
     */
    public function buildRuleSet(array $data)
    {
        $ruleSet = new RuleSet;

        if (isset($data['identifier'])) {
            $ruleSet->setIdentifier($data['identifier']);
        }

        // Build the rule
        if (isset($data['rule'])) {
            $ruleSet->setRule($this->buildRule($data['rule']));
        }

        // Loop over each result and build that too
        if (isset($data['result'])) {
            foreach ($data['result'] as $result) {
                $ruleSet->addResult($this->buildResult($result));
            }
        }

        return $ruleSet;
    }

    /**
     * Builds a rule
     *
     * Expects an array with a key called "name".
     * If "assertion" is set the $data array will be passed to `buildAssertion`
     * and the resulting modifier will be added to the rule.
     *
     * @param array $data
     *
     * @return Rule
     */
    public function buildRule(array $data)
    {
        // Extract the name and create an instance
        /** @type Rule $rule */
        $rule = $this->ruleLibrary->getInstance($data['name']);

        // If the rule is a logical rule then make sure the left and right have been added
        if ($rule instanceof Logical) {
            $this->populateLogicRule($rule, $data);
        }

        // Build the assertion and set its value before adding it to the rule
        if (isset($data['assertion'])) {
            $this->setAssertion($this->buildAssertion($data['assertion']), $rule);
        }

        $this->tryValue($data, $rule);

        return $rule;
    }

    /**
     * Sets up the left and right rules of a logic rule.
     *
     * @param Logical $rule
     * @param array   $data
     */
    protected function populateLogicRule(Logical $rule, array $data)
    {
        if (isset($data['left'])) {
            $rule->setLeft($this->buildRule($data['left']));
        }

        if (isset($data['right'])) {
            $rule->setRight($this->buildRule($data['right']));
        }
    }

    /**
     * Builds an assertion
     *
     * Expects an array with a "name" key with the name of the assertion
     * and an optional "value" that will be passed
     * as the assertion target value if set.
     *
     * Note: you can only use "value" if you used TargetValue
     *
     * @param array $data
     *
     * @return Assertion
     */
    public function buildAssertion(array $data)
    {
        $assertion = $this->assertionLibrary->getInstance($data['name']);

        $this->tryValue($data, $assertion);

        return $assertion;
    }

    /**
     * Builds a result, expects a key called "name" to exist in the $data array
     * that represents a known result.
     *
     * @param array $data
     *
     * @return Result
     */
    public function buildResult(array $data)
    {
        // Get the name and try to create an instance from the library
        /** @var Result $result */
        $result = $this->resultLibrary->getInstance($data['name']);

        if (isset($data['modifier'])) {
            $this->setModifier($this->buildModifier($data['modifier']), $result);
        }

        $this->tryValue($data, $result);

        return $result;
    }

    /**
     * Builds a modifier, expects a key called "name" to exist in the $data array
     *
     * @param array $data
     *
     * @return Modifier
     */
    public function buildModifier(array $data)
    {
        $modifier = $this->modifierLibrary->getInstance($data['name']);

        $this->tryValue($data, $modifier);

        return $modifier;
    }

    /**
     * Tries to set a value from data
     *
     * @param array $data
     * @param mixed $object
     */
    private function tryValue(array $data, $object)
    {
        if (isset($data['value'])) {
            $this->setTargetValue($data['value'], $object);
        }
    }

    /**
     * Makes sure that the object HasTargetValue
     *
     * @param mixed         $value
     * @param HasTargetValue $object
     */
    private function setTargetValue($value, HasTargetValue $object)
    {
        $object->setTargetValue($value);
    }

    /**
     * Sets an assertion on an object which HasAssertion
     *
     * @param Assertion    $assertion
     * @param HasAssertion $object
     */
    private function setAssertion(Assertion $assertion, HasAssertion $object)
    {
        $object->setAssertion($assertion);
    }

    /**
     * Sets a modifier on an object which HasModifier
     *
     * @param Modifier    $modifier
     * @param HasModifier $object
     */
    private function setModifier(Modifier $modifier, HasModifier $object)
    {
        $object->setModifier($modifier);
    }
}
