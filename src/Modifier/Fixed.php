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
use Indigo\Ruler\Builder\HasTargetValue;

/**
 * Returns a fixed value
 *
 * @author Steve West
 */
final class Fixed implements Modifier, HasTargetValue
{
    use \Indigo\Ruler\Builder\TargetValueAware;

    /**
     * {@inheritdoc}
     */
    function modify($value)
    {
        return $this->getTargetValue();
    }
}
