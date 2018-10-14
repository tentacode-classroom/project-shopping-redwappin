<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Toy", mappedBy="category")
     */
    private $toys;

    public function __construct()
    {
        $this->toys = new ArrayCollection();
    }

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

    /**
     * @return Collection|Toy[]
     */
    public function getToys(): Collection
    {
        return $this->toys;
    }

    public function addToy(Toy $toy): self
    {
        if (!$this->toys->contains($toy)) {
            $this->toys[] = $toy;
            $toy->setCategory($this);
        }

        return $this;
    }

    public function removeToy(Toy $toy): self
    {
        if ($this->toys->contains($toy)) {
            $this->toys->removeElement($toy);
            // set the owning side to null (unless already changed)
            if ($toy->getCategory() === $this) {
                $toy->setCategory(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->name;
    }
}
