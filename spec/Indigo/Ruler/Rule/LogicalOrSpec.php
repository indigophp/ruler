<?php

namespace spec\Indigo\Ruler\Rule;

use Indigo\Ruler\Rule;
use PhpSpec\ObjectBehavior;

class LogicalOrSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Rule\LogicalOr');
        $this->shouldHaveType('Indigo\Ruler\Rule\Logical');
        $this->shouldImplement('Indigo\Ruler\Rule');
    }

    function it_should_allow_to_check_logical_or(Rule $left, Rule $right)
    {
        $left->check(null)->shouldBeCalled()->willReturn(false);
        $right->check(null)->shouldBeCalled()->willReturn(true);

        $this->setLeft($left);
        $this->setRight($right);

        $this->check(null)->shouldReturn(true);
    }
}
