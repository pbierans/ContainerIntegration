<?php

namespace PatrickBierans\ContainerIntegration;

use PatrickBierans\Container\SolidContainer;
use PatrickBierans\Container\VariableContainer;

/**
 * Use this if you want to use a (nested) array structure as a scope full of variables.
 * Don't forget to setMagicGetContainer()
 * or you will get an UnsetException
 * @see DefaultTemplateTest
 */
trait MagicGetIntegration {

    /**
     * @var SolidContainer|VariableContainer|null
     */
    protected $MagicGetContainer;

    /**
     * @param SolidContainer|null $MagicGetContainer
     */
    public function setMagicGetContainer(SolidContainer $MagicGetContainer): void {
        $this->MagicGetContainer = $MagicGetContainer;
    }

    /**
     * @param string $property
     *
     * @return mixed|array|string
     * @throws \Exception
     */
    public function __get($property) {
        if ($this->MagicGetContainer === null) {
            throw new UnsetException('MagicGetContainer was not set for trait');
        }
        return $this->MagicGetContainer->__get($property);
    }

    /**
     * @param string[] $keys
     *
     * @return bool
     */
    public function hasMagicGet(array $keys): bool {
        return $this->MagicGetContainer->has($keys);
    }

}