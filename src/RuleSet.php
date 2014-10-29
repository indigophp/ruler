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
 * Combination of a Rule and one or more Results
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class RuleSet
{
    /**
     * Something that can be used to identify this set
     *
     * @var string
     */
    protected $identifier;

    /**
     * @var Rule
     */
    protected $rule;

    /**
     * @var Result[]
     */
    protected $results = [];

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return Rule
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * @param Rule $rule
     */
    public function setRule(Rule $rule)
    {
        $this->rule = $rule;
    }

    /**
     * Adds a result that will be called as a result of the RuleSet being valid
     *
     * @param Result $result
     */
    public function addResult(Result $result)
    {
        $this->results[] = $result;
    }

    /**
     * Returns true if the rule is valid for the given context
     *
     * @param mixed $context
     *
     * @return bool
     */
    public function isValid($context)
    {
        return $this->rule->check($context);
    }

    /**
     * Applies the results for this rule to the target.
     *
     * @param mixed $target
     */
    public function applyResults(&$target)
    {
        foreach ($this->results as $mutator)
        {
            $mutator->mutate($target);
        }
    }
}
