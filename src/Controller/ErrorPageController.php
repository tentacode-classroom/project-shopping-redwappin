<?php

// src/Controller/ErrorPageController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorPageController extends AbstractController
{
    /**
    * @Route("/notFound")
    */


    public function error_page()
    {
        return $this->render('/404_page.html.twig');
    }
}