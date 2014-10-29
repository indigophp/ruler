<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler\Stub\Library;

/**
 * Base Library Stub
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Base extends \Indigo\Ruler\Library\Base
{
    /**
     * {@inheritdoc}
     */
    protected $notFoundError = ' is not a known thing.';
}
