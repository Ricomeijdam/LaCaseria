<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\KamerRepository")
 * @Vich\Uploadable
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

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $beschikbaar;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Naam;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="kamer", fileNameProperty="imageName", size="imageSize")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;


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

    public function getBeschikbaar(): ?bool
    {
        return $this->beschikbaar;
    }

    public function setBeschikbaar(?bool $beschikbaar): self
    {
        $this->beschikbaar = $beschikbaar;

        return $this;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

/**
 *
 * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $imageFile
 */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }
}
