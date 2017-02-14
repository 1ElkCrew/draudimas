<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OneShowController extends Controller
{
    /**
     * @Route("/info/{sutartis}", name="one_info")
     */
    public function indexAction(Request $request){
        $repo = $this->getDoctrine()->getRepository('AppBundle:Sutartis');
        //return $this->render('', array('name' => $name));
    }

    /**
     *
     */
}
