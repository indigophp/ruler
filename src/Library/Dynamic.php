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

use RuntimeException;

/**
 * Dynamically looks for a class in a namespace
 *
 * @author Steve West
 */
abstract class Dynamic extends Base
{
    /**
     * Namespace to look in
     *
     * @var string
     */
    protected $namespace;

    /**
     * {@inheritdoc}
     */
    public function getInstance($name)
    {
        if ($this->has($name)) {
            return new $this->items[$name];
        }

        $className = $this->namespace . ucfirst($name);

        if (class_exists($className)) {
            return new $className;
        }

        throw new RuntimeException($name . $this->notFoundError);
    }
}
