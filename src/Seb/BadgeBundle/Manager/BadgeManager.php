<?php

namespace Seb\BadgeBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;
use Seb\BadgeBundle\Entity\BadgeUnlock;

class BadgeManager {

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ObjectManager $manager)
    {

        $this->em = $manager;
    }


    /**
     * Check if a badge exists for this action and action occurence and unlock it for the user
     *
     * @param $user
     * @param $action
     * @param $action_count
     * @internal param $user_id
     */
    public function checkAndUnlock($user, $action, $action_count)
    {
        try {
            // Vérifier si on a badge qui correspond a action et action count
            $badge = $this->em
                ->getRepository('BadgeBundle:Badge')
                ->findWithUnlockForAction($user, $action, $action_count);

            // Vérifier si l'utilisateur a déjà ce badge
            if ($badge->getUnlocks()->isEmpty()) {
                $unlock = new BadgeUnlock();
                $unlock->setBadge($badge);
                $unlock->setUser($user);
                $this->em->persist($unlock);
                $this->em->flush();
            }
        } catch (NoResultException $e) {

        }





        // Débloquer le badge pour l'utilisateur en question

        // Emetter un événement pour informer l'application du déblocage de base
    }

    /**
     * Get Badges unlocked for the current user
     * @param $user
     */
    public function getBadgeFor ($user)
    {
        return $this->em->getRepository('BadgeBundle:Badge')->findUnlockedFor($user->getId());
    }

}