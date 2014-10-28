<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler\Assertion;

use Indigo\Ruler\Assertion;

/**
 * Asserts that a value is within a range defined by the target value.
 * The target value should be an array with two elements, the start of the range and the end of the range.
 * These should be values compatible with range().
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class InRange implements Assertion
{
    use \Indigo\Ruler\TargetValue;

    /**
     * {@inheritdoc}
     */
    function assert($value)
    {
        $range = range($this->getTargetValue()[0], $this->getTargetValue()[1]);

        return in_array($value, $range);
    }
}
