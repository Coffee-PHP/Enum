<?php

/**
 * MockNullableIntEnum.php
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

namespace CoffeePhp\Enum\Test\Mock;


use CoffeePhp\Enum\AbstractNullableIntEnum;

/**
 * Class MockNullableIntEnum
 * @package coffeephp\enum
 * @since 2020-08-03
 * @author Danny Damsky <dannydamsky99@gmail.com>
 * @method static static ONE()
 * @method static static TWO()
 * @method static static THREE()
 * @note Do not add the properties manually in extending enums, this is only for tests.
 * @property string $name
 * @property int|null $value
 */
final class MockNullableIntEnum extends AbstractNullableIntEnum
{

    /**
     * @inheritDoc
     */
    public static function getConstants(): iterable
    {
        return [
            'ONE' => 1,
            'TWO' => 2,
            'THREE' => null
        ];
    }
}
