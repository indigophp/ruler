<?php

namespace spec\Indigo\Ruler\Stub\Builder;

use PhpSpec\ObjectBehavior;

class TargetValueSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Stub\Builder\TargetValueAware');
        $this->shouldUseTrait('Indigo\Ruler\Builder\TargetValueAware');
        $this->shouldImplement('Indigo\Ruler\Builder\HasTargetValue');
    }

    function it_should_allow_to_construct_with_value()
    {
        $this->beConstructedWith('target');

        $this->getTargetValue()->shouldReturn('target');
    }

    function it_should_allow_to_set_target()
    {
        $this->setTargetValue('target');

        $this->getTargetValue()->shouldReturn('target');
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
