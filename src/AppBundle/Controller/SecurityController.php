<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller {

    /**
     * @Route("/login", name="login")
     * @return Response
     */
    public function loginAction ()
    {
        $authentificationUtils = $this->get('security.authentication_utils');

        $error = $authentificationUtils->getLastAuthenticationError();
        $lastUsername = $authentificationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'error'         => $error,
            'last_username' => $lastUsername,
        ]);
    }

}