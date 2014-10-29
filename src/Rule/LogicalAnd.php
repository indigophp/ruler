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

/**
 * AND logical comparison rule
 *
 * @author Steve West
 */
class LogicalAnd extends Logical
{
    /**
     * {@inheritdoc}
     */
    public function check($context)
    {
        return $this->left->check($context) && $this->right->check($context);
    }
}
