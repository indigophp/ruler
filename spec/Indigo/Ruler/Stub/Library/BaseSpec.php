<?php

namespace spec\Indigo\Ruler\Stub\Library;

use PhpSpec\ObjectBehavior;

class BaseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Stub\Library\Base');
        $this->shouldHaveType('Indigo\Ruler\Library\Base');
        $this->shouldImplement('Indigo\Ruler\Library');
    }

    function it_should_allow_to_add_items()
    {
        $this->add('test', 'stdClass');

        $this->has('test')->shouldReturn(true);
    }

    function it_should_allow_to_get_an_instance()
    {
        $this->add('test', 'stdClass');

        $this->getInstance('test')->shouldHaveType('stdClass');
    }

    function it_should_throw_an_exception_when_class_is_not_found()
    {
        $this->shouldThrow('RuntimeException')->duringGetInstance('not_found');
    }
}
