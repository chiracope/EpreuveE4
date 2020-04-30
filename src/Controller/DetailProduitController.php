<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produits;

class DetailProduitController extends AbstractController
{

    /**
     * @Route("accueil/detail/{id}",
     *      name="detail_produit",
     *      methods={"GET"})
     */

    public function detailProduit($id)
    {

        $produit = $this->getDoctrine()->getRepository(Produits::class)->find($id);

        if (!$produit) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render('accueil/detail.html.twig', [
            'controller_name' => 'DetailProduitController',
            'produit' => $produit,
            'nom' => $id
        ]);
    }
}
