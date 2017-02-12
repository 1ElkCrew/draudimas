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
        $orderBy = [];
        if($request->query->has('orderBy')){
            $fields = explode(",",$request->query->get('orderBy'));
            foreach ($fields as $o) {
                $direction = 'ASC';
                if (substr($o, 0, 1) == "-") {
                    $o = substr($o, 1, strlen($o) - 1);
                    $direction = 'DESC';
                }
                $orderBy[$o] = $direction;
            }
        }
        else {
            $orderBy['status'] = 'ASC';
        }
        $sutartis = $this->getDoctrine()->getRepository("AppBundle:Sutartis")->findBy([
            'user' => $this->getUser(),
            ], $orderBy)
        ;
        return $this->render('default/allSutartys.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'sutartis' => $sutartis,
            'orderBy' => $orderBy,
        ]);
    }
}
