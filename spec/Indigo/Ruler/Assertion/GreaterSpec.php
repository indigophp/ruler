<?php

namespace spec\Indigo\Ruler\Assertion;

use PhpSpec\ObjectBehavior;

class GreaterSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Assertion\Greater');
        $this->shouldHaveType('Indigo\Ruler\Assertion');
    }

    function it_should_be_greater()
    {
        $this->assert(0)->shouldReturn(true);
    }

    function it_should_not_be_greater()
    {
        $this->assert(2)->shouldReturn(false);
    }

    function it_should_be_greater_but_different_type()
    {
        $this->assert(-1.0)->shouldReturn(true);
    }
}
