<?php

namespace App\Entity;

use App\Repository\PropertyTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyTypeRepository::class)]
class PropertyType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    //Office, Monocal, duplex, villa, hotel bedroom
    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $property_type_code = null;

    #[ORM\ManyToOne(inversedBy: 'type')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PropertyDetails $propertyDetails = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPropertyTypeCode(): ?string
    {
        return $this->property_type_code;
    }

    public function setPropertyTypeCode(?string $property_type_code): self
    {
        $this->property_type_code = $property_type_code;

        return $this;
    }

    public function getPropertyDetails(): ?PropertyDetails
    {
        return $this->propertyDetails;
    }

    public function setPropertyDetails(?PropertyDetails $propertyDetails): self
    {
        $this->propertyDetails = $propertyDetails;

        return $this;
    }
}
