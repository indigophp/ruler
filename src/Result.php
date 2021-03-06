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
 * Common logic for classes that mutate entities in various ways
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Result
{
    /**
     * Applies a Result to the Target
     *
     * @param mixed $target
     */
    public function mutate(&$target);
}
