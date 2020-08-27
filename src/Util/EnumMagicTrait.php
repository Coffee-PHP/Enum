<?php

/**
 * EnumMagicTrait.php
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


use BadMethodCallException;

use function sprintf;

/**
 * Trait EnumMagicTrait
 * @package coffeephp\enum
 * @since 2020-08-12
 * @author Danny Damsky <dannydamsky99@gmail.com>
 */
trait EnumMagicTrait
{

    /**
     * @param string $name
     * @param array $arguments
     * @return static
     */
    final public static function __callStatic($name, $arguments): self
    {
        $instances = static::getInstances();
        if (isset($instances[$name])) {
            return $instances[$name];
        }
        throw new BadMethodCallException(
            sprintf(
                'Unknown constant name for enum %s detected: %s',
                static::class,
                $name
            )
        );
    }
}
