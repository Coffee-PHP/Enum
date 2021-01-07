<?php

/**
 * EnumSerializableTrait.php
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
 * @since 2020-09-03
 */

declare(strict_types=1);

namespace CoffeePhp\Enum\Util;

use function serialize;
use function unserialize;

/**
 * Trait EnumSerializableTrait
 * @package coffeephp\enum
 * @since 2020-09-03
 * @author Danny Damsky <dannydamsky99@gmail.com>
 */
trait EnumSerializableTrait
{
    /**
     * @inheritDoc
     */
    final public function serialize(): string
    {
        return serialize(
            [
                'key' => $this->key,
                'value' => $this->value
            ]
        );
    }

    /**
     * @inheritDoc
     * @param string $serialized
     * @noinspection UnserializeExploitsInspection
     * @noinspection PhpMissingParamTypeInspection
     */
    final public function unserialize($serialized): void
    {
        [
            'key' => $this->key,
            'value' => $this->value
        ] = (array)unserialize($serialized);
    }
}
