<?php

namespace TaskFiend;

use DateTimeInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use TaskFiend\Data\TasksOnDayResponse;

class TaskFiendClient
{
    private Client $httpClient;

    /**
     * @param string $baseUrl  The base URL of your Task Fiend instance (e.g. "https://example.com/api")
     * @param array  $options  Additional Guzzle client options (e.g. ['headers' => ['Authorization' => 'Bearer ...']])
     */
    public function __construct(string $baseUrl, array $options = [])
    {
        $this->httpClient = new Client(array_merge($options, [
            'base_uri' => rtrim($baseUrl, '/') . '/',
        ]));
    }

    /**
     * Retrieve all tasks scheduled on a given day.
     *
     * Accepts any DateTimeInterface value, including Carbon instances.
     *
     * @throws GuzzleException
     */
    public function getTasksOnDay(DateTimeInterface $date): TasksOnDayResponse
    {
        $formatted = $date->format('Y-m-d');
        $response = $this->httpClient->get("tasks/on/{$formatted}");

        return TasksOnDayResponse::fromArray(
            json_decode($response->getBody()->getContents(), true)
        );
    }
}
