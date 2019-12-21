<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{   
    
    private $repoProgram,$repoCategory,$categories;
    
    public function __construct(ProgramRepository $repoProgram,CategoryRepository $repoCategory)
    {
        $this->repoProgram=$repoProgram;
        $this->repoCategory=$repoCategory;
        $this->categories=$this->repoCategory->findAll();
    }   

    /*Affiche toutes les Séries*/

    /**
     * @Route("/wild", name="wild_index")
     */
    public function index()
    {
        $programs=$this->repoProgram->findAll();


        return $this->render('wild/index.html.twig', [
            'current_menu' => 'Accueil',
            'categories'   => $this->categories,
            'programs'     => $programs 
        ]);
    }

     /*Affiche le détail d'une Série*/

    /**
     * @Route("/wild/show/{slug}", name="wild_show", requirements={"slug"="[a-z0-9-]+"},defaults={"slug"="serie-sans-titre"})
     */
    public function show($slug)
    {   
        $slug=$this->slugy($slug);

        $program=$this->repoProgram->findOneByTitle($slug);
              
        return $this->render('wild/show.html.twig', [
            'current_menu' => 'Show',
            'categories'   => $this->categories,
            'program'=> $program
        ]);
    }

     /*Affiche toutes les Séries d'une Categorie*/

    /**
     * @Route("/category/{categoryName}",name="show_category")
     */
    public function showByCategory($categoryName){
        
        $category=$this->repoCategory->findOneByName($categoryName);
      

        if(!$category)
        {
            throw $this->createNotFoundException(
                "Cette categorie n'existe pas."
            );
        }        

        $programs=$this->repoProgram->findBy(
            ['category'=>$category],
            ['id'=>'DESC'],
            3            
        );

        return $this->render("wild/category.html.twig",[
            'current_menu' => 'Category',
            'categories'   => $this->categories,
            'category'    => $category,
            'programs'      => $programs  
            
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
