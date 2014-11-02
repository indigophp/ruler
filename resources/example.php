<?php

use Indigo\Ruler\Rule;
use Indigo\Ruler\HasAssertion;
use Indigo\Ruler\Result;
use Indigo\Ruler\HasModifier;
use Indigo\Ruler\HasTargetValue;
use Indigo\Ruler\Assertion\Equal;
use Indigo\Ruler\Modifier\Percent;
use Indigo\Ruler\Processor;
use Indigo\Ruler\RuleSet;

require __DIR__.'/../vendor/autoload.php';

class HasProduct implements Rule, HasAssertion
{
    use \Indigo\Ruler\AssertionAware;

    /**
     * {@inheritdoc}
     */
    public function check($context)
    {
        foreach ($context as $id => $product) {
            if ($this->getAssertion()->assert($product['id'])) {
                return true;
            }
        }

        // We have to return a boolean value!!!
        return false;
    }
}

class ProductDiscount implements Result, HasModifier, HasTargetValue
{
    use \Indigo\Ruler\TargetValue;
    use \Indigo\Ruler\ModifierAware;

    /**
     * {@inheritdoc}
     */
    public function mutate(&$target)
    {
        foreach ($target as $id => &$product) {
            if ($product['id'] == $this->getTargetValue()) {
                $product['price'] = (int) $this->getModifier()->modify($target[$id]['price']);
                break;
            }
        }
    }
}

$context = [
    ['id' => 1, 'name' => 'foobar', 'qty' => 12, 'price' => 10],
    ['id' => 2, 'name' => 'bazbat', 'qty' => 9, 'price' => 25],
];

// Set up a rule that will give a 50% discount on product 1

// Set up the "has product" rule and point it at product 1
$assertion = new Equal;
$assertion->setTargetValue(1);

$rule = new HasProduct;
$rule->setAssertion($assertion);

// Set up our 50% discount
$result = new ProductDiscount;
$result->setTargetValue(1);

$modifier = new Percent;
$modifier->setTargetValue(50);
$result->setModifier($modifier);

// Roll them into a rule set
$ruleSet = new RuleSet();
$ruleSet->setRule($rule);
$ruleSet->addResult($result);

// Add to the rule set and run
$processor = new Processor;
$processor->addRuleSet($ruleSet);
$processor->process($context, $context);

// New price for product 1 is now 5
var_dump($context);
