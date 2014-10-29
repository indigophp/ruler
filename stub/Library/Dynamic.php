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
 * Dynamic Library Stub
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Dynamic extends \Indigo\Ruler\Library\Dynamic
{
    /**
     * {@inheritdoc}
     */
    protected $namespace = 'Indigo\Ruler\Stub\Library\\';

    /**
     * {@inheritdoc}
     */
    protected $notFoundError = ' is not a known library.';
}
