<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler\Modifier;

use Indigo\Ruler\Modifier;
use Indigo\Ruler\HasTargetValue;

/**
 * Returns the percentage of a value
 *
 * @author Steve West
 */
final class Percent implements Modifier, HasTargetValue
{
    use \Indigo\Ruler\TargetValue;

    /**
     * {@inheritdoc}
     */
    function modify($value)
    {
        $percentage = $this->getTargetValue();

        return ($percentage / 100) * $value;
    }
}
