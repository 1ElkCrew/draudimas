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

        if ($request->query->has('year')) {
            $year = $request->query->get('year');
        }
        else {
            $year = (new \DateTime())->format('Y');
        }

        if ($request->query->has('month')) {
            $month = $request->query->get('month');
        }
        else {
            $month = (new \DateTime())->format('m');
        }
        $rep = $this->getDoctrine()->getRepository('AppBundle:Sutartis');
        $orderBy = $rep->dataSort($request);
        $svc = $this->get('app.update');
        $svc->sutartisStatusUpdate($this->getUser());
        $svc = $this->get('app.info');
        $atrSutartis = $svc->getYearInfo($this->getUser(), $year, $month);
        $sum = $svc->getYearSum($this->getUser(), $year);
        $amt = $svc->getYearAmount($this->getUser(), $year);
        $msum = null;
        $mamt = null;
        if ($month != null) {
            $msum = $svc->getMonthSum($this->getUser(), $year, $month);
            $mamt = $svc->getMonthAmount($this->getUser(), $year , $month);
        }

        return $this->render('default/globalInfo.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'sutartis' => $sutartis,
            'sum' => $sum,
            'amt' => $amt,
            'msum' => $msum,
            'mamt' => $mamt,
            'year' => $year,
            'month' => $month,
            'orderBy' => $orderBy,
            'atrSutartis' => $atrSutartis,
            'back' => '2',
        ]);
    }
}
