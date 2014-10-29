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
 * Defines a single rule
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Rule
{
    /**
     * Checks whether the rule can be applied for the Context
     *
     * @param mixed $context
     *
     * @return boolean
     */
    public function check($context);
}
