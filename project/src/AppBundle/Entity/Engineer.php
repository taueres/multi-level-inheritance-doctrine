<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Engineer
 *
 * @ORM\Entity()
 * @ORM\Table(name="engineer")
 */
class Engineer extends Employee
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $mainSkill;

    /**
     * @return string
     */
    public function getMainSkill()
    {
        return $this->mainSkill;
    }

    /**
     * @param string $mainSkill
     */
    public function setMainSkill($mainSkill)
    {
        $this->mainSkill = $mainSkill;
    }
}
