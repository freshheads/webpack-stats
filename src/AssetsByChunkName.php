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

use FH\WebpackStats\Exception\ChunkNotFoundException;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class AssetsByChunkName
{
    /**
     * @var array
     */
    private $assetsByChunkName;

    public function __construct(array $assetsByChunkName)
    {
        $this->assetsByChunkName = $assetsByChunkName;
    }

    /**
     * Returns the first matching asset in the given chunk. Matches everything by default.
     *
     * @param string $chunkName name of the chunk to look for assets.
     * @param string $pattern regular expression that should be matched (defaults to .*)
     * @return string|null
     *
     * @throws ChunkNotFoundException
     */
    public function getAsset($chunkName, $pattern = '/.*/')
    {
        foreach ($this->getAssets($chunkName) as $filename) {
            if (preg_match($pattern, $filename)) {
                return $filename;
            }
        }

        return null;
    }

    /**
     * @param string $chunkName
     * @return array list of assets for the given chunk
     *
     * @throws ChunkNotFoundException
     */
    public function getAssets($chunkName)
    {
        if (!isset($this->assetsByChunkName[$chunkName])) {
            throw ChunkNotFoundException::create($chunkName);
        }

        return (array) $this->assetsByChunkName[$chunkName];
    }
}
