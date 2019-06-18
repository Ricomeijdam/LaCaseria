<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Kamer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $kamerid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imagefile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKamerid(): ?Kamer
    {
        return $this->kamerid;
    }

    public function setKamerid(?Kamer $kamerid): self
    {
        $this->kamerid = $kamerid;

        return $this;
    }

    public function getImagefile(): ?string
    {
        return $this->imagefile;
    }

    public function setImagefile(string $imagefile): self
    {
        $this->imagefile = $imagefile;

        return $this;
    }
}
