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
        $svc = $this->get('app.update');
        $rep = $this->getDoctrine()->getRepository('AppBundle:Sutartis');
        $orderBy = $rep->dataSort($request);
        $sutartis = $this->getDoctrine()->getRepository("AppBundle:Sutartis")->findBy([
            'user' => $this->getUser(),
        ], $orderBy);

        $svc->sutartisStatusUpdate($this->getUser());
        return $this->render('default/allSutartys.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'sutartis' => $sutartis,
            'orderBy' => $orderBy,
        ]);
    }
}
