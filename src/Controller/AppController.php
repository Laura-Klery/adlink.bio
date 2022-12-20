<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('app/home.html.twig');
    }

    /**
     * @Route("/preview", name="preview")
     */
    public function preview(): Response
    {
        return $this->render('app/preview.html.twig');
    }

    /**
     * @Route("/mentions-legales", name="mentions-legales")
     */
    public function mentions(): Response
    {
        return $this->render('app/mentions.html.twig');
    }

    /**
     * @Route("/personnal_data", name="personnal_data")
     */
    public function personnalData(): Response
    {
        return $this->render('app/personnal_data.html.twig');
    }
    
    /**
     * @Route("/cgu", name="cgu")
     */
    public function cgu(): Response
    {
        return $this->render('app/cgu.html.twig');
    } 
}
