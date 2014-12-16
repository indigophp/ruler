<?php

namespace spec\Indigo\Ruler;

use PhpSpec\ObjectBehavior;

class ManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Manager');
    }

    function it_should_be_able_to_add_environment()
    {
        $this->addEnvironment('test', [], [], [], []);

        $this->hasEnvironment('test')->shouldReturn(true);
    }

    function it_should_allow_to_get_builder()
    {
        $this->addEnvironment('test', [], [], [], []);

        $this->getBuilderInstance('test')->shouldHaveType('Indigo\Ruler\Builder');
    }

    function it_should_throw_an_exception_when_environment_not_found()
    {
        $this->shouldThrow('RuntimeException')->duringGetBuilderInstance('test');
    }

    function it_should_allow_to_create_a_library()
    {
        $this->createLibrary('Indigo\Ruler\Library\Rule')->shouldHaveType('Indigo\Ruler\Library\Rule');
    }

    function it_should_allow_to_create_a_library_from_callable()
    {
        $this->createLibrary(function() {
            return new \Indigo\Ruler\Library\Rule;
        })->shouldHaveType('Indigo\Ruler\Library\Rule');
    }

    function it_should_allow_to_create_a_library_from_array()
    {
        $this->createLibrary(['equal' => 'Equal'], 'rule')->shouldHaveType('Indigo\Ruler\Library\Rule');
    }
}
