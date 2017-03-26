<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sutartis;
use AppBundle\Form\SutartisType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SutartisController extends Controller
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
            if ($request->query->has('back') && $request->query->get('back') == '1') {
                return $this->redirectToRoute("sutartys");
            }
            else if ($request->query->has('back') && $request->query->get('back') == '2') {
                return $this->redirectToRoute("global_info");
            }
        }
        return $this->render("default/edit.html.twig",[
            'sutartis' => $sutartis,
            'form' => $form->createView(),
            'back' => $request->query->has('back') ? $request->query->get('back') : '1',
            'id' => $sutartis->getId(),
            'attr' => ['class' => 'btn btn-success col-xs-12 col-md-3'],
        ]);
    }

    /**
     * @Route("/nauja", name="new")
     * @param Request $request
     * @return Response
     */
    public function addAction(Request $request){
        $sutartis = new Sutartis();
        $form = $this->createForm(SutartisType::class, $sutartis);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $sutartis->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($sutartis);
            $em->flush();
            return $this->redirectToRoute('sutartys');
        }
        return $this->render('default/new.html.twig', [
            'sutartis' => $sutartis,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/info/{sutartis}", name="info")
     * @param Request $request
     * @param Sutartis $sutartis
     * @return Response
     */
    public function detailsAction (Request $request, Sutartis $sutartis){
        return $this->render(':default:info.html.twig', [
            'sutartis' => $sutartis,
            'back' => $request->query->has('back') ? $request->query->get('back') : '1',
        ]);
    }

    /**
     * @Route("/trinti/{sutartis}", name="delete")
     * @param Sutartis $sutartis
     */
    public function deleteAction(Request $request, Sutartis $sutartis){
        $form = $this->createFormBuilder()
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-danger col-xs-12 col-md-3'],
                'label' => 'Taip',
            ])
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sutartis);
            $em->flush();
            if ($request->query->has('back') && $request->query->get('back') == '1') {
                return $this->redirectToRoute("sutartys");
            }
            else if ($request->query->has('back') && $request->query->get('back') == '2') {
                return $this->redirectToRoute("global_info");
            }
        }

        return $this->render("default/delete.html.twig", [
            'sutartis' => $sutartis,
            'form' => $form->createView(),
            'back' => $request->query->has('back') ? $request->query->get('back') : '1',
            'id' => $sutartis->getId(),
        ]);
    }
}
