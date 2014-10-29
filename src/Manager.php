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

use ArrayAccess;
use RuntimeException;
use ReflectionClass;

/**
 * Keeps track of different rule "environments"
 * to be able to quickly and easily construct matching libraries and builders
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Manager
{
    /**
     * Name of the class to use when creating builders
     *
     * @var string
     */
    protected $builderClassName = 'Indigo\Ruler\Builder';

    /**
     * Namespace where the libraries can be found
     *
     * @var string
     */
    protected $libraryNamespace = 'Indigo\Ruler\Library\\';

    /**
     * Contains a list of known environments and their related libraries.
     *
     * @var array
     */
    protected $environments = [];

    /**
     * Adds a new environment that can be constructed.
     * The library values should be an array of name => class, a closure that
     * returns this or a pre-constructed Library.
     *
     * @param string         $name
     * @param array|callable $rules
     * @param array|callable $assertions
     * @param array|callable $results
     * @param array|callable $modifiers
     */
    public function addEnvironment($name, $rules, $assertions, $results, $modifiers)
    {
        $this->environments[$name] = [
            'rule'      => $rules,
            'assertion' => $assertions,
            'result'    => $results,
            'modifier'  => $modifiers,
        ];
    }

    /**
     * Returns true if the given $name is a known environment.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasEnvironment($name)
    {
        return isset($this->environments[$name]);
    }

    /**
     * @param string $name
     *
     * @return Builder
     *
     * @throws RuntimeException
     */
    public function getBuilderInstance($name)
    {
        if (!$this->hasEnvironment($name)) {
            throw new RuntimeException($name. ' is not a known environment.');
        }

        // TODO: Find a more awesome way to do this
        $libraries = [];

        foreach ($this->environments[$name] as $type => $identifier) {
            $libraries[] = $this->createLibrary($identifier, $type);
        }

        $reflectionClass = new ReflectionClass($this->builderClassName);

        return $reflectionClass->newInstanceArgs($libraries);
    }

    /**
     * Takes the given identifier and tries to turn it into an AbstractLibrary
     *
     * If the $identifier is an array then $type is required.
     * $type represents the name of the library class to create
     * and populate. Eg, "rule" becomes "Rule" library.
     *
     * @param array|string|callable $identifier
     * @param string|null           $type
     *
     * @return Library
     */
    public function createLibrary($identifier, $type = null)
    {
        if (is_array($identifier) || $identifier instanceof ArrayAccess) {
            return $this->createFromArray($identifier, $type);
        } elseif (is_callable($identifier)) {
            return $identifier();
        }

        // If all else fails try to construct the $identifier as a class
        return new $identifier;
    }

    /**
     * @param array  $data
     * @param string $type
     *
     * @return Library
     */
    protected function createFromArray(array $data, $type)
    {
        $libraryClass = $this->libraryNamespace.ucfirst($type);

        /** @type Library $library */
        $library = new $libraryClass;

        // TODO: Update the add function to take a single array for optimisations
        foreach ($data as $name => $class) {
            $library->add($name, $class);
        }

        return $library;
    }
}
