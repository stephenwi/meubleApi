<?php

namespace App\Entity;

use App\Repository\CustomerCompleteInformationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerCompleteInformationRepository::class)]
#[UniqueEntity('document_number')]
class CustomerCompleteInformation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 100)]
    private ?string $phone = null;

    #[ORM\Column(length: 100)]
    private ?string $document_type = null;

    #[ORM\Column(length: 200, unique: true)]
    private ?string $document_number = null;

    #[ORM\Column(length: 255)]
    private ?string $image_doc_name = null;

    #[ORM\OneToOne(inversedBy: 'customer_infos', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Customer $customer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getDocumentType(): ?string
    {
        return $this->document_type;
    }

    public function setDocumentType(string $document_type): self
    {
        $this->document_type = $document_type;

        return $this;
    }

    public function getDocumentNumber(): ?string
    {
        return $this->document_number;
    }

    public function setDocumentNumber(string $document_number): self
    {
        $this->document_number = $document_number;

        return $this;
    }

    public function getImageDocName(): ?string
    {
        return $this->image_doc_name;
    }

    public function setImageDocName(string $image_doc_name): self
    {
        $this->image_doc_name = $image_doc_name;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
