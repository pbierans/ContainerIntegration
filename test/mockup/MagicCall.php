<?php

namespace PatrickBierans\ContainerIntegration\Mockup;

use PatrickBierans\Container\SolidContainer;
use PatrickBierans\ContainerIntegration\MagicCallIntegration;

/**
 * @method anything(): string will not be defined
 * @method callHighFive(): string string anything will not be defined
 * @method setMagicCallContainer(SolidContainer $Container): void
 * @method hasMagicCall(string $key): bool
 */
class MagicCall {
    use MagicCallIntegration;
}