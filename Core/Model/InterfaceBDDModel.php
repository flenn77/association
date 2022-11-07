<?php
namespace Core\Model;

interface InterfaceBDDModel
{
    public function find(int $id): object;
    public function findBy(string $key, $value): object;
    public function findAll(): array;
    public function save(object $criteria): void;
}