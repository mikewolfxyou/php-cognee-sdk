<?php

declare(strict_types=1);

namespace Cognee\Exceptions;

/**
 * Exception thrown when the rate limit is exceeded (429).
 */
class RateLimitException extends CogneeException
{
}
