<?php

namespace App\Controller;

use App\Entity\Soort;
use App\Form\SoortType;
use App\Repository\SoortRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/soort")
 */
class SoortController extends AbstractController
{
    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/", name="soort_index", methods={"GET"})
     */
    public function index(SoortRepository $soortRepository): Response
    {
        return $this->render('soort/index.html.twig', [
            'soorts' => $soortRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="soort_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $soort = new Soort();
        $form = $this->createForm(SoortType::class, $soort);
        $form->handleRequest($request);
        if ($this->security->isGranted('ROLE_ADMIN') ){
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($soort);
                $entityManager->flush();
            }
        }else {
            return $this->redirectToRoute('fos_user_security_login');
        }
        return $this->render('soort/new.html.twig', [
            'soort' => $soort,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="soort_show", methods={"GET"})
     */
    public function show(Soort $soort): Response
    {
        return $this->render('soort/show.html.twig', [
            'soort' => $soort,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="soort_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Soort $soort): Response
    {
        $form = $this->createForm(SoortType::class, $soort);
        $form->handleRequest($request);
        if ($this->security->isGranted('ROLE_ADMIN') ){
            if ($form->isSubmitted() && $form->isValid()) {
                $this->getDoctrine()->getManager()->flush();
            }
        }else{
            return $this->redirectToRoute('fos_user_security_login', [
                'id' => $soort->getId(),
                ]);
        }
        return $this->render('soort/edit.html.twig', [
            'soort' => $soort,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="soort_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Soort $soort): Response
    {
        if ($this->isCsrfTokenValid('delete'.$soort->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($soort);
            $entityManager->flush();
        }

        return $this->redirectToRoute('soort_index');
    }
}
