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
 * Main class for processing sets of logical rules
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Processor
{
    /**
     * @var RuleSet[]
     */
    protected $ruleSets = [];

    /**
     * Adds a rule set for evaluation
     *
     * @param RuleSet $rule
     */
    public function addRuleSet(RuleSet $rule)
    {
        $this->ruleSets[] = $rule;
    }

    /**
     * Checks the assigned rules against the given $context
     * and applies results to $target for any that where found to be valid.
     *
     * @param mixed $context
     * @param mixed $target
     *
     * @codeCoverageIgnore
     */
    public function process($context, &$target)
    {
        // Loop over each set
        foreach ($this->ruleSets as $ruleSet)
        {
            // Build up a list of valid sets
            if ($ruleSet->isValid($context))
            {
                $ruleSet->applyResults($target);
            }
        }
    }
}
