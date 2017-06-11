<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends Controller {

    /**
     * @Route("/create", name="comment_create")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comment = new Comment();

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $comment->setUser($user);
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($comment);
            $em->flush();
        }

        $comments = $em->getRepository('AppBundle:Comment')->findAll();

        return $this->render('comment/new.html.twig', [
            'comments'  => $comments,
            'form'      => $form->createView(),
        ]);
    }
}