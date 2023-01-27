<?php

namespace App\Controller;

use App\Entity\SectionBrand;
use App\Entity\SectionExternalSite;
use App\Entity\SectionPromotion;
use App\Entity\SectionSocialNetwork;
use App\Entity\SectionVideo;
use App\Entity\SocialNetwork;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(
        Request $request, UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        // User Create
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );
            $user->setGlobalFontName('Bitter');
            $entityManager->persist($user);
            $entityManager->flush();

            // Brand Create
            $em = $doctrine->getManager();
            $sectionBrand = new SectionBrand();
            $sectionBrand->setLogo('logo.png');
            $sectionBrand->setBrandName('AdLink');
            $sectionBrand->setBaseline('Agence de Développement Web');
            $sectionBrand->setBrandBackground('#575756');
            $sectionBrand->setBrandNameColor('#ffffff');
            $sectionBrand->setBrandBaselineColor('#ffffff');
            $sectionBrand->setEnabled(false);
            $sectionBrand->setUser($user);
            $em->persist($sectionBrand);
            $em->flush();

            // Section Video Create
            $em = $doctrine->getManager();
            $sectionVideo = new SectionVideo();
            $sectionVideo->setLink('https://www.youtube.com/watch?v=y_LwPwwlb6E');
            $sectionVideo->setSectionVideoBackground('#575756');
            $sectionVideo->setEnabled(false);
            $sectionVideo->setUser($user);
            $em->persist($sectionVideo);
            $em->flush();

            // Section Promotion
            $em = $doctrine->getManager();
            $sectionPromotion = new SectionPromotion();
            $sectionPromotion->setSectionPromotionBackground('#575756');
            $sectionPromotion->setSectionPromotionCardBackground('#DADADA');
            $sectionPromotion->setSectionPromotionButtonBackground('#DADADA');
            $sectionPromotion->setSectionPromotionCodeColor('#61A8DD');
            $sectionPromotion->setSectionPromotionDescriptionColor('#61A8DD');
            $sectionPromotion->setEnabled(false);
            $sectionPromotion->setUser($user);
            $em->persist($sectionPromotion);
            $em->flush();

            // Section External Site
            $em = $doctrine->getManager();
            $sectionExternalSite = new SectionExternalSite();
            $sectionExternalSite->setExternalSiteBackground('#DADADA');
            $sectionExternalSite->setButtonBackground('#61A8DD');
            $sectionExternalSite->setExternalSiteLinkColor('#DADADA');
            $sectionExternalSite->setEnabled(false);
            $sectionExternalSite->setUser($user);
            $em->persist($sectionExternalSite);
            $em->flush();

            // Section SocialNetwork
            $em = $doctrine->getManager();
            $sectionSocialNetwork = new SectionSocialNetwork();
            $sectionSocialNetwork->setSectionSocialNetworkBackground('#DADADA');
            $sectionSocialNetwork->setSocialNetworkIconColor('#61A8DD');
            $sectionSocialNetwork->setEnabled(false);
            $sectionSocialNetwork->setUser($user);
            $em->persist($sectionSocialNetwork);
            $em->flush();


            // SocialNetwork
            $em = $doctrine->getManager();
            $socialNetwork = new SocialNetwork();
            $socialNetwork->setUser($user);
            $em->persist($socialNetwork);
            $em->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
