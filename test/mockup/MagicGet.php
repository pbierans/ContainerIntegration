<?php

namespace PatrickBierans\ContainerIntegration\Mockup;

use PatrickBierans\Container\SolidContainer;
use PatrickBierans\ContainerIntegration\MagicGetIntegration;

/**
 * @property string key
 * @method setMagicGetContainer(SolidContainer $Container): void
 * @method hasMagicGet(array $keys):bool
 */
class MagicGet {
    use MagicGetIntegration;
}