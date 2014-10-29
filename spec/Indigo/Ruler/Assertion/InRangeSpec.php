<?php

namespace spec\Indigo\Ruler\Assertion;

use PhpSpec\ObjectBehavior;

class InRangeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([1, 5]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Assertion\InRange');
        $this->shouldHaveType('Indigo\Ruler\Assertion');
    }

    public function it_should_allow_to_be_in_range()
    {
        $this->assert(3)->shouldReturn(true);
    }

    public function it_should_not_allow_to_be_out_of_range()
    {
        $this->assert(0)->shouldReturn(false);
    }
}
