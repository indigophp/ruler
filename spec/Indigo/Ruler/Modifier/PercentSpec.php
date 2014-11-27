<?php

namespace spec\Indigo\Ruler\Modifier;

use PhpSpec\ObjectBehavior;

class PercentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Modifier\Percent');
        $this->shouldImplement('Indigo\Ruler\Modifier');
        $this->shouldImplement('Indigo\Ruler\Builder\HasTargetValue');
    }

    function it_should_allow_to_decrease_percent()
    {
        $this->beConstructedWith(1);

        $this->modify(100)->shouldReturn((double) 1);
    }

    function it_should_allow_to_increase_percent()
    {
        $this->beConstructedWith(120);

        $this->modify(100)->shouldReturn((double) 120);
    }
}
