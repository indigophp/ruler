<?php

namespace spec\Indigo\Ruler;

use Indigo\Ruler\Result;
use Indigo\Ruler\Rule;
use stdClass;
use PhpSpec\ObjectBehavior;

class RuleSetSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\RuleSet');
    }

    function it_should_allow_to_set_identifier()
    {
        $this->setIdentifier('test');

        $this->getIdentifier()->shouldReturn('test');
    }

    function it_should_allow_to_set_rule(Rule $rule)
    {
        $this->setRule($rule);

        $this->getRule()->shouldReturn($rule);
    }

    function it_should_allow_to_add_result(Result $result)
    {
        $this->addResult($result);
    }

    function it_should_allow_to_be_valid(Rule $rule)
    {
        $rule->check(1)->shouldBeCalled()->willReturn(true);

        $this->setRule($rule);

        $this->isValid(1)->shouldReturn(true);
    }
}
