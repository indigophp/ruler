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
 * Helps to handle a parameter
 *
 * Classes using this trait should implement HasParameter
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait Parameter
{
    /**
     * @var mixed
     */
    private $parameter;

    /**
     * @param mixed $parameter
     */
    public function __construct($parameter = null)
    {
        $this->setParameter($parameter);
    }

    /**
     * {@inheritdoc}
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * {@inheritdoc}
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }
}
