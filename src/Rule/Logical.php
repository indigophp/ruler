<?php

/*
 * This file is part of the Indigo Ruler package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Ruler\Rule;

use Indigo\Ruler\Rule;

/**
 * Common logic for logical comparison rules
 *
 * @author Steve West
 */
abstract class Logical implements Rule
{
    /**
     * @var Rule
     */
    protected $left;

    /**
     * @var Rule
     */
    protected $right;

    /**
     * @return Rule
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param Rule $left
     */
    public function setLeft(Rule $left)
    {
        $this->left = $left;
    }

    /**
     * @return Rule
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param Rule $right
     */
    public function setRight(Rule $right)
    {
        $this->right = $right;
    }
}
