<?php

/*
 * This file is part of the Freshheads Webpack stats library.
 *
 * (c) Freshheads B.V. <info@freshheads.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FH\WebpackStats\Exception;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class ChunkNotFoundException extends \OutOfRangeException implements Exception
{
    public static function create($chunkName)
    {
        return new self('No chunk found with name: ' . $chunkName);
    }
}
