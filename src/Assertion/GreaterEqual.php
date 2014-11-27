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
use Indigo\Ruler\Builder\HasTargetValue;

/**
 * Asserts that a value is greater than or equal to another
 *
 * @author Steve West
 */
final class GreaterEqual implements Assertion, HasTargetValue
{
    use \Indigo\Ruler\Builder\TargetValueAware;

    /**
     * {@inheritdoc}
     */
    function assert($value)
    {
        return $this->getTargetValue() >= $value;
    }
}
