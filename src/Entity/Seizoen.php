<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeizoenRepository")
 */
class Seizoen
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
     * @ORM\Column(type="datetime")
     */
    private $begindatum;

    /**
     * @ORM\Column(type="datetime")
     */
    private $einddatum;

    /**
     * @ORM\Column(type="float")
     */
    private $korting;

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

    public function getBegindatum(): ?\DateTimeInterface
    {
        return $this->begindatum;
    }

    public function setBegindatum(\DateTimeInterface $begindatum): self
    {
        $this->begindatum = $begindatum;

        return $this;
    }

    public function getEinddatum(): ?\DateTimeInterface
    {
        return $this->einddatum;
    }

    public function setEinddatum(\DateTimeInterface $einddatum): self
    {
        $this->einddatum = $einddatum;

        return $this;
    }

    public function getKorting(): ?float
    {
        return $this->korting;
    }

    public function setKorting(float $korting): self
    {
        $this->korting = $korting;

        return $this;
    }
}
