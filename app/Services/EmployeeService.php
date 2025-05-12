<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use App\Models\Employee;
use MongoDB\Client;
use MongoDB\Driver\Session;

class EmployeeService
{
    private EmployeeRepository $repository;
    private Client $client;

    public function __construct()
    {
        $this->repository = new EmployeeRepository();
        $this->client = new Client(
            sprintf(
                'mongodb://%s:%s',
                env('MONGO_DB_HOST', '127.0.0.1'),
                env('MONGO_DB_PORT', 27017)
            )
        );
    }

    /**
     * Run a callback within a MongoDB transaction (declarative).
     * Usage: $service->withTransaction(function($repo) { ... });
     */
    public function withTransaction(callable $callback)
    {
        $session = $this->client->startSession();
        $session->startTransaction();
        try {
            $result = $callback($this->repository, $session);
            $session->commitTransaction();
            return $result;
        } catch (\Throwable $e) {
            $session->abortTransaction();
            throw $e;
        } finally {
            $session->endSession();
        }
    }

    // Proxy CRUD methods for convenience
    public function all(): array { return $this->repository->all(); }
    public function find(string $id): ?Employee { return $this->repository->find($id); }
    public function create(array $data): Employee { return $this->repository->create($data); }
    public function update(string $id, array $data): ?Employee { return $this->repository->update($id, $data); }
    public function delete(string $id): bool { return $this->repository->delete($id); }
}
