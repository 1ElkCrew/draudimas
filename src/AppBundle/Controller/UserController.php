<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller{
    /**
     * @var Request request
     * @Route("/user", name="user")
     * @return Response
     */
    public function indexAction(Request $request){
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return new Response();
        }
        return $this->render("", [ //TODO: fix user
            'user' => $user,
            'form' => $form->createView(),
        ]);

    }
}