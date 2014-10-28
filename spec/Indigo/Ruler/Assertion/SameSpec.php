<?php

namespace spec\Indigo\Ruler\Assertion;

use stdClass;
use PhpSpec\ObjectBehavior;

class SameSpec extends ObjectBehavior
{
    function let(stdClass $targetValue)
    {
        $this->beConstructedWith($targetValue);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Assertion\Same');
        $this->shouldImplement('Indigo\Ruler\Assertion');
    }

    function it_should_allow_to_be_the_same(stdClass $targetValue)
    {
        $this->assert($targetValue)->shouldReturn(true);
    }

    function it_should_allow_not_to_be_the_same(stdClass $target)
    {
        $this->assert($target)->shouldReturn(false);
    }
}
