<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends Controller {

    /**
     * @Route("/create", name="comment_create")
     */
    public function newAction()
    {
        return $this->render('comment/new.html.twig');
    }
}