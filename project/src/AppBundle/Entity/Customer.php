<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Customer
 *
 * @ORM\Entity()
 * @ORM\Table(name="customer")
 */
class Customer extends Person
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $shippingAddress;

    /**
     * @return string
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param string $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }
}
