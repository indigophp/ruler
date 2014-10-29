<?php

namespace spec\Indigo\Ruler;

use Indigo\Ruler\RuleSet;
use PhpSpec\ObjectBehavior;

class ProcessorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Processor');
    }

    function it_should_allow_to_add_result_set(RuleSet $ruleSet)
    {
        $this->addRuleSet($ruleSet);
    }
}
