<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'categories')]
    private ?category $parent_cat = null;

    #[ORM\Column]
    private ?float $coef_price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getParentCat(): ?self
    {
        return $this->parent_cat;
    }

    public function setParentCat(?self $parent_cat): static
    {
        $this->parent_cat = $parent_cat;

        return $this;
    }

    public function getCoefPrice(): ?float
    {
        return $this->coef_price;
    }

    public function setCoefPrice(float $coef_price): static
    {
        $this->coef_price = $coef_price;

        return $this;
    }
}
