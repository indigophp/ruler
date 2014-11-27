<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler\Builder;

use Indigo\Ruler\Assertion;

/**
 * Helps to create classes which has assertion
 *
 * Classes using this trait should implement HasAssertion
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait AssertionAware
{
    /**
     * @var Assertion
     */
    protected $assertion;

    /**
     * {@inheritdoc}
     */
    public function getAssertion()
    {
        return $this->assertion;
    }

    /**
     * {@inheritdoc}
     */
    public function setAssertion(Assertion $assertion)
    {
        $this->assertion = $assertion;
    }
}
