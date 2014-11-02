<?php

namespace spec\Indigo\Ruler\Stub;

use Indigo\Ruler\Assertion;
use PhpSpec\ObjectBehavior;

class AssertionAwareSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Stub\AssertionAware');
        $this->shouldUseTrait('Indigo\Ruler\AssertionAware');
        $this->shouldImplement('Indigo\Ruler\HasAssertion');
    }

    function it_should_allow_to_set_assertion(Assertion $assertion)
    {
        $this->setAssertion($assertion);

        $this->getAssertion()->shouldReturn($assertion);
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
