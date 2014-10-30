<?php

namespace spec\Indigo\Ruler\Modifier;

use PhpSpec\ObjectBehavior;

class DiscountSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Modifier\Discount');
        $this->shouldImplement('Indigo\Ruler\Modifier');
    }

    function it_should_allow_to_decrease_percent()
    {
        $this->beConstructedWith(1);

        $this->modify(100)->shouldReturn((double) 99);
    }
}
