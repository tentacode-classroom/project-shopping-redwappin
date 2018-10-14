<?php

// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Toy;
use App\Entity\Category;
use App\Repository\ToyRepository;
use App\Repository\CategoryRepository;

class HomeController extends AbstractController
{
    /**
    * @Route("/" , name="home")
    */


    public function mainMenu()
    {

        $toys = $this-> getDoctrine()
            ->getRepository(Toy::class)
            ->findAllToy();

        return $this->render('/home.html.twig',[
            'toys'=>$toys,
        ]);
    }
}