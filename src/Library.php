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
 * Holds a set of class names to be able to instantiate them
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Library
{
    /**
     * Adds a class to the library
     *
     * @param string $name
     * @param string $class
     */
    public function add($name, $class);

    /**
     * Checks if the given class is known about
     *
     * @param string $name
     *
     * @return bool
     */
    public function has($name);

    /**
     * Gets an instance of the given class
     *
     * @param string $name
     *
     * @return mixed
     *
     * @throws RuntimeException If $name is not found
     */
    public function getInstance($name);
}
