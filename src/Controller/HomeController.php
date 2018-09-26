<?php

// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ToyRepository;

class HomeController extends AbstractController
{
    /**
    * @Route("/")
    */


    public function mainMenu()
    {
        $toyRepository = new ToyRepository();
        $toys = $toyRepository->findAll();

        return $this->render('/accueil.html.twig',[
            'toys'=>$toys
        ]);
    }
}