<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KamerRepository")
 */
class Kamer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Extras")
     */
    private $extras;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Soort")
     * @ORM\JoinColumn(nullable=false)
     */
    private $soortid;

    /**
     * @ORM\Column(type="float")
     */
    private $prijs;

    public function __construct()
    {
        $this->extras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Extras[]
     */
    public function getExtras(): Collection
    {
        return $this->extras;
    }

    public function addExtra(Extras $extra): self
    {
        if (!$this->extras->contains($extra)) {
            $this->extras[] = $extra;
        }

        return $this;
    }

    public function removeExtra(Extras $extra): self
    {
        if ($this->extras->contains($extra)) {
            $this->extras->removeElement($extra);
        }

        return $this;
    }

    public function getSoortid(): ?Soort
    {
        return $this->soortid;
    }

    public function setSoortid(?Soort $soortid): self
    {
        $this->soortid = $soortid;

        return $this;
    }

    public function getPrijs(): ?float
    {
        return $this->prijs;
    }

    public function setPrijs(float $prijs): self
    {
        $this->prijs = $prijs;

        return $this;
    }
    public function __toString() {
        return (string) $this->getId();
    }
}
