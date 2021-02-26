<?php

/**
 * AbstractMixedEnum.php
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
 * @since 2020-07-28
 */

declare(strict_types=1);

namespace CoffeePhp\Enum;

use Error;

/**
 * Class AbstractMixedEnum
 * @package coffeephp\enum
 * @since 2020-07-28
 * @author Danny Damsky <dannydamsky99@gmail.com>
 * @property-read string $name
 * @property-read mixed $value
 * @psalm-immutable
 */
abstract class AbstractMixedEnum
{
    /**
     * @var array<string, array<string, static>>
     */
    private static array $instances = [];

    /**
     * Magic method, returns the enum instance on a static method call.
     *
     * @param string $name
     * @param array $arguments
     * @return static
     */
    final public static function __callStatic(string $name, array $arguments): static
    {
        $instances = static::getInstances();
        if (isset($instances[$name])) {
            return $instances[$name];
        }
        throw new Error('Call to undefined method ' . static::class . '::' . $name . '()');
    }

    /**
     * Get a map of constant names as keys
     * and enum instances as values.
     *
     * @return array<string, static>
     */
    final protected static function getInstances(): array
    {
        if (!isset(self::$instances[static::class])) {
            $instances = [];
            /** @psalm-suppress MixedAssignment */
            foreach (static::getConstants() as $key => $value) {
                $instances[$key] = new static($key, $value);
            }
            self::$instances[static::class] = $instances;
        }
        return self::$instances[static::class];
    }


    /**
     * Get a map of constants that are available
     * for the current enum.
     *
     * @return iterable<string, mixed>
     *     A map of constant names as keys and constant values as values.
     */
    abstract protected static function getConstants(): iterable;

    /**
     * AbstractMixedEnum constructor.
     * @param string $name
     * @param mixed $value
     */
    final protected function __construct(public string $name, public mixed $value)
    {
    }

    /**
     * Magic method {@see https://www.php.net/manual/en/language.oop5.magic.php}
     * called during serialization to string.
     *
     * @return string Returns string representation of the object that
     * implements this interface (and/or "__toString" magic method).
     */
    final public function __toString(): string
    {
        return (string)$this->value;
    }
}
