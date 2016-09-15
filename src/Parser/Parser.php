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

use FH\WebpackStats\Exception\ParseException;
use FH\WebpackStats\Stats;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
interface Parser
{
    /**
     * @param string $json stats object in JSON format
     * @return Stats
     *
     * @throws ParseException
     */
    public function parse($json);
}
