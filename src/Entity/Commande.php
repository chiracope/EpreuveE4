<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="Commande", indexes={@ORM\Index(name="Commande_Comptes0_FK", columns={"id_utilisateur"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var int
     *
     * @ORM\Column(name="Numero_facture", type="integer", nullable=false)
     */
    private $numeroFacture;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_commande", type="date", nullable=false)
     */
    private $dateCommande;

    /**
     * @var \Comptes
     *
     * @ORM\ManyToOne(targetEntity="Comptes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_utilisateur", referencedColumnName="id_utilisateur")
     * })
     */
    private $idUtilisateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Panier", mappedBy="idCommande")
     */
    private $prixTotal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prixTotal = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getNumeroFacture(): ?int
    {
        return $this->numeroFacture;
    }

    public function setNumeroFacture(int $numeroFacture): self
    {
        $this->numeroFacture = $numeroFacture;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getIdUtilisateur(): ?Comptes
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Comptes $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

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
            $prixTotal->addIdCommande($this);
        }

        return $this;
    }

    public function removePrixTotal(Panier $prixTotal): self
    {
        if ($this->prixTotal->contains($prixTotal)) {
            $this->prixTotal->removeElement($prixTotal);
            $prixTotal->removeIdCommande($this);
        }

        return $this;
    }

}
