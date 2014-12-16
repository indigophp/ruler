<?php

namespace spec\Indigo\Ruler\Stub\Builder;

use Indigo\Ruler\Modifier;
use PhpSpec\ObjectBehavior;

class ModifierAwareSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Stub\Builder\ModifierAware');
        $this->shouldUseTrait('Indigo\Ruler\Builder\ModifierAware');
        $this->shouldImplement('Indigo\Ruler\Builder\HasModifier');
    }

    function it_should_allow_to_set_modifier(Modifier $modifier)
    {
        $this->setModifier($modifier);

        $this->getModifier()->shouldReturn($modifier);
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
