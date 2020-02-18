<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bite;


class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Bite::class);

        $bites = $repo->findAll();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'bites' => $bites
        ]);
    }
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
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('main/admin.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/connexion", name="connection")
     */
    public function connection()
    {
        return $this->render('main/connection.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscription()
    {
        return $this->render('main/inscription.html.twig', [
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
}
