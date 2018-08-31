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
final class StatsTest extends \PHPUnit_Framework_TestCase
{
    public function testHasAssetsByChunkName()
    {
        $stats = new Stats(['assetsByChunkName' => ['app' => 'app.js']]);
        $this->assertTrue($stats->hasAssetsByChunkName());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed']);
        $this->assertFalse($stats->hasAssetsByChunkName());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed', 'assetsByChunkName' => null]);
        $this->assertFalse($stats->hasAssetsByChunkName());
    }

    public function testHasAssets()
    {
        $stats = new Stats([
            'assets' => [
                [
                    "name" => "image1.jpg"
                ],
                [
                    "name" => "image2.jpg",
                    "size" => 28052
                ]
            ]
        ]);
        $this->assertTrue($stats->hasAssets());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed']);
        $this->assertFalse($stats->hasAssets());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed', 'assets' => null]);
        $this->assertFalse($stats->hasAssets());
    }

    /**
     * @expectedException FH\WebpackStats\Exception\PropertyNotFoundException
     */
    public function testGetAssetsThrowsExceptionIfNoAssetsAreDefined()
    {
        $stats = new Stats([]);

        $stats->getAssets();
    }

    /**
     * @expectedException FH\WebpackStats\Exception\PropertyNotFoundException
     */
    public function testGetAssetsByChunkNameThrowsExceptionIfNoAssetsByChunkNameAreDefined()
    {
        $stats = new Stats([]);

        $stats->getAssetsByChunkName();
    }
}
