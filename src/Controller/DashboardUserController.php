<?php

namespace App\Controller;

use App\Form\InformationFormType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard_user")
 */
class DashboardUserController extends AbstractController
{
    /**
     * @Route("/", name="dashboard_user")
     */
    public function index(UserRepository $userRepository): Response
    {
        $informationsAccount = $this->createForm(InformationFormType::class);
        $users = $userRepository->findAll();
        return $this->render('dashboard_user/index.html.twig', [
            'account' => $informationsAccount->createView(),
            'users' => $users,
        ]);
    }

    /**
     * @Route("/{pseudo}", name="landing_page")
     */
    public function landingPage(): Response
    {
        return $this->render('dashboard_user/landing_page.html.twig');
    }
}
