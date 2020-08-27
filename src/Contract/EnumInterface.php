<?php

/**
 * EnumInterface.php
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
 * @since 2020-07-27
 */

declare (strict_types=1);

namespace CoffeePhp\Enum\Contract;


use JsonSerializable;

/**
 * Interface EnumInterface
 * @package coffeephp\enum
 * @since 2020-07-27
 * @author Danny Damsky <dannydamsky99@gmail.com>
 */
interface EnumInterface extends JsonSerializable
{
    /**
     * Get a map of constants that are available
     * for the current enum.
     *
     * @return array A map of constant names
     * as keys and constant values as values.
     */
    public static function getConstants(): array;

    /**
     * Get whether the given constant name exists
     * in the enum.
     *
     * @param string $constantName
     * @return bool
     */
    public static function hasConstantName(string $constantName): bool;

    /**
     * Get whether the given constant value exists in the enum.
     *
     * @param mixed $constantValue
     * @return bool
     */
    public static function hasConstantValue($constantValue): bool;

    /**
     * Get the constant value by the provided name.
     *
     * @param string $constantName
     * @return mixed
     */
    public static function getConstantValueByName(string $constantName);

    /**
     * Get the constant name by the provided value.
     *
     * @param mixed $constantValue
     * @return string
     */
    public static function getConstantNameByValue($constantValue): string;

    /**
     * Get a map of constant names as keys
     * and enum instances as values.
     *
     * @return static[]
     */
    public static function getInstances(): array;

    /**
     * Get an instance of this enum
     * by the constant name.
     *
     * @param string $constantName
     * @return static
     */
    public static function getInstanceByConstantName(string $constantName): self;

    /**
     * Get an instance of this enum
     * by the constant value.
     *
     * @param mixed $constantValue
     * @return static
     */
    public static function getInstanceByConstantValue($constantValue): self;

    /**
     * Get the enum key.
     *
     * @return string
     */
    public function getKey(): string;

    /**
     * Get the enum value.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Get the enum value as a string.
     *
     * @return string
     */
    public function __toString(): string;
}
