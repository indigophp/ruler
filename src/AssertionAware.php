<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler;

/**
 * Defines an AssertionAware helper
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
     * Returns the assertion
     *
     * @return Assertion
     */
    public function getAssertion()
    {
        return $this->assertion;
    }

    /**
     * Sets the Assertion
     *
     * @param Assertion $assertion
     */
    public function setAssertion(Assertion $assertion)
    {
        $this->assertion = $assertion;
    }
}
