<?php

namespace estbase\Core\Domain\Repository;

use estbase\SharedKernel\Domain\Entity\EntityInterface;
use estbase\SharedKernel\Domain\Exception\EntityNotFoundException;
use Illuminate\Database\Eloquent\Collection;

interface EntityRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param string $id
     * @return EntityInterface|null
     */
    public function find(string $id): EntityInterface;

    /**
     * @param int $id
     * @return EntityInterface
     * @throws EntityNotFoundException
     */
    public function get(int $id): EntityInterface;

    /**
     * @param $entity
     * @return mixed
     */
    public function save($entity);

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int;

}