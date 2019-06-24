<?php

namespace App\Controller;

use App\Entity\Kamer;
use App\Form\KamerType;
use App\Repository\KamerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/lijstbeschikbaar", name="lijstbeschikbaar")
     */
    public function lijst(KamerRepository $kamerRepository)
    {
        return $this->render('default/kamerhuren.html.twig', [
            'kamers' => $kamerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/fotos", name="fotos")
     */
    public function fotos()
    {
        return $this->render('default/fotos.html.twig', [
            'controller_name' => 'default/fotos.html.twig',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('default/contact.html.twig', [
            'controller_name' => 'default/contact.html.twig',
        ]);
    }
}
