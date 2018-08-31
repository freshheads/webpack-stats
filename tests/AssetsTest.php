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

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
final class AssetsTest extends \PHPUnit_Framework_TestCase
{
    private $assets = [
        [
            "name" => "vendors-bootstrapPlugins.29f80f81df1977385c82.vendors-bootstrapPlugins.js",
            "size" => 28052,
            "chunks" => [
                "vendors-bootstrapPlugins"
            ],
            "chunkNames" => [
                "vendors-bootstrapPlugins"
            ]
        ],
        [
            "name" => "7b9776076d5fceef4993b55c9383dedd.gif",
            "size" => 1849,
            "chunks" => [],
            "chunkNames" => []
        ],
        [
            "name" => "49e3f006018662f60f1db2aec0b2cca9.png",
            "size" => 845,
            "chunks" => [],
            "chunkNames" => []
        ]
    ];

    public function testAssetsCanBeCreatedFromArray()
    {
        $assets = new Assets($this->assets);

        $this->assertCount(count($this->assets), $assets);
    }

    public function testMalformedAssetsAreSkipped()
    {
        $malformedAssets = [
            [
                'nameXXX' => 'test.jpg'
            ]
        ];
        $assets = new Assets($malformedAssets);

        $this->assertCount(0, $assets);
    }
}
