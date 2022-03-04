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

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class Asset
{
    private string $name;
    private ?int $size;

    /**
     * @var string[]
     */
    private array $chunks;

    /**
     * @var string[]
     */
    private array $chunkNames;

    /**
     * @param ?int     $size
     * @param string[] $chunks
     * @param string[] $chunkNames
     */
    public function __construct(string $name, ?int $size = null, array $chunks = [], array $chunkNames = [])
    {
        $this->name = $name;
        $this->size = $size;
        $this->chunks = $chunks;
        $this->chunkNames = $chunkNames;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @return string[]
     */
    public function getChunks(): array
    {
        return $this->chunks;
    }

    /**
     * @return string[]
     */
    public function getChunkNames(): array
    {
        return $this->chunkNames;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
