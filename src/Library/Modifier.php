<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler\Library;

/**
 * Library for Modifiers
 *
 * @author Steve West
 */
class Modifier extends Dynamic
{
    /**
     * {@inheritdoc}
     */
    protected $namespace = 'Indigo\Ruler\Modifier\\';

    /**
     * {@inheritdoc}
     */
    protected $notFoundError = ' is not a known modifier.';
}
