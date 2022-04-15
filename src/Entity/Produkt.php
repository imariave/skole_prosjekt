<?php

namespace App\Entity;

use App\Repository\ProduktRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduktRepository::class)
 */
class Produkt
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Navn;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $pris;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $beskrivelse;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNavn(): ?string
    {
        return $this->Navn;
    }

    public function setNavn(string $Navn): self
    {
        $this->Navn = $Navn;

        return $this;
    }

    public function getPris(): ?string
    {
        return $this->pris;
    }

    public function setPris(string $pris): self
    {
        $this->pris = $pris;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBeskrivelse(): ?string
    {
        return $this->beskrivelse;
    }

    public function setBeskrivelse(?string $beskrivelse): self
    {
        $this->beskrivelse = $beskrivelse;

        return $this;
    }
}
