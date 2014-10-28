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
 * Modifies a value
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Modifier
{
    /**
     * Modifies a value
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function modify($value);
}
