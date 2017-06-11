<?php

namespace Seb\BadgeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Badge
 *
 * @ORM\Table(name="badge")
 * @ORM\Entity(repositoryClass="Seb\BadgeBundle\Repository\BadgeRepository")
 */
class Badge
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="action_name", type="string", length=255)
     */
    private $actionName;

    /**
     * @var int
     *
     * @ORM\Column(name="action_count", type="integer")
     */
    private $actionCount;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Seb\BadgeBundle\Entity\BadgeUnlock", mappedBy="badge")
     */
    private $unlocks;


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
     * Set name
     *
     * @param string $name
     *
     * @return Badge
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set actionName
     *
     * @param string $actionName
     *
     * @return Badge
     */
    public function setActionName($actionName)
    {
        $this->actionName = $actionName;

        return $this;
    }

    /**
     * Get actionName
     *
     * @return string
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * Set actionCount
     *
     * @param integer $actionCount
     *
     * @return Badge
     */
    public function setActionCount($actionCount)
    {
        $this->actionCount = $actionCount;

        return $this;
    }

    /**
     * Get actionCount
     *
     * @return int
     */
    public function getActionCount()
    {
        return $this->actionCount;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->unlocks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add unlock
     *
     * @param \Seb\BadgeBundle\Entity\BadgeUnlock $unlock
     *
     * @return Badge
     */
    public function addUnlock(\Seb\BadgeBundle\Entity\BadgeUnlock $unlock)
    {
        $this->unlocks[] = $unlock;

        return $this;
    }

    /**
     * Remove unlock
     *
     * @param \Seb\BadgeBundle\Entity\BadgeUnlock $unlock
     */
    public function removeUnlock(\Seb\BadgeBundle\Entity\BadgeUnlock $unlock)
    {
        $this->unlocks->removeElement($unlock);
    }

    /**
     * Get unlocks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnlocks()
    {
        return $this->unlocks;
    }
}
