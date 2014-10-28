<?php

namespace spec\Indigo\Ruler\Assertion;

use PhpSpec\ObjectBehavior;

class LessSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Assertion\Less');
        $this->shouldImplement('Indigo\Ruler\Assertion');
    }

    function it_should_allow_to_be_less()
    {
        $this->assert(2)->shouldReturn(true);
    }

    function it_should_not_allow_to_be_greater()
    {
        $this->assert(0)->shouldReturn(false);
    }

    function it_should_allow_to_be_less_but_different_type()
    {
        $this->assert(2.0)->shouldReturn(true);
    }
}
