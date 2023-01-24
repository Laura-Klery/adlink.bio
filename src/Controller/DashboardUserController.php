<?php

namespace App\Controller;

use App\Form\BrandFormType;
use App\Form\InformationFormType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class DashboardUserController extends AbstractController
{
    /**
     * @Route("/dashboard_user", name="dashboard_user")
     */
    public function index(UserRepository $userRepository, ManagerRegistry $doctrine, Request $request): Response
    {
        $user = $this->getUser();
        $informationsAccount = $this->createForm(InformationFormType::class, $user);
        $informationsAccount->handleRequest($request);
        if($informationsAccount->isSubmitted() && $informationsAccount->isValid()) {
          $em = $doctrine->getManager();
          $passwordNew = $informationsAccount->get('plainPassword')->getData();
          $hashPasswordNew = $userNewPassword->hashPassword($user, $passwordNew);
          $user->setPassword($hashPasswordNew);
          $em->flush();
        }


        $brand = $this->createForm(BrandFormType::class);





        return $this->render('dashboard_user/index.html.twig', [
            'user' => $user,
            'account' => $informationsAccount->createView(),
            'brand' => $brand->createView(),
        ]);
    }

    /**
     * @Route("/dashboard_user/{pseudo}", name="landing_page")
     */
    public function landingPage(): Response
    {
        return $this->render('dashboard_user/landing_page.html.twig');
    }
}
