<?php

namespace App\Controller;

use App\Form\InformationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardUserController extends AbstractController
{
    /**
     * @Route("/dashboard_user", name="dashboard_user")
     */
    public function index(): Response
    {
        $form = $this->createForm(InformationFormType::class);
        return $this->render('dashboard_user/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{dashboard_user}", name="landing_page")
     */
    public function landingPage(): Response
    {
        return $this->render('dashboard_user/landing_page.html.twig');
    }
}
