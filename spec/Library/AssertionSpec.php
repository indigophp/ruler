<?php

namespace spec\Indigo\Ruler\Library;

use PhpSpec\ObjectBehavior;

class AssertionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Library\Assertion');
        $this->shouldHaveType('Indigo\Ruler\Library\Dynamic');
        $this->shouldImplement('Indigo\Ruler\Library');
    }

    function it_should_allow_to_return_an_instance()
    {
        $this->getInstance('equal')->shouldHaveType('Indigo\Ruler\Assertion\Equal');
    }
}
