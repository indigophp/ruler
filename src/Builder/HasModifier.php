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

use Indigo\Ruler\Modifier;

/**
 * Helps to decide whether a Result has a modifier or not
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface HasModifier
{
    /**
     * Returns the Modifier
     *
     * @return Modifier
     */
    public function getModifier();

    /**
     * Sets the Modifier
     *
     * @param Modifier $modifier
     */
    public function setModifier(Modifier $modifier);
}
