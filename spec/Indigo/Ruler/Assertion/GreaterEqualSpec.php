<?php

namespace spec\Indigo\Ruler\Assertion;

use PhpSpec\ObjectBehavior;

class GreaterEqualSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Assertion\GreaterEqual');
        $this->shouldImplement('Indigo\Ruler\Assertion');
    }

    function it_should_allow_to_be_greater()
    {
        $this->assert(0)->shouldReturn(true);
    }

    function it_should_not_allow_to_be_less()
    {
        $this->assert(2)->shouldReturn(false);
    }

    function it_should_allow_to_be_greater_but_different_type()
    {
        $this->assert(-1.0)->shouldReturn(true);
    }

    function it_should_allow_to_be_equal()
    {
        $this->assert(1)->shouldReturn(true);
    }

    function it_should_allow_to_be_equal_but_not_the_same()
    {
       $this->assert('1')->shouldReturn(true);
    }

    function it_should_allow_to_be_equal_but_different_type()
    {
        $this->assert(1.0)->shouldReturn(true);
    }

    function it_should_allow_to_be_equal_to_boolean_value()
    {
        $this->assert(true)->shouldReturn(true);
    }
}
