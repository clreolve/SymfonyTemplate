<?php

namespace App\Controller;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function home(): Response
    {
        return $this->redirectToRoute("app_login");
    }

    #[Route(path: '/usuarios', name: 'app_usuarios')]
    public function usuarios(EntityManagerInterface $em): Response
    {
        
        /* $usuarios = array();
        array_push($usuarios, $this->getUser()); */
        
        $usuarios = $em->getRepository(Usuario::class)->findAll();
        /* if (in_array('ROLE_SUPERVISOR', $this->getUser()->getRoles(), true)) {
        } */

        return $this->render('security/usuarios_lista.html.twig', [
            'usuarios' => $usuarios,
        ]);
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): Response
    {
        return $this->redirectToRoute('app_login');
    }
}
