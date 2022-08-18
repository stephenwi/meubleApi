<?php

namespace App\Entity;

use App\Repository\PropertyDetailsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PropertyDetailsRepository::class)]
class PropertyDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $dimensions = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $badroom = null;

    #[ORM\Column]
    private ?int $bedroom = null;

    #[ORM\Column]
    private ?int $garage = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\OneToMany(mappedBy: 'propertyDetails', targetEntity: PropertyType::class, orphanRemoval: true)]
    private Collection $type;

    #[ORM\Column(nullable: true)]
    private ?bool $rent = null;

    #[ORM\Column(nullable: true)]
    private ?bool $sale = null;

    #[ORM\Column(nullable: true)]
    private ?bool $rent_sale = null;

    #[ORM\Column(nullable: true)]
    private ?float $price_by_day = null;

    #[ORM\Column(nullable: true)]
    private ?float $price_by_month = null;

    #[ORM\Column(nullable: true)]
    private ?float $sale_price = null;

    public function __construct()
    {
        $this->type = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDimensions(): ?float
    {
        return $this->dimensions;
    }

    public function setDimensions(float $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBadroom(): ?int
    {
        return $this->badroom;
    }

    public function setBadroom(int $badroom): self
    {
        $this->badroom = $badroom;

        return $this;
    }

    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    public function setBedroom(int $bedroom): self
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    public function getGarage(): ?int
    {
        return $this->garage;
    }

    public function setGarage(int $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, PropertyType>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(PropertyType $type): self
    {
        if (!$this->type->contains($type)) {
            $this->type->add($type);
            $type->setPropertyDetails($this);
        }

        return $this;
    }

    public function removeType(PropertyType $type): self
    {
        if ($this->type->removeElement($type)) {
            // set the owning side to null (unless already changed)
            if ($type->getPropertyDetails() === $this) {
                $type->setPropertyDetails(null);
            }
        }

        return $this;
    }

    public function isRent(): ?bool
    {
        return $this->rent;
    }

    public function setRent(?bool $rent): self
    {
        $this->rent = $rent;

        return $this;
    }

    public function isSale(): ?bool
    {
        return $this->sale;
    }

    public function setSale(?bool $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    public function isRentSale(): ?bool
    {
        return $this->rent_sale;
    }

    public function setRentSale(?bool $rent_sale): self
    {
        $this->rent_sale = $rent_sale;

        return $this;
    }

    public function getPriceByDay(): ?float
    {
        return $this->price_by_day;
    }

    public function setPriceByDay(?float $price_by_day): self
    {
        $this->price_by_day = $price_by_day;

        return $this;
    }

    public function getPriceByMonth(): ?float
    {
        return $this->price_by_month;
    }

    public function setPriceByMonth(?float $price_by_month): self
    {
        $this->price_by_month = $price_by_month;

        return $this;
    }

    public function getSalePrice(): ?float
    {
        return $this->sale_price;
    }

    public function setSalePrice(?float $sale_price): self
    {
        $this->sale_price = $sale_price;

        return $this;
    }
}
