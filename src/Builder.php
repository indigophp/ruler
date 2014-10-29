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

/**
 * Responsible for constructing sets of rules from formatted arrays
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
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
     * Populates the given processor with the rule sets as outlined in the $data
     *
     * @param array     $data
     * @param Processor $processor
     *
     * @return Processor
     */
    public function build(array $data, Processor $processor = null)
    {
        if ($processor === null)
        {
            $processor = new Processor;
        }

        // Pull out the rule sets and build each one
        if (isset($data['rule_sets']))
        {
            foreach ($data['rule_sets'] as $set)
            {
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
     * Expects an array with a key called "name". If "assertion" is set the $data array will be passed to `buildAssertion`
     * and the resulting modifier will be added to the rule.
     *
     * @param array $data
     *
     * @return AbstractRule
     */
    public function buildRule($data)
    {
        // Extract the name and create an instance
        /** @type AbstractRule $rule */
        $rule = $this->ruleLibrary->getInstance($data['name']);

        // If the rule is a logical rule then make sure the left and right have been added
        if ($rule instanceof AbstractLogicRule) {
            $this->populateLogicRule($rule, $data);
        }

        // Build the assertion and set its value before adding it to the rule
        if (isset($data['assertion'])) {
            $rule->setAssertion($this->buildAssertion($data));
        }

        return $rule;
    }

    /**
     * Sets up the left and right rules of a logic rule.
     *
     * @param AbstractLogicRule $rule
     * @param array             $data
     */
    protected function populateLogicRule(AbstractLogicRule $rule, $data)
    {
        if (isset($data['left'])) {
            $rule->setLeft($this->buildRule($data['left']));
        }

        if (isset($data['right'])) {
            $rule->setRight($this->buildRule($data['right']));
        }
    }

    /**
     * Builds a modifier.
     *
     * Expects an array with a "assertion" key with the name of the modifier and an optional "value" that will be passed
     * as the modifier target value if set.
     *
     * @param array $data
     *
     * @return AbstractAssertion
     */
    public function buildAssertion($data)
    {
        $modifier = $this->assertionLibrary->getInstance($data['assertion']);

        if (isset($data['value'])) {
            $modifier->setTargetValue($data['value']);
        }

        return $modifier;
    }

    /**
     * Builds a result, expects a key called "name" to exist in the $data array that represents a known result.
     *
     * @param array $data
     *
     * @return AbstractResult
     */
    public function buildResult($data)
    {
        // Get the name and try to create an instance from the library
        /** @var AbstractResult $result */
        $result = $this->resultLibrary->getInstance($data['name']);

        if (isset($data['value'])) {
            $result->setValue($data['value']);
        }

        if (isset($data['modifier'])) {
            $result->setModifier($this->buildModifier($data));
        }

        return $result;
    }

    /**
     * Creates a rule modifier. Expects a key called "modifier" to exist in the $data array.
     *
     * @param array $data
     *
     * @return AbstractModifier
     */
    public function buildModifier($data)
    {
        $modifier = $this->modifierLibrary->getInstance($data['modifier']);

        if (isset($data['target'])) {
            $modifier->setTargetValue($data['target']);
        }

        return $modifier;
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

}
