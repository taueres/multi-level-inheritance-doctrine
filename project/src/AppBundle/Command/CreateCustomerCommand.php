<?php

namespace AppBundle\Command;

use AppBundle\Entity\Customer;
use AppBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\DialogHelper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCustomerCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('create-customer');
        $this->addArgument('firstName', InputArgument::REQUIRED);
        $this->addArgument('lastName', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fn = $input->getArgument('firstName');
        $ln = $input->getArgument('lastName');

        /** @var DialogHelper $dialog */
        $dialog = $this->getHelper('dialog');
        $address = $dialog->ask($output, 'Shipping address?');

        $p = new Customer($fn, $ln);
        $p->setShippingAddress($address);

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        $em->persist($p);
        $em->flush($p);
    }
}
