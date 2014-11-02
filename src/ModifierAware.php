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
 * Defines an ModifierAware helper
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait ModifierAware
{
    /**
     * @var Modifier
     */
    protected $modifier;

    /**
     * {@inheritdoc}
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * {@inheritdoc}
     */
    public function setModifier(Modifier $modifier)
    {
        $this->modifier = $modifier;
    }
}
