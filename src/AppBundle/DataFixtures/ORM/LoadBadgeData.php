<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Seb\BadgeBundle\Entity\Badge;

class LoadBadgeData extends AbstractFixture implements FixtureInterface {


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $badge = new Badge();
        $badge->setName('Timide');
        $badge->setActionCount(1);
        $badge->setActionName('comment');

        $manager->persist($badge);

        $badge = new Badge();
        $badge->setName('Pipelette');
        $badge->setActionCount(2);
        $badge->setActionName('comment');

        $manager->persist($badge);

        $manager->flush();
    }

}