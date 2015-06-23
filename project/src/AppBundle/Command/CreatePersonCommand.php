<?php

namespace AppBundle\Command;

use AppBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePersonCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('create-person');
        $this->addArgument('firstName', InputArgument::REQUIRED);
        $this->addArgument('lastName', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $p = new Person($input->getArgument('firstName'), $input->getArgument('lastName'));

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        $em->persist($p);
        $em->flush($p);
    }
}
