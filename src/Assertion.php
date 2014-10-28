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
 * Asserts value based comparisons
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Assertion
{
    /**
     * Asserts that the input value and the target has a valid connection
     *
     * @param mixed $value
     *
     * @return boolean
     */
    public function assert($value);
}
