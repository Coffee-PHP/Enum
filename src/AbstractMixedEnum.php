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
 * @noinspection PhpSuperClassIncompatibleWithInterfaceInspection
 */

declare(strict_types=1);

namespace CoffeePhp\Enum;

use CoffeePhp\Enum\Contract\EnumInterface;
use CoffeePhp\Enum\Util\EnumGetConstantNameByValueTrait;
use CoffeePhp\Enum\Util\EnumGetConstantValueByNameTrait;
use CoffeePhp\Enum\Util\EnumGetInstanceByConstantNameTrait;
use CoffeePhp\Enum\Util\EnumGetInstanceByConstantValueTrait;
use CoffeePhp\Enum\Util\EnumGetInstancesTrait;
use CoffeePhp\Enum\Util\EnumHasConstantNameTrait;
use CoffeePhp\Enum\Util\EnumHasConstantValueTrait;
use CoffeePhp\Enum\Util\EnumJsonSerializableTrait;
use CoffeePhp\Enum\Util\EnumMagicTrait;
use CoffeePhp\Enum\Util\EnumSerializableTrait;

/**
 * Class AbstractMixedEnum
 * @package coffeephp\enum
 * @since 2020-07-28
 * @author Danny Damsky <dannydamsky99@gmail.com>
 */
abstract class AbstractMixedEnum implements EnumInterface
{
    use EnumGetConstantNameByValueTrait;
    use EnumGetConstantValueByNameTrait;
    use EnumGetInstanceByConstantNameTrait;
    use EnumGetInstanceByConstantValueTrait;
    use EnumGetInstancesTrait;
    use EnumHasConstantNameTrait;
    use EnumHasConstantValueTrait;
    use EnumMagicTrait;
    use EnumSerializableTrait;
    use EnumJsonSerializableTrait;

    private string $key;

    /**
     * @var mixed
     */
    private $value;

    /**
     * AbstractMixedEnum constructor.
     * @param string $key
     * @param mixed $value
     */
    final protected function __construct(string $key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    final public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @inheritDoc
     * @return mixed
     */
    final public function getValue()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    final public function __toString(): string
    {
        return (string)$this->value;
    }
}
