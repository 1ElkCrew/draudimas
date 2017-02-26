<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sutartis;
use AppBundle\Form\SutartisType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EditController extends Controller
{
    /**
     * @Route("/redaguoti/{sutartis}", name="edit")
     * @param Request $request
     * @param Sutartis $sutartis
     * @return Response
     */
    public function indexAction(Request $request, Sutartis $sutartis){
        $form = $this->createForm(SutartisType::class, $sutartis);
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("sutartys");
        }
        return $this->render("newSutartis/new.html.twig",[
            'sutartis' => $sutartis,
            'form' => $form->createView(),
        ]);
    }

    /**
     *
     */
}
