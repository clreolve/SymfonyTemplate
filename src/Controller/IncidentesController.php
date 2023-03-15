<?php

namespace App\Controller;

use App\Entity\Incidente;
use App\Form\IncidenteCrearType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/incidente')]
class IncidentesController extends AbstractController
{
    #[Route('/incidentes', name: 'app_incidentes')]
    public function index(): Response
    {
        return $this->render('incidentes/index.html.twig', [
            'controller_name' => 'IncidentesController',
        ]);
    }


    #[Route('/crear', name: 'crear')]
    public function crear(Request $request, EntityManagerInterface $em): Response
    {
        $incidente = new Incidente();
        $form = $this->createForm(IncidenteCrearType::class, $incidente);
        $form->handleRequest($request); //determina si el formulario fue enviado
        if ($form->isSubmitted() && $form->isValid()) {
            $incidente->setFecha(new DateTime());
            $incidente->setEstado('Atendiendo');
            $incidente->setUsuario($this->getUser());
            $em->persist($incidente);
            $em->flush();

            return $this->redirectToRoute('app_incidentes');
        }

        return $this->render('incidentes/crear.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/finalizar', name: 'incidentes_crear')]
    public function finalizar(Request $request, EntityManagerInterface $em): Response
    {
        $incidente = new Incidente();
        $form = $this->createForm(IncidenteCrearType::class, $incidente);
        $form->handleRequest($request); //determina si el formulario fue enviado
        if ($form->isSubmitted() && $form->isValid()) {
            $incidente->setFecha(new DateTime());
            $incidente->setEstado('Atendiendo');
            $incidente->setObservacion('');
            $incidente->setUsuario($this->getUser());
            $em->persist($incidente);
            $em->flush();

            return $this->redirectToRoute('incidentes_lista');
        }

        return $this->render('incidentes/crear.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/lista', name: 'incidentes_lista')]
    public function listar(Request $request, EntityManagerInterface $em): Response
    {
        $incidentes = $em->getRepository(Incidente::class)->findBy([
            'estado' => 'Atendiendo',
        ]);

        $incidentesF = $em->getRepository(Incidente::class)->findBy([
            'estado' => 'Finalizado',
        ]);

        return $this->render('incidentes/lista.html.twig', [
            'incidentes' => $incidentes,
            'incidentesF' => $incidentesF
        ]);
    }
}
