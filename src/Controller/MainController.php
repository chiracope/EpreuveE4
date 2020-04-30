<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bite;
use App\Entity\Produits;


class MainController extends AbstractController
{

    /**
     * @Route("/abonne", name="abonne")
     */
    public function abonne()
    {
        return $this->render('main/abonne.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/compte", name="compte")
     */
    public function compte()
    {
        return $this->render('main/compte.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/panier", name="panier")
     */
    public function panier()
    {
        return $this->render('main/panier.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    
    /**
     * @Route("/produits", name="produits")
     */
    public function produits()
    {
        $repo = $this->getDoctrine()->getRepository(Produits::class);

        $Produits = $repo->findAll();

        return $this->render('main/produits.html.twig',[
            'controller_name' => 'MainController',
            'Produits' => $Produits
        ]);
    }
    /**
     * @Route("/produits/{id}", name="produitsDétail")
     */
    public function Detail($id)
    {
        $repo = $this->getDoctrine()->getRepository(Produits::class);

        $Produit = $repo->find($id);

        return $this->render('main/Detail.html.twig',[
            'controller_name' => 'MainController',
            'produit' => $Produit,
        ]);
    }

}
