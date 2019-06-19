<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExtrasRepository")
 */
class Extras
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $meerprijs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getMeerprijs(): ?int
    {
        return $this->meerprijs;
    }

    public function setMeerprijs(int $meerprijs): self
    {
        $this->meerprijs = $meerprijs;

        return $this;
    }
    public function __toString() {
        return (string) $this->getOmschrijving();
    }
}
