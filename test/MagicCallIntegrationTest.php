<?php

namespace {
    include_once __DIR__ . '/mockup/MagicCall.php';
}

namespace PatrickBierans\ContainerIntegration {

    use PatrickBierans\Container\SolidContainer;
    use PatrickBierans\ContainerIntegration\Mockup\MagicCall;
    use PHPUnit\Framework\TestCase;

    /**
     * Class MagicCallIntegrationTest
     * @package PatrickBierans\ContainerIntegration
     */
    class MagicCallIntegrationTest extends TestCase {

        /**
         * @expectedException \PatrickBierans\ContainerIntegration\UnsetException
         * @expectedExceptionMessage callables were not set for trait
         */
        public function testMagicCallExceptionNull(): void {
            $instance = new MagicCall();
            $instance->anything();
        }

        public function testMagicCall(): void {
            $instance = new MagicCall();
            $instance->setMagicCallContainer(new SolidContainer([
                'callHighFive' => [$this, 'highfive']
            ]));
            $this->assertFalse($instance->hasMagicCall('some_undefined_key'));
            $this->assertTrue($instance->hasMagicCall('callHighFive'));
            $this->assertEquals(5, $instance->callHighFive());
        }

        /** @noinspection PhpUnusedPrivateMethodInspection */
        public function highfive(): int {
            return 5;
        }
    }
}