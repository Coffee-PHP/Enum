<?php

/**
 * AbstractNullableStringEnum.php
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
 * Class AbstractNullableStringEnum
 *
 * Represents a nullable string enumerable object.
 *
 * @package coffeephp\enum
 * @since 2020-07-28
 * @author Danny Damsky <dannydamsky99@gmail.com>
 * @property-read string $name
 * @property-read string|null $value
 */
abstract class AbstractNullableStringEnum
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
     * @return iterable<string, string|null>
     *     A map of constant names as keys and constant values as values.
     * @noinspection PhpDocSignatureInspection
     */
    abstract protected static function getConstants(): iterable;

    /**
     * Nullable string enumerable constructor.
     *
     * @param string $name
     * @param string|null $value
     */
    final private function __construct(private string $name, private ?string $value)
    {
    }

    /**
     * Give read-only access to $name and $value.
     *
     * @param string $name
     * @return mixed
     */
    final public function __get(string $name): mixed
    {
        return $this->{$name};
    }

    /**
     * Restrict write access to $name and $value.
     *
     * @param string $name
     * @param mixed $value
     */
    final public function __set(string $name, mixed $value): void
    {
        throw new Error('The class ' . static::class . ' is immutable and cannot be modified');
    }

    /**
     * Basic implementation of __isset() for checking if a class property exists.
     *
     * @param string $name
     * @return bool
     */
    final public function __isset(string $name): bool
    {
        return isset($this->{$name});
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
