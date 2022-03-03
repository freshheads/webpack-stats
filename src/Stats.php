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

use FH\WebpackStats\Exception\PropertyNotFoundException;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class Stats
{
    /**
     * @var array<string, mixed>
     */
    private array $stats;

    /**
     * @param array<string, mixed> $stats
     */
    public function __construct(array $stats)
    {
        $this->stats = $stats;
    }

    /**
     * @throws PropertyNotFoundException
     */
    public function getAssetsByChunkName(): AssetsByChunkName
    {
        if (!$this->hasAssetsByChunkName()) {
            throw PropertyNotFoundException::create('assetsByChunkName');
        }

        return new AssetsByChunkName((array) $this->stats['assetsByChunkName']);
    }

    public function hasAssetsByChunkName(): bool
    {
        return
            isset($this->stats['assetsByChunkName'])
            && (\is_string($this->stats['assetsByChunkName']) || \is_array($this->stats['assetsByChunkName']));
    }

    /**
     * @throws PropertyNotFoundException
     */
    public function getAssets(): Assets
    {
        if (!$this->hasAssets()) {
            throw PropertyNotFoundException::create('assets');
        }

        /** @var array<int, array<string, mixed>> $assets */
        $assets = $this->stats['assets'];

        return new Assets($assets);
    }

    public function hasAssets(): bool
    {
        return isset($this->stats['assets']) && \is_array($this->stats['assets']);
    }
}
