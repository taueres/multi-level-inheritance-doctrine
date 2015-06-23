<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Employee
 *
 * @ORM\Entity()
 * @ORM\Table(name="employee")
 */
class Employee extends Person
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $departement;

    /**
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param string $departement
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }
}
