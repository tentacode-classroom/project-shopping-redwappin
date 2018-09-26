<?php

// src/Controller/ProductController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ToyRepository;

class ProductController extends AbstractController
{
    /**
    * @Route("/detail/{toyId}", name="detail")
    */

    public function product_detail_page(Request $request, $toyId = 1)
    {
        $toyRepository = new ToyRepository();
        $toy = $toyRepository->findOneById($toyId);
        
        return $this->render('/detail.html.twig', [
            'toy' => $toy,
        ]);
    }
}