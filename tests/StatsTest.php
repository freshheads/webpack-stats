<?php

namespace FH\WebpackStats;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class StatsTest extends \PHPUnit_Framework_TestCase
{
    public function testHasAssetsByChunkName()
    {
        $stats = new Stats(['assetsByChunkName' => ['app' => 'app.js']]);
        $this->assertTrue($stats->hasAssetsByChunkName());

        $stats = new Stats(['hash' => '5d187f7672826911f3ed']);
        $this->assertFalse($stats->hasAssetsByChunkName());
    }
}
