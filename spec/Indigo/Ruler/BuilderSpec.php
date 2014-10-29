<?php

namespace spec\Indigo\Ruler;

use Indigo\Ruler\Library;
use Indigo\Ruler\Processor;
use Indigo\Ruler\Rule;
use Indigo\Ruler\Rule\Logical;
use Indigo\Ruler\Result;
use Indigo\Ruler\Assertion;
use Indigo\Ruler\Modifier;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BuilderSpec extends ObjectBehavior
{
    function let(Library $library)
    {
        $this->beConstructedWith($library, $library, $library, $library);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Indigo\Ruler\Builder');
    }

    function it_should_allow_to_set_rule_library(Library $ruleLibrary)
    {
        $this->setRuleLibrary($ruleLibrary);

        $this->getRuleLibrary()->shouldReturn($ruleLibrary);
    }

    function it_should_allow_to_set_assertion_library(Library $assertionLibrary)
    {
        $this->setAssertionLibrary($assertionLibrary);

        $this->getAssertionLibrary()->shouldReturn($assertionLibrary);
    }

    function it_should_allow_to_set_result_library(Library $resultLibrary)
    {
        $this->setResultLibrary($resultLibrary);

        $this->getResultLibrary()->shouldReturn($resultLibrary);
    }

    function it_should_allow_to_set_modifier_library(Library $modifierLibrary)
    {
        $this->setModifierLibrary($modifierLibrary);

        $this->getModifierLibrary()->shouldReturn($modifierLibrary);
    }

    function it_should_be_able_to_build_processor()
    {
        $data = ['rule_sets' => [[]]];

        $processor = $this->build($data);

        $processor->shouldHaveType('Indigo\Ruler\Processor');
    }

    function it_should_be_able_to_populate_an_existing_processor(Processor $processor)
    {
        $this->build([], $processor)->shouldReturn($processor);
    }

    function it_should_allow_to_build_a_rule_set(
        Library $ruleLibrary,
        Library $resultLibrary,
        Rule $rule,
        Result $result
    ) {
        $data = [
            'identifier' => 'test',
            'rule' => [
                'name' => 'test',
            ],
            'result' => [
                ['name' => 'test']
            ],
        ];

        $ruleLibrary->getInstance('test')->willReturn($rule);

        $resultLibrary->getInstance('test')->willReturn($result);

        $this->setRuleLibrary($ruleLibrary);
        $this->setResultLibrary($resultLibrary);

        $ruleSet = $this->buildRuleSet($data);

        $ruleSet->shouldHaveType('Indigo\Ruler\RuleSet');
    }

    function it_should_allow_to_build_a_rule(
        Library $ruleLibrary,
        Library $assertionLibrary,
        Logical $rule,
        Rule $left,
        Rule $right,
        Assertion $assertion
    ) {
        $data = [
            'name' => 'test',
            'left' => [
                'name' => 'left',
                'assertion' => ['name' => 'test'],
            ],
            'right' => ['name' => 'right'],
        ];

        $left->beADoubleOf('Indigo\Ruler\Stub\AssertionAware');

        $rule->setLeft($left)->shouldBeCalled();
        $rule->setRight($right)->shouldBeCalled();

        $left->setAssertion(Argument::type('Indigo\Ruler\Assertion'))->will(function($args) use($left) {
            $left->getAssertion()->willReturn($args[0]);
        });

        $ruleLibrary->getInstance('test')->willReturn($rule);
        $ruleLibrary->getInstance('left')->willReturn($left);
        $ruleLibrary->getInstance('right')->willReturn($right);

        $assertionLibrary->getInstance('test')->willReturn($assertion);

        $this->setRuleLibrary($ruleLibrary);
        $this->setAssertionLibrary($assertionLibrary);

        $rule = $this->buildRule($data);

        $rule->shouldHaveType('Indigo\Ruler\Rule');
    }

    function it_should_allow_to_build_an_assertion(
        Library $assertionLibrary,
        Assertion $assertion
    ) {
        $data = [
            'name'  => 'test',
            'value' => 1,
        ];

        $assertion->beADoubleOf('Indigo\Ruler\Stub\TargetValue');

        $assertionLibrary->getInstance('test')->willReturn($assertion);

        $this->setAssertionLibrary($assertionLibrary);

        $assertion = $this->buildAssertion($data);

        $assertion->shouldHaveType('Indigo\Ruler\Assertion');
    }

    function it_should_allow_to_build_a_result(
        Library $resultLibrary,
        Library $modifierLibrary,
        Result $result,
        Modifier $modifier
    ) {
        $data = [
            'name' => 'test',
            'modifier' => ['name' => 'test'],
        ];

        $result->beADoubleOf('Indigo\Ruler\Stub\ModifierAware');

        $resultLibrary->getInstance('test')->willReturn($result);

        $modifierLibrary->getInstance('test')->willReturn($modifier);

        $this->setResultLibrary($resultLibrary);
        $this->setModifierLibrary($modifierLibrary);

        $result = $this->buildResult($data);

        $result->shouldHaveType('Indigo\Ruler\Result');
    }

    function it_should_allow_to_build_an_modifier(
        Library $modifierLibrary,
        Modifier $modifier
    ) {
        $data = [
            'name'  => 'test',
            'value' => 1,
        ];

        $modifier->beADoubleOf('Indigo\Ruler\Stub\TargetValue');

        $modifierLibrary->getInstance('test')->willReturn($modifier);

        $this->setModifierLibrary($modifierLibrary);

        $modifier = $this->buildModifier($data);

        $modifier->shouldHaveType('Indigo\Ruler\Modifier');
    }
}
