<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="Produits")
 * @ORM\Entity
 */
class Produits
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_produit", type="text", length=65535, nullable=false)
     */
    private $nomProduit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=1000, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Utilisation", type="text", length=65535, nullable=false)
     */
    private $utilisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Types", type="text", length=65535, nullable=false)
     */
    private $types;

    /**
     * @var string
     *
     * @ORM\Column(name="Couleurs", type="text", length=65535, nullable=false)
     */
    private $couleurs;

    /**
     * @var string
     *
     * @ORM\Column(name="Saveurs", type="text", length=65535, nullable=false)
     */
    private $saveurs;

    /**
     * @var string
     *
     * @ORM\Column(name="Accompagnement", type="text", length=65535, nullable=false)
     */
    private $accompagnement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image2", type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Panier", mappedBy="idProduit")
     */
    private $prixTotal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prixTotal = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

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

    public function getUtilisation(): ?string
    {
        return $this->utilisation;
    }

    public function setUtilisation(string $utilisation): self
    {
        $this->utilisation = $utilisation;

        return $this;
    }

    public function getTypes(): ?string
    {
        return $this->types;
    }

    public function setTypes(string $types): self
    {
        $this->types = $types;

        return $this;
    }

    public function getCouleurs(): ?string
    {
        return $this->couleurs;
    }

    public function setCouleurs(string $couleurs): self
    {
        $this->couleurs = $couleurs;

        return $this;
    }

    public function getSaveurs(): ?string
    {
        return $this->saveurs;
    }

    public function setSaveurs(string $saveurs): self
    {
        $this->saveurs = $saveurs;

        return $this;
    }

    public function getAccompagnement(): ?string
    {
        return $this->accompagnement;
    }

    public function setAccompagnement(string $accompagnement): self
    {
        $this->accompagnement = $accompagnement;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * @return Collection|Panier[]
     */
    public function getPrixTotal(): Collection
    {
        return $this->prixTotal;
    }

    public function addPrixTotal(Panier $prixTotal): self
    {
        if (!$this->prixTotal->contains($prixTotal)) {
            $this->prixTotal[] = $prixTotal;
            $prixTotal->addIdProduit($this);
        }

        return $this;
    }

    public function removePrixTotal(Panier $prixTotal): self
    {
        if ($this->prixTotal->contains($prixTotal)) {
            $this->prixTotal->removeElement($prixTotal);
            $prixTotal->removeIdProduit($this);
        }

        return $this;
    }

}
