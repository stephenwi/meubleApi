<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $service_name = null;

    #[ORM\OneToMany(mappedBy: 'service', targetEntity: ServiceTypes::class, orphanRemoval: true)]
    private Collection $serviceTypes;

    #[ORM\ManyToOne(inversedBy: 'services')]
    private ?Reservation $reservation_services = null;

    public function __construct()
    {
        $this->serviceTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceName(): ?string
    {
        return $this->service_name;
    }

    public function setServiceName(string $service_name): self
    {
        $this->service_name = $service_name;

        return $this;
    }

    /**
     * @return Collection<int, ServiceTypes>
     */
    public function getServiceTypes(): Collection
    {
        return $this->serviceTypes;
    }

    public function addServiceType(ServiceTypes $serviceType): self
    {
        if (!$this->serviceTypes->contains($serviceType)) {
            $this->serviceTypes->add($serviceType);
            $serviceType->setService($this);
        }

        return $this;
    }

    public function removeServiceType(ServiceTypes $serviceType): self
    {
        if ($this->serviceTypes->removeElement($serviceType)) {
            // set the owning side to null (unless already changed)
            if ($serviceType->getService() === $this) {
                $serviceType->setService(null);
            }
        }

        return $this;
    }

    public function getReservationServices(): ?Reservation
    {
        return $this->reservation_services;
    }

    public function setReservationServices(?Reservation $reservation_services): self
    {
        $this->reservation_services = $reservation_services;

        return $this;
    }
}
