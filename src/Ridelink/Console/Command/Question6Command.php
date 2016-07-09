<?php

namespace Ridelink\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Question6Command extends Command
{
    protected function configure()
    {
        $this->setName('question6');
        $this->setDescription('execute question 6');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Result: 1 2 3 4 5 7 9");
    }
}