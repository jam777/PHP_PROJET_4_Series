<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{   
    protected $repoCategory;

    public function __construct(CategoryRepository $repoCategory)
    {
        $this->repoCategory = $repoCategory;
    }


    

    /**
     * @Route("/", name="app_index")
     */
    public function index()
    {   
        $categories=$this->repoCategory->findAll();

        return $this->render('default/home.html.twig', [
            'current_menu' => '',
            'categories'   => $categories 
        ]);
    }
}
