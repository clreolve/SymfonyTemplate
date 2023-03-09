<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistroType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/registration', name: 'app_registration')]
    public function index(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $encoder
    ): Response
    {
        $user = new User();
        $form = $this->createForm(UserRegistroType::class, $user);

        $form->handleRequest($request); //determina si el formulario fue enviado
        if ($form->isSubmitted() && $form->isValid()) {
            //si el formulario es enviado y es valido
            $user->setActivo(true);
            $user->setRoles(['ROLE_USER']);

            $user->setPassword(
                $encoder->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            try {
                $em->persist($user);
                $em->flush();
                $this->addFlash(type: 'exito', message: USER::MSG_REGISTRO_EXITOSO);
            } catch (UniqueConstraintViolationException $e) {
                $this->addFlash(type: 'danger', message: "El email ya esta registrado");
            }

            return $this->redirectToRoute('app_registro');
        }

        return $this->render('user/index.html.twig', [
            'formulario' => $form->createView()
        ]);
    }
}
