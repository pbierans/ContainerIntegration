<?php /** @noinspection PhpUndefinedFieldInspection */

namespace PatrickBierans\ContainerIntegration;

use PatrickBierans\Container\SolidContainer;
use PHPUnit\Framework\TestCase;

class MagicGetIntegrationTest extends TestCase {

    use MagicGetIntegration;

    public function testMagicGet(): void {
        $this->setMagicGetContainer(new SolidContainer([
            'key' => 'value'
        ]));

        $this->assertFalse($this->hasMagicGet(['undefined key']));
        $this->assertTrue($this->hasMagicGet(['key']));
        $this->assertEquals('value', $this->key);
    }
}