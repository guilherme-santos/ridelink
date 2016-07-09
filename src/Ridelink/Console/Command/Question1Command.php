<?php

namespace Ridelink\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Question1Command extends Command
{
    protected $braces = [
        '(' => ')',
        '{' => '}',
        '[' => ']',
    ];

    protected function configure()
    {
        $this->setName('question1');
        $this->setDescription('execute question 1');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write("Type number of strings we should expect: ");
        $n = intval(trim(fgets(STDIN)));

        $inputs = $outputs = [];

        $output->writeln(sprintf("We're expecting %d strings, type each one and press enter:", $n));
        for ($i = 0; $i < $n; $i++) {
            $output->write("> ");
            $string = trim(fgets(STDIN));
            $inputs[] = $string;
            $outputs[] = $this->isBalanced($string);
        }

        $output->writeln("Result:");

        foreach ($outputs as $balanced) {
            $output->writeln("> " . ($balanced ? 'YES' : 'NO'));
        }
    }

    protected function isBalanced($input)
    {
        $braces = [];
        for ($i = 0; $i < strlen($input); $i++) {
            if (array_key_exists($input[$i], $this->braces)) {
                array_push($braces, $input[$i]);
            } else {
                $brace = array_pop($braces);
                $expectedBrace = $this->braces[$brace];

                if ($input[$i] !== $expectedBrace) {
                    return false;
                }
            }
        }

        return true;
    }
}