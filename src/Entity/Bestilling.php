<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity(repositoryClass=ProduktRepository::class)
 * @ORM\Table("bestilling")
 */
class Bestilling
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
    private $navn;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $epost;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    private $kontaktnr;


    /**
     * @ORM\Column(type="text")
     */
    private $addresse;

    /**
     * @ORM\ManyToMany(targetEntity="produkt")
     */
    private $produkt;

    public function __construct()
    {
        $this->produkt = new ArrayCollection;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNavn(): ?string
    {
        return $this->navn;
    }

    public function setNavn(string $navn): self
    {
        $this->navn = $navn;

        return $this;
    }

    public function getEpost(): ?string
    {
        return $this->epost;
    }

    public function setEpost(string $epost): self
    {
        $this->epost = $epost;

        return $this;
    }

    public function getKontaktnr(): ?int
    {
        return $this->kontaktnr;
    }

    public function setKontaktnr(int $kontaktnr): self
    {
        $this->kontaktnr = $kontaktnr;

        return $this;
    }


    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(?string $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function getProducts()
    {
        return $this->produkt;
    }
}
