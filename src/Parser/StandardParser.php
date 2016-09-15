<?php

/*
 * This file is part of the Freshheads Webpack stats library.
 *
 * (c) Freshheads B.V. <info@freshheads.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FH\WebpackStats\Parser;

use FH\WebpackStats\Exception\MissingStatsException;
use FH\WebpackStats\Stats;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class StandardParser implements Parser
{
    /**
     * @param string $json stats object in JSON format
     * @return Stats
     */
    public function parse($json)
    {
        $stats = json_decode($json, true);

        if (!is_array($stats)) {
            throw MissingStatsException::create();
        }

        return new Stats($stats);
    }
}
