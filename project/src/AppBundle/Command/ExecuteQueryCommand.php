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

class ExecuteQueryCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('execute-query');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Person Query
        $dql = "
            SELECT person FROM AppBundle\Entity\Person person
            WHERE person.firstName = 'Sergio'
        ";

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');

        $query = $em->createQuery($dql);
        dump($query->getResult());


        // Employee Query
        $dql = "
            SELECT employee FROM AppBundle\Entity\Employee employee
            WHERE employee.departement = 'machinery'
        ";

        $query = $em->createQuery($dql);
        dump($query->getResult());
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
        
        $p = new Manager('Sergio', 'Grafi');
        $p->setDepartement('recruiting');
        $p->setYearsOfExperience(5);
        $entities[] = $p;

        return $entities;
    }
}
