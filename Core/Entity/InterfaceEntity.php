<?php
namespace Core\Entity;

interface InterfaceEntity {
    public function getId(): int;
    public function getPassword(): string;
    public function setPassword(string $password): object;
}