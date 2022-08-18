<?php

namespace App\Entity;

use App\Repository\ReservationStatusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationStatusRepository::class)]
class ReservationStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $status_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusName(): ?string
    {
        return $this->status_name;
    }

    public function setStatusName(string $status_name): self
    {
        $this->status_name = $status_name;

        return $this;
    }
}
