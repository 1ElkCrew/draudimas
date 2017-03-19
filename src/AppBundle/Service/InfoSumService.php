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

    /*
    public function showYearlyEarnings(User $user = null, $year){ // TODO: if user == null, tai sum == 0 wtf...
        $dateStart = new \DateTime($year . '-01-01');
        $dateEnd = new \DateTime($year . '-12-31');

        $sutartys = $this->em->getRepository('AppBundle:Sutartis')
            ->getDataByDate($user, $dateStart, $dateEnd);

        $sum = 0;
        /** @var \AppBundle\Entity\Sutartis $sutartis*
        foreach ($sutartys as $sutartis) {
            $sum += $sutartis->getMoney();
        }
        return $sum;
    }
    */
    public function getYearSum(User $user = null, $year){
        $dateStart = new \DateTime($year . '-01-01');
        $dateEnd = new \DateTime($year . '-12-31');
        $sum = $this->em->getRepository('AppBundle:Sutartis')
            ->getYearlySum($user, $dateStart, $dateEnd);
        return $sum;
    }

    public function getYearAmount(User $user = null, $year){
        $dateStart = new \DateTime($year . '-01-01');
        $dateEnd = new \DateTime($year . '-12-31');
        $sum = $this->em->getRepository('AppBundle:Sutartis')
            ->getYearlyAmount($user, $dateStart, $dateEnd);
        return $sum;
    }

    public function getMonthSum(User $user = null, $year, $month){
        $dateStart = new \DateTime($year . '-' . $month . '-01');
        $dateEnd = clone $dateStart;
        $dateEnd->modify('+1month-1day');
        $sum = $this->em->getRepository('AppBundle:Sutartis')
            ->getMonthlySum($user, $dateStart, $dateEnd);
        return $sum;
    }

    public function getMonthAmount(User $user = null, $year, $month){
        $dateStart = new \DateTime($year . '-'. $month .'-01');
        $dateEnd = clone $dateStart;
        $dateEnd->modify('+1month-1day');
        $sum = $this->em->getRepository('AppBundle:Sutartis')
            ->getMonthlyAmount($user, $dateStart, $dateEnd);
        return $sum;
    }
    public function getYearInfo(User $user = null, $year, $month = null){
        if($month == null) {
            $dateStart = new \DateTime($year . '-01-01');
            $dateEnd = new \DateTime($year . '-12-31');
        }
        else {
            $dateStart = new \DateTime($year . '-' . $month . '-01');
            $dateEnd = clone $dateStart;
            $dateEnd->modify('+1month-1day');
        }
        $info = $this->em->getRepository('AppBundle:Sutartis')
            ->getYearlyInfo($user, $dateStart, $dateEnd);
        return $info;
    }

}