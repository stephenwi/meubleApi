<?php

namespace App\Entity;

use App\Repository\ServiceTypesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceTypesRepository::class)]
class ServiceTypes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $service_type_name = null;

    #[ORM\ManyToOne(inversedBy: 'serviceTypes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Service $service = null;

    #[ORM\OneToOne(mappedBy: 'service_type', cascade: ['persist', 'remove'])]
    private ?ServiceDetails $serviceDetails = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceTypeName(): ?string
    {
        return $this->service_type_name;
    }

    public function setServiceTypeName(string $service_type_name): self
    {
        $this->service_type_name = $service_type_name;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getServiceDetails(): ?ServiceDetails
    {
        return $this->serviceDetails;
    }

    public function setServiceDetails(ServiceDetails $serviceDetails): self
    {
        // set the owning side of the relation if necessary
        if ($serviceDetails->getServiceType() !== $this) {
            $serviceDetails->setServiceType($this);
        }

        $this->serviceDetails = $serviceDetails;

        return $this;
    }
}
