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

use Indigo\Ruler\Library;
use RuntimeException;

/**
 * Holds a set of class names to be able to instantiate them
 *
 * @author Steve West
 */
abstract class Base implements Library
{
    /**
     * Not Found error message
     *
     * @var string
     */
    protected $notFoundError = ' is not a known item.';

    /**
     * Contains a list of known rule classes indexed by identifier
     *
     * @var string[]
     */
    protected $items = [];

    /**
     * {@inheritdoc}
     */
    public function add($name, $class)
    {
        $this->items[$name] = $class;
    }

    /**
     * {@inheritdoc}
     */
    public function has($name)
    {
        return isset($this->items[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function getInstance($name)
    {
        if ($this->has($name)) {
            return new $this->items[$name];
        }

        throw new RuntimeException($name . $this->notFoundError);
    }
}
