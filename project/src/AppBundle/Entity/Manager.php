<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Manager
 *
 * @ORM\Entity()
 * @ORM\Table(name="manager")
 */
class Manager extends Employee
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $yearsOfExperience;

    /**
     * @return int
     */
    public function getYearsOfExperience()
    {
        return $this->yearsOfExperience;
    }

    /**
     * @param int $yearsOfExperience
     */
    public function setYearsOfExperience($yearsOfExperience)
    {
        $this->yearsOfExperience = $yearsOfExperience;
    }
}
