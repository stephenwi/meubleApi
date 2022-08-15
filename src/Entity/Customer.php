<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
#[UniqueEntity('username', 'customer_code')]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $username = null;

    #[ORM\Column(length: 100, unique: true)]
    private ?string $customer_code = null;

    #[ORM\OneToOne(mappedBy: 'customer', cascade: ['persist', 'remove'])]
    private ?CustomerCompleteInformation $customer_infos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getCustomerInfos(): ?CustomerCompleteInformation
    {
        return $this->customer_infos;
    }

    public function setCustomerInfos(CustomerCompleteInformation $customer_infos): self
    {
        // set the owning side of the relation if necessary
        if ($customer_infos->getCustomer() !== $this) {
            $customer_infos->setCustomer($this);
        }

        $this->customer_infos = $customer_infos;

        return $this;
    }
}
