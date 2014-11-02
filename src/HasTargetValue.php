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
 * Helps to handle target value on assertions and modifiers
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface HasTargetValue
{
    /**
     * @return mixed
     */
    public function getTargetValue();

    /**
     * @param mixed $value
     */
    public function setTargetValue($targetValue);
}
