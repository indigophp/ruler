<?php

namespace spec\Indigo\Ruler\Modifier;

use PhpSpec\ObjectBehavior;

class FixedSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Modifier\Fixed');
        $this->shouldImplement('Indigo\Ruler\Modifier');
        $this->shouldImplement('Indigo\Ruler\Builder\HasTargetValue');
    }

    function it_should_allow_to_return_fixed()
    {
        $this->modify(10)->shouldReturn(1);
    }
}
