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

use FH\WebpackStats\Exception\ChunkNotFoundException;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class AssetsByChunkName
{
    /**
     * @var array<string, mixed>
     */
    private array $assetsByChunkName;

    /**
     * @param array<string, mixed> $assetsByChunkName
     */
    public function __construct(array $assetsByChunkName)
    {
        $this->assetsByChunkName = $assetsByChunkName;
    }

    /**
     * Returns the first matching asset in the given chunk. Matches everything by default.
     *
     * @param string $chunkName name of the chunk to look for assets
     * @param string $pattern   regular expression that should be matched (defaults to .*)
     *
     * @throws ChunkNotFoundException
     */
    public function getAsset(string $chunkName, string $pattern = '/.*/'): ?string
    {
        foreach ($this->getAssets($chunkName) as $filename) {
            if (!\is_string($filename)) {
                continue;
            }

            if (preg_match($pattern, $filename)) {
                return $filename;
            }
        }

        return null;
    }

    /**
     * @throws ChunkNotFoundException
     *
     * @return array<string, mixed> list of assets for the given chunk
     */
    public function getAssets(string $chunkName): array
    {
        if (!isset($this->assetsByChunkName[$chunkName])) {
            throw ChunkNotFoundException::create($chunkName);
        }

        return (array) $this->assetsByChunkName[$chunkName];
    }
}
