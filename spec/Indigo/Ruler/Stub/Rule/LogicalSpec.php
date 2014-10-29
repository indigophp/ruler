<?php

namespace spec\Indigo\Ruler\Stub\Rule;

use Indigo\Ruler\Rule;
use PhpSpec\ObjectBehavior;

class LogicalSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Stub\Rule\Logical');
        $this->shouldHaveType('Indigo\Ruler\Rule\Logical');
        $this->shouldImplement('Indigo\Ruler\Rule');
    }

    function it_should_allow_to_set_left(Rule $left)
    {
        $this->setLeft($left);

        $this->getLeft()->shouldReturn($left);
    }

    function it_should_allow_to_set_right(Rule $right)
    {
        $this->setRight($right);

        $this->getRight()->shouldReturn($right);
    }
}
