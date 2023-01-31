<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;

class DashboardAdminController extends AbstractController
{
    /**
     * @Route("/dashboard_admin", name="dashboard_admin")
     */
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        return $this->render('dashboard_admin/index.html.twig', [
            'users' => $users
        ]);
    }
}
