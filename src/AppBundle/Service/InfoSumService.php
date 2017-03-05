<?php
use Doctrine\ORM\EntityManager;

/**
 * Created by PhpStorm.
 * User: briedis
 * Date: 2/26/17
 * Time: 3:50 PM
 */
namespace AppBundle\Service;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class InfoSumService {
    private $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function showYearlyEarnings(User $user = null, $year){ // TODO: if user == null, tai sum == 0 wtf...
        $dateStart = new \DateTime($year . '-01-01');
        $dateEnd = new \DateTime($year . '-12-31');

        $sutartys = $this->em->getRepository('AppBundle:Sutartis')
            ->getDataByDate($user, $dateStart, $dateEnd);

        $sum = 0;
        /**@var \AppBundle\Entity\Sutartis $info*/
        foreach ($sutartys as $sutartis) {
            $sum += $sutartis->getMoney();
        }
        return $sum;
    }
    //TODO: count amount of entities

}