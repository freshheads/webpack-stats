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

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
final class StandardParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException FH\WebpackStats\Exception\MissingStatsException
     */
    public function testParserThrowsExceptionIfStatsAreMissing()
    {
        $parser = new StandardParser();
        $parser->parse('');
    }
}
