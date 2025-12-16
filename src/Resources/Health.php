<?php

declare(strict_types=1);

namespace Cognee\Resources;

use Cognee\Exceptions\CogneeException;

/**
 * Health resource for checking API health status.
 */
class Health extends AbstractResource
{
    /**
     * Perform a basic health check.
     *
     * @return array<string, mixed>
     * @throws CogneeException
     */
    public function check(): array
    {
        return $this->get('health');
    }

    /**
     * Get detailed health status.
     *
     * @return array<string, mixed>
     * @throws CogneeException
     */
    public function detailed(): array
    {
        return $this->get('health/detailed');
    }
}
