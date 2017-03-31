<?php
/**
 * Created by PhpStorm.
 * User: briedis
 * Date: 2/26/17
 * Time: 3:50 PM
 */
namespace AppBundle\Service;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class StatusUpdateService {
    private $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function sutartisStatusUpdate(User $user = null){
        $sutartis = $this->em->getRepository('AppBundle:Sutartis')->findBy([
            'user' => $user,
        ]);
        /**@var \AppBundle\Entity\Sutartis $info*/
        foreach ($sutartis as $info){
            $endDate = $info->getEndDate();
            $today = new \DateTime();
            $afterYear = new \DateTime('+1year');
            if($today > $endDate){
                $info->setStatus(1);
            }
            elseif($afterYear > $endDate){
                $info->setStatus(-1);
            }
            /* TODO: Jei nutraukta ar atsaukta = nekeisti. */
            //TODO: JEI PRAILGINA TERMINA IR t.t..
        }
        $this->em->flush();
    }

}