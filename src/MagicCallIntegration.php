<?php

namespace PatrickBierans\ContainerIntegration;

use PatrickBierans\Container\SolidContainer;
use PatrickBierans\Container\VariableContainer;

/**
 * Use this if you want to use an array of callables
 * as methods on the class using this trait.
 * Don't forget to setCallablesContainer()
 * or you will get an UnsetException
 * @see DefaultTemplateTest
 */
trait MagicCallIntegration {

    /**
     * @var SolidContainer|VariableContainer|null
     */
    protected $MagicCallContainer;

    /**
     *
     */
    public function unsetMagicCallContainer(): void {
        $this->MagicCallContainer = null;
    }

    /**
     * @return SolidContainer|VariableContainer|null
     */
    public function getMagicCallContainer() {
        return $this->MagicCallContainer;
    }

    /**
     * @param SolidContainer|null $MagicCallContainer
     */
    public function setMagicCallContainer(SolidContainer $MagicCallContainer): void {
        $this->MagicCallContainer = $MagicCallContainer;
    }

    /**
     * @param string $function
     * @param array $arguments
     *
     * @return mixed
     * @throws UnsetException
     * @throws \RuntimeException
     * @throws \Exception
     */
    public function __call($function, $arguments) {
        if ($this->MagicCallContainer === null) {
            throw new UnsetException('callables were not set for trait');
        }
        return $this->MagicCallContainer->__call($function, $arguments);
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function hasMagicCall($key): bool {
        return $this->MagicCallContainer->has([$key]);
    }
}