<?php

namespace Ridelink\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Question7Command extends Command
{
    protected function configure()
    {
        $this->setName('question7');
        $this->setDescription('execute question 7');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Result: O(log(n))");
    }
}