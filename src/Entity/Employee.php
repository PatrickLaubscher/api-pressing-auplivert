<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datebirth = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nationality $nationality = null;

    #[ORM\ManyToOne(inversedBy: 'employees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EmployeeStatus $employee_status = null;

    #[ORM\Column(length: 13)]
    private ?string $social_security_number = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $creation_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatebirth(): ?\DateTimeInterface
    {
        return $this->datebirth;
    }

    public function setDatebirth(\DateTimeInterface $datebirth): static
    {
        $this->datebirth = $datebirth;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getNationality(): ?Nationality
    {
        return $this->nationality;
    }

    public function setNationality(?Nationality $nationality): static
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getEmployeeStatus(): ?EmployeeStatus
    {
        return $this->employee_status;
    }

    public function setEmployeeStatus(?EmployeeStatus $employee_status): static
    {
        $this->employee_status = $employee_status;

        return $this;
    }

    public function getSocialSecurityNumber(): ?string
    {
        return $this->social_security_number;
    }

    public function setSocialSecurityNumber(string $social_security_number): static
    {
        $this->social_security_number = $social_security_number;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): static
    {
        $this->creation_date = $creation_date;

        return $this;
    }
}
