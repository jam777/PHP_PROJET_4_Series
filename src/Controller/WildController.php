<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */
    public function index()
    {
        return $this->render('wild/index.html.twig', [
            'current_menu' => 'Accueil',
        ]);
    }

    /**
     * @Route("/wild/show/{slug}", name="wild_show")
     */
    public function show($slug)
    {   

        //Slugify le titre


        return $this->render('wild/show.html.twig', [
            'current_menu' => 'Show',
        ]);
    }


}
