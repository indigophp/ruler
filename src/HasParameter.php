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
 * Helps to handle parameter
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface HasParameter
{
    /**
     * @return mixed
     */
    public function getParameter();

    /**
     * @param mixed $value
     */
    public function setParameter($parameter);
}
