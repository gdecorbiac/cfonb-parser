<?php

/*
 * This file is part of the CFONB Parser package.
 *
 * (c) Guillaume Sainthillier <hello@silarhi.fr>
 * (c) @fezfez <demonchaux.stephane@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Silarhi\Cfonb\Parser\Cfonb120;

use Silarhi\Cfonb\Banking\Balance;
use Silarhi\Cfonb\Banking\Noop;
use Silarhi\Cfonb\Contracts\ParserInterface;
use Silarhi\Cfonb\Parser\LineParser;
use Silarhi\Cfonb\Parser\AmountParser;
use Silarhi\Cfonb\Parser\DateParser;

class EmptyParser implements ParserInterface
{
    public function parse(string $content) : Noop
    {
        return new Noop();
    }

    public function supports(string $content): bool
    {
        return empty($content);
    }
}
