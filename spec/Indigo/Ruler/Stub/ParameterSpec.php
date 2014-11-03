<?php

namespace spec\Indigo\Ruler\Stub;

use PhpSpec\ObjectBehavior;

class ParameterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Stub\Parameter');
        $this->shouldUseTrait('Indigo\Ruler\Parameter');
        $this->shouldImplement('Indigo\Ruler\HasParameter');
    }

    function it_should_allow_to_construct_with_value()
    {
        $this->beConstructedWith('parameter');

        $this->getParameter()->shouldReturn('parameter');
    }

    function it_should_allow_to_set_target()
    {
        $this->setParameter('parameter');

        $this->getParameter()->shouldReturn('parameter');
    }

    function getMatchers()
    {
        return [
            'useTrait' => function ($subject, $trait) {
                return class_uses($subject, $trait);
            }
        ];
    }
}
