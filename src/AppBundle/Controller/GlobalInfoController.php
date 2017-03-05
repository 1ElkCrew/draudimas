<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GlobalInfoController extends Controller {
    /**
     * @Route("/info", name="global_info")
     */
    public function indexAction(Request $request){
        $sutartis = $this->getDoctrine()->getRepository('AppBundle:Sutartis')->findBy([
            'user' => $this->getUser(),
        ]);

        $svc = $this->get('app.info');
        $sum = $svc->showYearlyEarnings($this->getUser(), (new \DateTime())->format('Y'));



        return $this->render('default/globalInfo.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'sutartis' => $sutartis,
            'sum' => $sum,
        ]);
    }
}
