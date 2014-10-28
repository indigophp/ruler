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
 * Returns a fixed value
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
final class Fixed implements Modifier
{
    use \Indigo\Ruler\TargetValue;

    /**
     * {@inheritdoc}
     */
    function modify($value)
    {
        return $this->getTargetValue();
    }
}
