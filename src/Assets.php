<?php

declare(strict_types=1);

/*
 * This file is part of the Freshheads Webpack stats library.
 *
 * (c) Freshheads B.V. <info@freshheads.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FH\WebpackStats;

use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 * @implements IteratorAggregate<int, Asset>
 */
class Assets implements IteratorAggregate, Countable
{
    /**
     * @var Asset[]
     */
    private array $assets = [];

    /**
     * @param array<int, array<string, mixed>> $assets
     */
    public function __construct(array $assets)
    {
        foreach ($assets as $asset) {
            if (!\is_array($asset) || !isset($asset['name'])) {
                continue;
            }

            if (!\is_string($asset['name'])) {
                continue;
            }

            $this->assets[] = new Asset(
                $asset['name'],
                isset($asset['size']) && \is_int($asset['size']) ? $asset['size'] : null,
                isset($asset['chunks']) && \is_array($asset['chunks']) ? $asset['chunks'] : [],
                isset($asset['chunkNames']) && \is_array($asset['chunkNames']) ? $asset['chunkNames'] : []
            );
        }
    }

    /**
     * @return ArrayIterator<int, Asset>
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->assets);
    }

    public function count(): int
    {
        return \count($this->assets);
    }
}
