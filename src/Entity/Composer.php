<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composer
 *
 * @ORM\Table(name="Composer", indexes={@ORM\Index(name="Composer_Produits1_FK", columns={"id_produit"})})
 * @ORM\Entity
 */
class Composer
{
    /**
     * @var int
     *
     * @ORM\Column(name="prix_total", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $prixTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idProduit;

    public function getPrixTotal(): ?int
    {
        return $this->prixTotal;
    }

    public function getIdProduit(): ?int
    {
        return $this->idProduit;
    }


}
