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
     * @Route("/wild/show/{slug}", name="wild_show", requirements={"slug"="[a-z0-9-]+"},defaults={"slug"="serie-sans-titre"})
     */
    public function show($slug)
    {   
        $slug=$this->slugy($slug);
        
        return $this->render('wild/show.html.twig', [
            'current_menu' => 'Show',
            'titre'=> $slug
        ]);
    }

    
    /**
     * Permet de slufguifier une phrase
     * Critere : Remplacer "-" par des " "
     *           Premiere lettre de chaque mot par des majuscule   
     *
     * @param string $slug
     * @return string
     */    
    private function slugy(string $slug) :string
    {   
        $slug=str_replace("-"," ",$slug);
        $slug=ucwords($slug," ");
        return $slug;
    }


}
