<?php

namespace Ridelink\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Question5Command extends Command
{
    protected function configure()
    {
        $this->setName('question5');
        $this->setDescription('execute question 5');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Result: Doubly Linked List");
    }
}