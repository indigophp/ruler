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

/**
 * Increases a value
 *
 * @author Steve West
 */
final class Increase implements Modifier
{
    use \Indigo\Ruler\TargetValue;

    /**
     * {@inheritdoc}
     */
    function modify($value)
    {
        return $value + $this->getTargetValue();
    }
}
