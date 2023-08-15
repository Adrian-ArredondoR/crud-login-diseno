<?php

namespace App\Controller;

use App\Entity\Datos;
use App\Form\DatosType;
use App\Repository\DatosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/datos")
 */
class DatosController extends AbstractController
{
    /**
     * @Route("/ind", name="datos_index", methods={"GET"})
     */
    public function index(DatosRepository $datosRepository): Response
    {
        return $this->render('datos/index.html.twig', [
            'datos' => $datosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="datos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dato = new Datos();
        $form = $this->createForm(DatosType::class, $dato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dato);
            $entityManager->flush();

            return $this->redirectToRoute('datos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('datos/new.html.twig', [
            'dato' => $dato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="datos_show", methods={"GET"})
     */
    public function show(Datos $dato): Response
    {
        return $this->render('datos/show.html.twig', [
            'dato' => $dato,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="datos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Datos $dato): Response
    {
        $form = $this->createForm(DatosType::class, $dato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('datos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('datos/edit.html.twig', [
            'dato' => $dato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="datos_delete", methods={"POST"})
     */
    public function delete(Request $request, Datos $dato): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dato->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dato);
            $entityManager->flush();
        }

        return $this->redirectToRoute('datos_index', [], Response::HTTP_SEE_OTHER);
    }
}
