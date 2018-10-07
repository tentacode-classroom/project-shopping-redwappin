<?php

// src/Controller/ProductController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Toy;
use App\Repository\ToyRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class ProductController extends AbstractController
{
    /**
    * @Route("/detail/{toyId}", name="detail")
    */

    public function product_detail_page(Request $request, $toyId = 1, ObjectManager $manager)
    {
        $toy = $this-> getDoctrine()
            ->getRepository(Toy::class)
            ->find($toyId);
        
        $toy -> incrementViewCounter();
        
        $manager -> persist($toy);
        $manager -> flush();
        
        return $this->render('/detail.html.twig', [
            'toy' => $toy,
        ]);
    }
}