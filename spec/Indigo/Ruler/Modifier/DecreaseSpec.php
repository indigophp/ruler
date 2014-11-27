<?php

namespace spec\Indigo\Ruler\Modifier;

use PhpSpec\ObjectBehavior;

class DecreaseSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Modifier\Decrease');
        $this->shouldImplement('Indigo\Ruler\Modifier');
        $this->shouldImplement('Indigo\Ruler\Builder\HasTargetValue');
    }

    function it_should_allow_to_decrease()
    {
        $this->modify(2)->shouldReturn(1);
    }
}
