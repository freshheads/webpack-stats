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

use FH\WebpackStats\Exception\PropertyNotFoundException;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class Stats
{
    /**
     * @var array
     */
    private $stats;

    public function __construct(array $stats)
    {
        $this->stats = $stats;
    }

    /**
     * @return AssetsByChunkName
     * @throws PropertyNotFoundException
     */
    public function getAssetsByChunkName()
    {
        if (!$this->hasAssetsByChunkName()) {
            throw PropertyNotFoundException::create('assetsByChunkName');
        }

        return new AssetsByChunkName((array) $this->stats['assetsByChunkName']);
    }

    /**
     * @return bool
     */
    public function hasAssetsByChunkName()
    {
        return
            isset($this->stats['assetsByChunkName'])
            && (is_string($this->stats['assetsByChunkName']) || is_array($this->stats['assetsByChunkName']));
    }
}
