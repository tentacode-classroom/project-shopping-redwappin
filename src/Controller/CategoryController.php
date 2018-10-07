<?php

// src/Controller/CategoryController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Toy;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends AbstractController
{
    /**
    * @Route("/collection/{collectionId}", name="collection")
    */


    public function category(Request $request, $collectionId = 1)
    {
        $category=$this-> getDoctrine()
        ->getRepository(Category::class)
        ->find($collectionId);

        $toys = $category->getToys();

        return $this->render('collections/collection_products.html.twig',[
            'toys'=>$toys,
            'collection'=>$category
        ]);
    }
}