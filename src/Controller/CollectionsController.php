<?php

// src/Controller/CollectionsController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

class CollectionsController extends AbstractController
{
    /**
    * @Route("/collections", name="collections")
    */


    public function allCollections()
    {
        $collections=$this-> getDoctrine()
        ->getRepository(Category::class)
        ->findAll();


        return $this->render('collections/collections.html.twig',[
            'collections'=>$collections
        ]);
    }
}