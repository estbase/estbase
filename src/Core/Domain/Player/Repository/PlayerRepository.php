<?php

namespace estbase\Core\Domain\Player\Repository;

use estbase\Core\Domain\Models\Player;
use estbase\Core\Domain\Repository\EntityRepositoryInterface;
use estbase\SharedKernel\Domain\Entity\EntityInterface;
use estbase\SharedKernel\Domain\Exception\EntityNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class PlayerRepository implements EntityRepositoryInterface
{
    /**
     * @var Player
     */
    protected $model;

    public function __construct()
    {
        $this->model = new Player();
    }
    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param string $id
     * @return EntityInterface|null
     */
    public function find(string $id): EntityInterface
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return EntityInterface
     * @throws EntityNotFoundException
     */
    public function get(int $id): EntityInterface
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $entity
     * @return mixed
     */
    public function save($entity)
    {
        return $this->model->create($entity);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->model->destroy($id);
    }
}