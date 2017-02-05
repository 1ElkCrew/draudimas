<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sutartis;
use AppBundle\Form\SutartisType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewSutartisController extends Controller
{
    /**
     * @Route("/nauja", name="new")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request){
        $sutartis = new Sutartis();
        $form = $this->createForm(SutartisType::class, $sutartis)->add('add', SubmitType::class, ['label' => 'Išsaugoti']);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($sutartis);
            $em->flush();
            return $this->redirectToRoute('sutartys');
        }
        return $this->render('newSutartis/new.html.twig', [
            'sutartis' => $sutartis,
            'form' => $form->createView(),
        ]);
    }
}