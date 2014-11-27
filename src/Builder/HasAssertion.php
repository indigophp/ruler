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
 * Helps to decide whether a Rule has an assertion or not
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface HasAssertion
{
    /**
     * Returns the Assertion
     *
     * @return Assertion
     */
    public function getAssertion();

    /**
     * Sets the Assertion
     *
     * @param Assertion $assertion
     */
    public function setAssertion(Assertion $assertion);
}
