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

namespace FH\WebpackStats\Exception;

use RuntimeException;

/**
 * @author Joris van de Sande <joris.van.de.sande@freshheads.com>
 */
class ParseException extends RuntimeException implements Exception
{
}
