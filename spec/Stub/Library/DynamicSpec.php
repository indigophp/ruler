<?php

namespace spec\Indigo\Ruler\Stub\Library;

use PhpSpec\ObjectBehavior;

class DynamicSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Stub\Library\Dynamic');
        $this->shouldHaveType('Indigo\Ruler\Library\Dynamic');
        $this->shouldImplement('Indigo\Ruler\Library');
    }

    function it_should_allow_to_get_an_already_added_item()
    {
        $this->add('test', 'stdClass');
        $this->has('test')->shouldReturn(true);
        $this->getInstance('test')->shouldHaveType('stdClass');
    }

    function it_should_allow_to_dynamically_return_a_class()
    {
        $this->getInstance('dynamic')->shouldHaveType('Indigo\Ruler\Stub\Library\Dynamic');
    }

    function it_should_throw_an_exception_when_class_is_not_found()
    {
        $this->shouldThrow('RuntimeException')->duringGetInstance('not_found');
    }
}
