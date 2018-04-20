<?php

namespace {
    include_once __DIR__ . '/mockup/MagicGet.php';
}

namespace PatrickBierans\ContainerIntegration {

    use PatrickBierans\Container\SolidContainer;
    use PatrickBierans\ContainerIntegration\Mockup\MagicGet;
    use PHPUnit\Framework\TestCase;

    class MagicGetIntegrationTest extends TestCase {

        public function testMagicGet(): void {
            $instance = new MagicGet();

            $instance->setMagicGetContainer(new SolidContainer([
                'key' => 'value'
            ]));

            $this->assertFalse($instance->hasMagicGet(['undefined key']));
            $this->assertTrue($instance->hasMagicGet(['key']));
            $this->assertEquals('value', $instance->key);
        }
    }
}