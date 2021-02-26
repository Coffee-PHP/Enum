<?php

/**
 * EnumTest.php
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


use CoffeePhp\Enum\Test\Mock\MockBoolEnum;
use CoffeePhp\Enum\Test\Mock\MockFloatEnum;
use CoffeePhp\Enum\Test\Mock\MockIntEnum;
use CoffeePhp\Enum\Test\Mock\MockMixedEnum;
use CoffeePhp\Enum\Test\Mock\MockNullableBoolEnum;
use CoffeePhp\Enum\Test\Mock\MockNullableFloatEnum;
use CoffeePhp\Enum\Test\Mock\MockNullableIntEnum;
use CoffeePhp\Enum\Test\Mock\MockNullableStringEnum;
use CoffeePhp\Enum\Test\Mock\MockStringEnum;
use CoffeePhp\QualityTools\TestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertSame;
use function PHPUnit\Framework\assertTrue;

/**
 * Class EnumTest
 * @package coffeephp\enum
 * @since 2020-08-03
 * @author Danny Damsky <dannydamsky99@gmail.com>
 */
final class EnumTest extends TestCase
{
    public function testEnums(): void
    {
        assertSame(MockBoolEnum::ONE(), MockBoolEnum::ONE());
        assertSame('ONE', MockBoolEnum::ONE()->name);
        assertFalse(MockBoolEnum::ONE()->value);
        assertSame('', (string)MockBoolEnum::ONE());

        assertSame(MockBoolEnum::TWO(), MockBoolEnum::TWO());
        assertSame('TWO', MockBoolEnum::TWO()->name);
        assertTrue(MockBoolEnum::TWO()->value);
        assertSame('1', (string)MockBoolEnum::TWO());

        assertSame(MockFloatEnum::ONE(), MockFloatEnum::ONE());
        assertSame('ONE', MockFloatEnum::ONE()->name);
        assertSame(1.1, MockFloatEnum::ONE()->value);
        assertSame('1.1', (string)MockFloatEnum::ONE());

        assertSame(MockFloatEnum::TWO(), MockFloatEnum::TWO());
        assertSame('TWO', MockFloatEnum::TWO()->name);
        assertSame(2.2, MockFloatEnum::TWO()->value);
        assertSame('2.2', (string)MockFloatEnum::TWO());

        assertSame(MockFloatEnum::THREE(), MockFloatEnum::THREE());
        assertSame('THREE', MockFloatEnum::THREE()->name);
        assertSame(3.3, MockFloatEnum::THREE()->value);
        assertSame('3.3', (string)MockFloatEnum::THREE());

        assertSame(MockIntEnum::ONE(), MockIntEnum::ONE());
        assertSame('ONE', MockIntEnum::ONE()->name);
        assertSame(1, MockIntEnum::ONE()->value);
        assertSame('1', (string)MockIntEnum::ONE());

        assertSame(MockIntEnum::TWO(), MockIntEnum::TWO());
        assertSame('TWO', MockIntEnum::TWO()->name);
        assertSame(2, MockIntEnum::TWO()->value);
        assertSame('2', (string)MockIntEnum::TWO());

        assertSame(MockIntEnum::THREE(), MockIntEnum::THREE());
        assertSame('THREE', MockIntEnum::THREE()->name);
        assertSame(3, MockIntEnum::THREE()->value);
        assertSame('3', (string)MockIntEnum::THREE());

        assertSame(MockMixedEnum::ONE(), MockMixedEnum::ONE());
        assertSame('ONE', MockMixedEnum::ONE()->name);
        assertSame(1.1, MockMixedEnum::ONE()->value);
        assertSame('1.1', (string)MockMixedEnum::ONE());

        assertSame(MockMixedEnum::TWO(), MockMixedEnum::TWO());
        assertSame('TWO', MockMixedEnum::TWO()->name);
        assertSame(2, MockMixedEnum::TWO()->value);
        assertSame('2', (string)MockMixedEnum::TWO());

        assertSame(MockMixedEnum::THREE(), MockMixedEnum::THREE());
        assertSame('THREE', MockMixedEnum::THREE()->name);
        assertSame('three', MockMixedEnum::THREE()->value);
        assertSame('three', (string)MockMixedEnum::THREE());

        assertSame(MockMixedEnum::FOUR(), MockMixedEnum::FOUR());
        assertSame('FOUR', MockMixedEnum::FOUR()->name);
        assertSame(null, MockMixedEnum::FOUR()->value);
        assertSame('', (string)MockMixedEnum::FOUR());

        assertSame(MockMixedEnum::FIVE(), MockMixedEnum::FIVE());
        assertSame('FIVE', MockMixedEnum::FIVE()->name);
        assertSame(true, MockMixedEnum::FIVE()->value);
        assertSame('1', (string)MockMixedEnum::FIVE());

        assertSame(MockNullableBoolEnum::ONE(), MockNullableBoolEnum::ONE());
        assertSame('ONE', MockNullableBoolEnum::ONE()->name);
        assertFalse(MockNullableBoolEnum::ONE()->value);
        assertSame('', (string)MockNullableBoolEnum::ONE());

        assertSame(MockNullableBoolEnum::TWO(), MockNullableBoolEnum::TWO());
        assertSame('TWO', MockNullableBoolEnum::TWO()->name);
        assertTrue(MockNullableBoolEnum::TWO()->value);
        assertSame('1', (string)MockNullableBoolEnum::TWO());

        assertSame(MockNullableBoolEnum::THREE(), MockNullableBoolEnum::THREE());
        assertSame('THREE', MockNullableBoolEnum::THREE()->name);
        assertNull(MockNullableBoolEnum::THREE()->value);
        assertSame('', (string)MockNullableBoolEnum::THREE());

        assertSame(MockNullableFloatEnum::ONE(), MockNullableFloatEnum::ONE());
        assertSame('ONE', MockNullableFloatEnum::ONE()->name);
        assertSame(1.1, MockNullableFloatEnum::ONE()->value);
        assertSame('1.1', (string)MockNullableFloatEnum::ONE());

        assertSame(MockNullableFloatEnum::TWO(), MockNullableFloatEnum::TWO());
        assertSame('TWO', MockNullableFloatEnum::TWO()->name);
        assertSame(2.2, MockNullableFloatEnum::TWO()->value);
        assertSame('2.2', (string)MockNullableFloatEnum::TWO());

        assertSame(MockNullableFloatEnum::THREE(), MockNullableFloatEnum::THREE());
        assertSame('THREE', MockNullableFloatEnum::THREE()->name);
        assertNull(MockNullableFloatEnum::THREE()->value);
        assertSame('', (string)MockNullableFloatEnum::THREE());

        assertSame(MockNullableIntEnum::ONE(), MockNullableIntEnum::ONE());
        assertSame('ONE', MockNullableIntEnum::ONE()->name);
        assertSame(1, MockNullableIntEnum::ONE()->value);
        assertSame('1', (string)MockNullableIntEnum::ONE());

        assertSame(MockNullableIntEnum::TWO(), MockNullableIntEnum::TWO());
        assertSame('TWO', MockNullableIntEnum::TWO()->name);
        assertSame(2, MockNullableIntEnum::TWO()->value);
        assertSame('2', (string)MockNullableIntEnum::TWO());

        assertSame(MockNullableIntEnum::THREE(), MockNullableIntEnum::THREE());
        assertSame('THREE', MockNullableIntEnum::THREE()->name);
        assertNull(MockNullableIntEnum::THREE()->value);
        assertSame('', (string)MockNullableIntEnum::THREE());

        assertSame(MockNullableStringEnum::ONE(), MockNullableStringEnum::ONE());
        assertSame('ONE', MockNullableStringEnum::ONE()->name);
        assertSame('one', MockNullableStringEnum::ONE()->value);
        assertSame('one', (string)MockNullableStringEnum::ONE());

        assertSame(MockNullableStringEnum::TWO(), MockNullableStringEnum::TWO());
        assertSame('TWO', MockNullableStringEnum::TWO()->name);
        assertSame('two', MockNullableStringEnum::TWO()->value);
        assertSame('two', (string)MockNullableStringEnum::TWO());

        assertSame(MockNullableStringEnum::THREE(), MockNullableStringEnum::THREE());
        assertSame('THREE', MockNullableStringEnum::THREE()->name);
        assertNull(MockNullableStringEnum::THREE()->value);
        assertSame('', (string)MockNullableStringEnum::THREE());

        assertSame(MockStringEnum::ONE(), MockStringEnum::ONE());
        assertSame('ONE', MockStringEnum::ONE()->name);
        assertSame('one', MockStringEnum::ONE()->value);
        assertSame('one', (string)MockStringEnum::ONE());

        assertSame(MockStringEnum::TWO(), MockStringEnum::TWO());
        assertSame('TWO', MockStringEnum::TWO()->name);
        assertSame('two', MockStringEnum::TWO()->value);
        assertSame('two', (string)MockStringEnum::TWO());

        assertSame(MockStringEnum::THREE(), MockStringEnum::THREE());
        assertSame('THREE', MockStringEnum::THREE()->name);
        assertSame('three', MockStringEnum::THREE()->value);
        assertSame('three', (string)MockStringEnum::THREE());
    }
}
