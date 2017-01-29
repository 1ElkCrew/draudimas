<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AllShowController extends Controller
{
    /**
     * @Route("/sutartys", name="sutartys")
     */
    public function indexAction(Request $request){
        $sutartis = $this->getDoctrine()->getRepository("AppBundle:Sutartis")->findAll();
        return $this->render('default/allSutartys.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'sutartis' => $sutartis,
        ]);
    }
}
