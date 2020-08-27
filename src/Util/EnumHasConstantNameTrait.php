<?php

/**
 * EnumHasConstantNameTrait.php
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
 * @since 2020-08-12
 */

declare (strict_types=1);

namespace CoffeePhp\Enum\Util;


use function array_key_exists;

/**
 * Trait EnumHasConstantNameTrait
 * @package coffeephp\enum
 * @since 2020-08-12
 * @author Danny Damsky <dannydamsky99@gmail.com>
 */
trait EnumHasConstantNameTrait
{
    /**
     * @inheritDoc
     */
    final public static function hasConstantName(string $constantName): bool
    {
        return array_key_exists($constantName, static::getConstants());
    }
}
