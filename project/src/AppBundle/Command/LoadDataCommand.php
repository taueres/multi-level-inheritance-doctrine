<?php

namespace AppBundle\Command;

use AppBundle\Entity\Customer;
use AppBundle\Entity\Employee;
use AppBundle\Entity\Engineer;
use AppBundle\Entity\Manager;
use AppBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LoadDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('load-data');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entities = $this->getEntities();

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        foreach ($entities as $entity) {
            $em->persist($entity);
        }
        $em->flush();
    }

    private function getEntities()
    {
        $p = new Person('Sergio', 'Santoro');
        $entities[] = $p;

        $p = new Customer('Sergio', 'Lesta');
        $p->setShippingAddress('This is an address');
        $entities[] = $p;

        $p = new Employee('Sergio', 'Franchi');
        $p->setDepartement('machinery');
        $entities[] = $p;

        $p = new Engineer('Alberto', 'Grafi');
        $p->setDepartement('machinery');
        $p->setMainSkill('desing');
        $entities[] = $p;

        $p = new Engineer('Sergio', 'L\'ingegnere');
        $p->setDepartement('recruiting');
        $p->setMainSkill('chatting');
        $entities[] = $p;

        $p = new Manager('Sergio', 'Grafi');
        $p->setDepartement('recruiting');
        $p->setYearsOfExperience(5);
        $entities[] = $p;

        return $entities;
    }
}
