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
 * Helps to handle target value on assertions and modifiers
 *
 * Classes using this trait should implement HasTargetValue
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait TargetValue
{
    /**
     * @var mixed
     */
    private $targetValue;

    /**
     * @param mixed $targetValue
     */
    public function __construct($targetValue = null)
    {
        $this->setTargetValue($targetValue);
    }

    /**
     * {@inheritdoc}
     */
    public function getTargetValue()
    {
        return $this->targetValue;
    }

    /**
     * {@inheritdoc}
     */
    public function setTargetValue($targetValue)
    {
        $this->targetValue = $targetValue;
    }
}
