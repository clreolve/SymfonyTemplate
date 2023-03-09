<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Form\UserRegistroType;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/registro', name: 'app_registration')]
    public function index(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $encoder
    ): Response
    {
        $user = new Usuario();
        $form = $this->createForm(UserRegistroType::class, $user);

        $form->handleRequest($request); //determina si el formulario fue enviado
        if ($form->isSubmitted() && $form->isValid()) {
            //si el formulario es enviado y es valido
            $user->setActivo(true);
            $user->setRoles(['ROLE_USER']);

            $user->setPassword(
                $encoder->hashPassword(
                    $user,
                    $form->get('plain_password')->getData()
                )
            );

            try {
                $em->persist($user);
                $em->flush();
                $this->addFlash(type: 'exito', message: "Usuario creado");
            } catch (UniqueConstraintViolationException $e) {
                $this->addFlash(type: 'danger', message: "El email ya esta registrado");
            }

            return $this->redirectToRoute('home');
        }

        return $this->render('registration/index.html.twig', [
            'formulario' => $form->createView()
        ]);
    }
}
