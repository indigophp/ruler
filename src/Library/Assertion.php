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
 * Library for Assertions
 *
 * @author Steve West
 */
class Assertion extends Dynamic
{
    /**
     * {@inheritdoc}
     */
    protected $namespace = 'Indigo\Ruler\Assertion\\';

    /**
     * {@inheritdoc}
     */
    protected $notFoundError = ' is not a known assertion.';
}
