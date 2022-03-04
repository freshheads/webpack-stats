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

use PHPUnit\Framework\TestCase;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
final class AssetTest extends TestCase
{
    public function testAssetReturnsTheSameContentThatItWasCreatedWith(): void
    {
        $name = 'image.jpg';
        $size = 123456;
        $chunks = ['chunk1', 'chunk2'];
        $chunkNames = ['chunk1'];

        $asset = new Asset($name, $size, $chunks, $chunkNames);

        $this->assertSame($name, $asset->getName());
        $this->assertSame($size, $asset->getSize());
        $this->assertSame($chunks, $asset->getChunks());
        $this->assertSame($chunkNames, $asset->getChunkNames());
    }
}
