<?php

namespace spec\Indigo\Ruler\Modifier;

use PhpSpec\ObjectBehavior;

class IncreaseSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Modifier\Increase');
        $this->shouldImplement('Indigo\Ruler\Modifier');
        $this->shouldImplement('Indigo\Ruler\HasTargetValue');
    }

    function it_should_allow_to_increase()
    {
        $this->modify(1)->shouldReturn(2);
    }
}
