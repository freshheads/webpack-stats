<?php

/*
 * This file is part of the Freshheads Webpack stats library.
 *
 * (c) Freshheads B.V. <info@freshheads.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FH\WebpackStats;

use Traversable;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class Assets implements \IteratorAggregate, \Countable
{
    /**
     * @var Asset[]
     */
    private $assets = [];

    public function __construct(array $assets)
    {
        foreach ($assets as $asset) {
            if (!is_array($asset) || !isset($asset['name'])) {
                continue;
            }

            $this->assets[] = new Asset(
                $asset['name'],
                isset($asset['size']) ? $asset['size'] : null,
                isset($asset['chunks']) && is_array($asset['chunks']) ? $asset['chunks'] : null,
                isset($asset['chunkNames']) && is_array($asset['chunkNames']) ? $asset['chunkNames'] : null
            );
        }
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->assets);
    }

    public function count()
    {
        return count($this->assets);
    }
}
