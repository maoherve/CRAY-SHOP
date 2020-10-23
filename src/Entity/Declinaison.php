<?php

namespace App\Entity;

use App\Repository\DeclinaisonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeclinaisonRepository::class)
 */
class Declinaison
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Outfits::class, inversedBy="declinaisons")
     */
    private $outfits;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(string $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getOutfits(): ?Outfits
    {
        return $this->outfits;
    }

    public function setOutfits(?Outfits $outfits): self
    {
        $this->outfits = $outfits;

        return $this;
    }
}
