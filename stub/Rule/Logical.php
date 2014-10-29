<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler\Stub\Rule;

/**
 * Logical Rule Stub
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Logical extends \Indigo\Ruler\Rule\Logical
{
    /**
     * {@inheritdoc}
     */
    public function check($context)
    {
        return true;
    }
}
