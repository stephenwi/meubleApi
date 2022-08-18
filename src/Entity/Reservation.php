<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $customer = null;

    #[ORM\Column(length: 100)]
    private ?string $customer_code = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $entrance = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $out = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $data_reservation = null;

    #[ORM\Column]
    private ?int $points = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column(length: 255)]
    private ?string $property_location = null;

    #[ORM\Column(length: 100)]
    private ?string $customer_phone_number = null;

    #[ORM\Column(length: 100)]
    private ?string $proprietaire_phone_number = null;

    #[ORM\OneToMany(mappedBy: 'reservation_services', targetEntity: Service::class)]
    private Collection $services;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: Properties::class)]
    private Collection $properties;

    public function __construct()
    {
        $this->services = new ArrayCollection();
        $this->properties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getCustomerCode(): ?string
    {
        return $this->customer_code;
    }

    public function setCustomerCode(string $customer_code): self
    {
        $this->customer_code = $customer_code;

        return $this;
    }

    public function getEntrance(): ?\DateTimeInterface
    {
        return $this->entrance;
    }

    public function setEntrance(\DateTimeInterface $entrance): self
    {
        $this->entrance = $entrance;

        return $this;
    }

    public function getOut(): ?\DateTimeInterface
    {
        return $this->out;
    }

    public function setOut(\DateTimeInterface $out): self
    {
        $this->out = $out;

        return $this;
    }

    public function getDataReservation(): ?\DateTimeInterface
    {
        return $this->data_reservation;
    }

    public function setDataReservation(\DateTimeInterface $data_reservation): self
    {
        $this->data_reservation = $data_reservation;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPropertyLocation(): ?string
    {
        return $this->property_location;
    }

    public function setPropertyLocation(string $property_location): self
    {
        $this->property_location = $property_location;

        return $this;
    }

    public function getCustomerPhoneNumber(): ?string
    {
        return $this->customer_phone_number;
    }

    public function setCustomerPhoneNumber(string $customer_phone_number): self
    {
        $this->customer_phone_number = $customer_phone_number;

        return $this;
    }

    public function getProprietairePhoneNumber(): ?string
    {
        return $this->proprietaire_phone_number;
    }

    public function setProprietairePhoneNumber(string $proprietaire_phone_number): self
    {
        $this->proprietaire_phone_number = $proprietaire_phone_number;

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
            $service->setReservationServices($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getReservationServices() === $this) {
                $service->setReservationServices(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Properties>
     */
    public function getProperties(): Collection
    {
        return $this->properties;
    }

    public function addProperty(Properties $property): self
    {
        if (!$this->properties->contains($property)) {
            $this->properties->add($property);
            $property->setReservation($this);
        }

        return $this;
    }

    public function removeProperty(Properties $property): self
    {
        if ($this->properties->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getReservation() === $this) {
                $property->setReservation(null);
            }
        }

        return $this;
    }
}
