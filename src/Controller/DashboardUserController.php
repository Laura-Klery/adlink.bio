<?php

namespace App\Controller;

use App\Entity\ExternalSite;
use App\Entity\Promotion;
use App\Form\BrandFormType;
use App\Form\ExternalSiteFormType;
use App\Form\InformationFormType;
use App\Form\PromotionFormType;
use App\Form\SectionExternalSiteFormType;
use App\Form\SectionPromotionFormType;
use App\Form\SectionSocialNetworkFormType;
use App\Form\SocialNetworkFormType;
use App\Form\VideoFormType;
use App\Repository\ExternalSiteRepository;
use App\Repository\PromotionRepository;
use App\Repository\SectionBrandRepository;
use App\Repository\SectionExternalSiteRepository;
use App\Repository\SectionPromotionRepository;
use App\Repository\SectionSocialNetworkRepository;
use App\Repository\SectionVideoRepository;
use App\Repository\SocialNetworkRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class DashboardUserController extends AbstractController
{
    /**
     * @Route("/dashboard_user", name="dashboard_user")
     */
    public function index(
        UserRepository $user, SectionBrandRepository $sectionBrandRepository, SectionVideoRepository $sectionVideoRepository,
        SectionPromotionRepository $sectionPromotionRepository, SectionExternalSiteRepository $sectionExternalSiteRepository,
        SectionSocialNetworkRepository $sectionSocialNetworkRepository, ExternalSiteRepository $externalSiteRepository,
        SocialNetworkRepository $socialNetworkRepository, PromotionRepository $promotionRepository, ManagerRegistry $doctrine,
        Request $request, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        // Edit User
        $user = $this->getUser();
        $informationsAccountForm = $this->createForm(InformationFormType::class, $user);
        $informationsAccountForm->handleRequest($request);
        if($informationsAccountForm->isSubmitted() && $informationsAccountForm->isValid()) {
          $em = $doctrine->getManager();
          $passwordNew = $informationsAccountForm->get('password')->getData();
          $hashPasswordNew = $userPasswordHasher->hashPassword($user, $passwordNew);
          $user->setPassword($hashPasswordNew);
          $em->flush();
          return $this->redirectToRoute('dashboard_user', ['_fragment' => 'information_account']);
        }

        // Edit SectionBrand
        $sectionBrand = $sectionBrandRepository->findOneBy(['user' => $user]);
        $sectionBrandForm = $this->createForm(BrandFormType::class, $sectionBrand);
        $sectionBrandForm->handleRequest($request);
        if($sectionBrandForm->isSubmitted() && $sectionBrandForm->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_brand']);
        }

        // Edit SectionVideo
        $sectionVideo = $sectionVideoRepository->findOneBy(['user' => $user]);
        $sectionVideoForm = $this->createForm(VideoFormType::class, $sectionVideo);
        $sectionVideoForm->handleRequest($request);
        if($sectionVideoForm->isSubmitted() && $sectionVideoForm->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_video']);
        }

        // Edit SectionPromotion
        $sectionPromotion = $sectionPromotionRepository->findOneBy(['user' => $user]);
        $sectionPromotionForm = $this->createForm(SectionPromotionFormType::class, $sectionPromotion);
        $sectionPromotionForm->handleRequest($request);
        if($sectionPromotionForm->isSubmitted() && $sectionPromotionForm->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_promotion']);
        }

        // Edit SectionExternalSite
        $sectionExternalSite = $sectionExternalSiteRepository->findOneBy(['user' => $user]);
        $sectionExternalSiteForm = $this->createForm(SectionExternalSiteFormType::class, $sectionExternalSite);
        $sectionExternalSiteForm->handleRequest($request);
        if($sectionExternalSiteForm->isSubmitted() && $sectionExternalSiteForm->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_external_site']);
        }

        // Edit SectionSocialNetwork
        $sectionSocialNetwork = $sectionSocialNetworkRepository->findOneBy(['user' => $user]);
        $sectionSocialNetworkForm = $this->createForm(SectionSocialNetworkFormType::class, $sectionSocialNetwork);
        $sectionSocialNetworkForm->handleRequest($request);
        if($sectionSocialNetworkForm->isSubmitted() && $sectionSocialNetworkForm->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_social_network']);
        }

        // Edit SocialNetwork
        $socialNetworks = $socialNetworkRepository->findOneBy(['user' => $user]);
        $socialNetworkForm = $this->createForm(SocialNetworkFormType::class, $socialNetworks);
        $socialNetworkForm->handleRequest($request);
        if($socialNetworkForm->isSubmitted() && $socialNetworkForm->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_social_network']);
        }

        // Create ExternalSite
        // If externalSites exist
        $externalSites = $externalSiteRepository->findBy(['user' => $user]);

        // Add externalSite
        $externalSite = new ExternalSite();
        $externalSiteForm = $this->createForm(ExternalSiteFormType::class, $externalSite);
        $externalSiteForm->handleRequest($request);
        if ($externalSiteForm->isSubmitted() && $externalSiteForm->isValid()) {
            $externalSite->setUser($user);
            $em = $doctrine->getManager();
            $em->persist($externalSite);
            $em->flush();
            return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_external_site']);
        }

        // Create Promotions
        // If promotions exist
        $promotions = $promotionRepository->findBy(['user' => $user]);

        // Add Promotion
        $promotion = new Promotion();
        $promotionForm = $this->createForm(PromotionFormType::class, $promotion);
        $promotionForm->handleRequest($request);
        if ($promotionForm->isSubmitted() && $promotionForm->isValid()) {
            $promotion->setUser($user);
            $em = $doctrine->getManager();
            $em->persist($promotion);
            $em->flush();
            return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_promotion']);
        }


        return $this->render('dashboard_user/index.html.twig', [
            'user' => $user,
            'promotions' => $promotions,
            'externalSites' => $externalSites,
            'sectionAccountForm' => $informationsAccountForm->createView(),
            'sectionBrandForm' => $sectionBrandForm->createView(),
            'sectionVideoForm' => $sectionVideoForm->createView(),
            'sectionPromotionForm' => $sectionPromotionForm->createView(),
            'sectionExternalSiteForm' => $sectionExternalSiteForm->createView(),
            'sectionSocialNetworkForm' => $sectionSocialNetworkForm->createView(),
            'socialNetworkForm' => $socialNetworkForm->createView(),
            'externalSiteForm' => $externalSiteForm->createView(),
            'promotionForm' => $promotionForm->createView(),
        ]);
    }

    /**
     * @Route("/adlink.bio/{pseudo}", name="landing_page")
     */
    public function landingPage(UserRepository $user, $pseudo): Response
    {
        $pseudoUser = $user->findOneBy(['pseudo' => $pseudo]);
        dump($pseudoUser);
        return $this->render('dashboard_user/landing_page.html.twig', [
            'user' => $pseudoUser,
        ]);
    }

    /**
     * @Route("/{id}/deletePromotion", name="deletePromotion")
     */
    public function deletePromotion($id, PromotionRepository $promotion, ManagerRegistry $doctrine) : Response
    {

        $em = $doctrine->getManager();
        $removePromotion = $promotion->find($id);
        $em->remove($removePromotion);
        $em->flush();

        return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_promotion']);
    }

    /**
     * @Route("/{id}/deleteExternalSite", name="deleteExternalSite")
     */
    public function deleteExternalSite($id, ExternalSiteRepository $externalSite, ManagerRegistry $doctrine) : Response
    {
        $em = $doctrine->getManager();
        $removeExternalSite = $externalSite->find($id);
        $em->remove($removeExternalSite);
        $em->flush();

        return $this->redirectToRoute('dashboard_user', ['_fragment' => 'section_external_site']);
    }

}
