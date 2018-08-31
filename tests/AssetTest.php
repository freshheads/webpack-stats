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
final class AssetTest extends \PHPUnit_Framework_TestCase
{
    public function testAssetReturnsTheSameContentThatItWasCreatedWith()
    {
        $name = 'image.jpg';
        $size = 123456;
        $chunks = ['chunk1', 'chunk2'];
        $chunkNames = ['chunk1'];

        $asset = new Asset($name, $size, $chunks, $chunkNames);

        $this->assertEquals($name, $asset->getName());
        $this->assertEquals($size, $asset->getSize());
        $this->assertEquals($chunks, $asset->getChunks());
        $this->assertEquals($chunkNames, $asset->getChunkNames());
    }
}
