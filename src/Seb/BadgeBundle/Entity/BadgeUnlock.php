<?php

namespace Seb\BadgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BadgeUnlock
 *
 * @ORM\Table(name="badge_unlock")
 * @ORM\Entity(repositoryClass="Seb\BadgeBundle\Repository\BadgeUnlockRepository")
 */
class BadgeUnlock
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Badge
     *
     * @ORM\ManyToOne(targetEntity="Seb\BadgeBundle\Entity\Badge", inversedBy="unlocks")
     */
    private $badge;


    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set badge
     *
     * @param \Seb\BadgeBundle\Entity\Badge $badge
     *
     * @return BadgeUnlock
     */
    public function setBadge(\Seb\BadgeBundle\Entity\Badge $badge = null)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Get badge
     *
     * @return \Seb\BadgeBundle\Entity\Badge
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return BadgeUnlock
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
