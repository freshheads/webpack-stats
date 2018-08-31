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
class Asset
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $size;

    /**
     * @var string[]
     */
    private $chunks;

    /**
     * @var string[]
     */
    private $chunkNames;

    /**
     * @param string $name
     * @param int $size
     * @param string[] $chunks
     * @param string[] $chunkNames
     */
    public function __construct($name, $size = null, array $chunks = [], array $chunkNames = [])
    {
        $this->name = $name;
        $this->size = $size;
        $this->chunks = $chunks;
        $this->chunkNames = $chunkNames;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return string[]
     */
    public function getChunks()
    {
        return $this->chunks;
    }

    /**
     * @return string[]
     */
    public function getChunkNames()
    {
        return $this->chunkNames;
    }

    public function __toString()
    {
        return (string) $this->name;
    }
}
