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
use PHPUnit\Framework\TestCase;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
final class StatsTest extends TestCase
{
    public function testHasAssetsByChunkName(): void
    {
        $stats = new Stats(['assetsByChunkName' => ['app' => 'app.js']]);
        $this->assertTrue($stats->hasAssetsByChunkName());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed']);
        $this->assertFalse($stats->hasAssetsByChunkName());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed', 'assetsByChunkName' => null]);
        $this->assertFalse($stats->hasAssetsByChunkName());
    }

    public function testHasAssets(): void
    {
        $stats = new Stats([
            'assets' => [
                [
                    'name' => 'image1.jpg',
                ],
                [
                    'name' => 'image2.jpg',
                    'size' => 28052,
                ],
            ],
        ]);
        $this->assertTrue($stats->hasAssets());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed']);
        $this->assertFalse($stats->hasAssets());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed', 'assets' => null]);
        $this->assertFalse($stats->hasAssets());
    }

    public function testGetAssetsThrowsExceptionIfNoAssetsAreDefined(): void
    {
        $this->expectException(PropertyNotFoundException::class);

        $stats = new Stats([]);
        $stats->getAssets();
    }

    public function testGetAssetsByChunkNameThrowsExceptionIfNoAssetsByChunkNameAreDefined(): void
    {
        $this->expectException(PropertyNotFoundException::class);

        $stats = new Stats([]);
        $stats->getAssetsByChunkName();
    }
}
