<?php

/**
 * AbstractEnumTest.php
 *
 * Copyright 2020 Danny Damsky
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package coffeephp\enum
 * @author Danny Damsky <dannydamsky99@gmail.com>
 * @since 2020-08-03
 */

declare (strict_types=1);

namespace CoffeePhp\Enum\Test\Unit;

use CoffeePhp\Enum\Contract\EnumInterface;
use CoffeePhp\QualityTools\TestCase;

use function array_pop;
use function explode;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertSameSize;
use function PHPUnit\Framework\assertTrue;
use function serialize;
use function unserialize;

/**
 * Class AbstractEnumTest
 * @package coffeephp\enum
 * @since 2020-08-03
 * @author Danny Damsky <dannydamsky99@gmail.com>
 */
abstract class AbstractEnumTest extends TestCase
{
    /**
     * @return array<int, class-string<EnumInterface>>
     */
    abstract protected function getClassesToTest(): array;

    /**
     * @return array<string, array<int, class-string<EnumInterface>>>
     */
    final public function classesProvider(): array
    {
        $classes = $this->getClassesToTest();
        $data = [];
        foreach ($classes as $class) {
            $classSplitByNamespace = explode('\\', $class);
            $className = array_pop($classSplitByNamespace);
            $data[$className] = [$class];
        }
        return $data;
    }

    /**
     * @dataProvider classesProvider
     * @param EnumInterface|string $class
     * @noinspection PhpDocSignatureInspection
     */
    final public function testEnum(string $class): void
    {
        assertSameSize($class::getConstants(), $class::getInstances());
        assertEquals(array_keys($class::getConstants()), array_keys($class::getInstances()));
        foreach ($class::getConstants() as $key => $value) {
            $instance = $class::getInstances()[$key];
            assertTrue($instance::hasConstantName($key), (string)$key);
            assertTrue($instance::hasConstantValue($value), (string)$value);
            assertSame($key, $instance->getKey(), "{$key} : {$instance->getKey()}");
            assertSame($value, $instance->getValue(), "{$value} : {$instance->getValue()}");
            assertSame($instance, $class::$key(), 'Instance');
            assertSame($value, $instance::getConstantValueByName($key));
            assertSame($key, $instance::getConstantNameByValue($value));
            assertSame($instance, $instance::getInstanceByConstantName($key));
            assertSame($instance, $instance::getInstanceByConstantValue($value));
            assertEquals($instance, unserialize(serialize($instance)));
        }
    }
}
