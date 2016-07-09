<?php

namespace Ridelink\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Question8Command extends Command
{
    protected function configure()
    {
        $this->setName('question8');
        $this->setDescription('execute question 8');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Result: Tower of Hanoi");
    }
}