<?php
/**
 * Ve Labs, Team Kraken
 * @license MIT
 * @copyright 2014 Ve Interactive Ltd.
 * @link http://veinteractive.com
 */

namespace Ve\LogicProcessor;

use Codeception\TestCase\Test;
use Mockery;

class RuleTest extends Test
{

	/**
	 * @var AbstractRule
	 */
	protected $rule;

	protected function _before()
	{
		$this->rule = new NameRuleStub;
	}

	public function testGetAndSetModifier()
	{
		$modifier = Mockery::mock('Ve\LogicProcessor\AbstractAssertion');

		$this->rule->setAssertion($modifier);

		$this->assertEquals($modifier, $this->rule->getAssertion());
	}

}
