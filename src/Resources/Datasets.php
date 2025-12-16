<?php

declare(strict_types=1);

namespace Cognee\Resources;

use Cognee\Exceptions\CogneeException;
use Cognee\Models\Dataset;
use Cognee\Requests\AddDataRequest;
use Cognee\Requests\CognifyRequest;
use Cognee\Responses\AddDataResponse;
use Cognee\Responses\CognifyResponse;

/**
 * Datasets resource for managing datasets and data operations.
 */
class Datasets extends AbstractResource
{
    /**
     * List all datasets.
     *
     * @return array<Dataset>
     * @throws CogneeException
     */
    public function list(): array
    {
        $response = $this->get('api/v1/datasets');

        $datasets = [];

        foreach ($response['datasets'] ?? $response as $datasetData) {
            if (is_array($datasetData)) {
                $datasets[] = Dataset::fromArray($datasetData);
            }
        }

        return $datasets;
    }

    /**
     * Create a new dataset.
     *
     * @param string $name Dataset name
     * @param array<string, mixed>|null $metadata Dataset metadata
     * @return Dataset
     * @throws CogneeException
     */
    public function create(string $name, ?array $metadata = null): Dataset
    {
        $data = ['name' => $name];

        if ($metadata !== null) {
            $data['metadata'] = $metadata;
        }

        $response = $this->post('api/v1/datasets', $data);

        return Dataset::fromArray($response['dataset'] ?? $response);
    }

    /**
     * Get a dataset by ID.
     *
     * @param string $id Dataset ID
     * @return Dataset
     * @throws CogneeException
     */
    public function getDataset(string $id): Dataset
    {
        $response = parent::get("api/v1/datasets/{$id}");

        return Dataset::fromArray($response['dataset'] ?? $response);
    }

    /**
     * Delete a dataset.
     *
     * @param string $id Dataset ID
     * @return bool
     * @throws CogneeException
     */
    public function deleteDataset(string $id): bool
    {
        parent::delete("api/v1/datasets/{$id}");

        return true;
    }

    /**
     * Get the knowledge graph for a dataset.
     *
     * @param string $id Dataset ID
     * @return array<string, mixed>
     * @throws CogneeException
     */
    public function getGraph(string $id): array
    {
        return $this->get("api/v1/datasets/{$id}/graph");
    }

    /**
     * Get the data for a dataset.
     *
     * @param string $id Dataset ID
     * @return array<string, mixed>
     * @throws CogneeException
     */
    public function getData(string $id): array
    {
        return $this->get("api/v1/datasets/{$id}/data");
    }

    /**
     * Get the processing status of a dataset.
     *
     * @param string $id Dataset ID
     * @return array<string, mixed>
     * @throws CogneeException
     */
    public function getStatus(string $id): array
    {
        return $this->get("api/v1/datasets/{$id}/status");
    }

    /**
     * Add data to a dataset.
     *
     * @param AddDataRequest $request Add data request
     * @return AddDataResponse
     * @throws CogneeException
     */
    public function add(AddDataRequest $request): AddDataResponse
    {
        $response = $this->post('api/v1/add', $request->toArray());

        return AddDataResponse::fromArray($response);
    }

    /**
     * Cognify (process) datasets into knowledge graphs.
     *
     * @param CognifyRequest $request Cognify request
     * @return CognifyResponse
     * @throws CogneeException
     */
    public function cognify(CognifyRequest $request): CognifyResponse
    {
        $response = $this->post('api/v1/cognify', $request->toArray());

        return CognifyResponse::fromArray($response);
    }
}
