<?php

namespace spec\Indigo\Ruler\Library;

use PhpSpec\ObjectBehavior;

class ModifierSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Library\Modifier');
        $this->shouldHaveType('Indigo\Ruler\Library\Dynamic');
        $this->shouldImplement('Indigo\Ruler\Library');
    }

    function it_should_allow_to_return_an_instance()
    {
        $this->getInstance('fixed')->shouldHaveType('Indigo\Ruler\Modifier\Fixed');
    }
}
