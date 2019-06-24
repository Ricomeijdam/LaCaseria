<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReserveringRepository")
 */
class Reservering
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userid;

    /**
     * @ORM\Column(type="datetime")
     */
    private $checkingdate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $checkoutdate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $betaalmethode;

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

    public function getUserid(): ?User
    {
        return $this->userid;
    }

    public function setUserid(?User $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getCheckingdate(): ?\DateTimeInterface
    {
        return $this->checkingdate;
    }

    public function setCheckingdate(\DateTimeInterface $checkingdate): self
    {
        $this->checkingdate = $checkingdate;

        return $this;
    }

    public function getCheckoutdate(): ?\DateTimeInterface
    {
        return $this->checkoutdate;
    }

    public function setCheckoutdate(\DateTimeInterface $checkoutdate): self
    {
        $this->checkoutdate = $checkoutdate;

        return $this;
    }

    public function getBetaalmethode(): ?string
    {
        return $this->betaalmethode;
    }

    public function setBetaalmethode(string $betaalmethode): self
    {
        $this->betaalmethode = $betaalmethode;

        return $this;
    }
}
