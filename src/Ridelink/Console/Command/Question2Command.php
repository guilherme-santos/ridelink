<?php

namespace Ridelink\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Question2Command extends Command
{
    protected function configure()
    {
        $this->setName('question2');
        $this->setDescription('execute question 2');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write("Type number of integer we should expect: ");
        $n = intval(trim(fgets(STDIN)));

        $inputs = [];

        $output->writeln(sprintf("We're expecting %d strings, type each integer and press enter:", $n));
        for ($i = 0; $i < $n; $i++) {
            $output->write("> ");
            $value = intval(trim(fgets(STDIN)));
            $inputs[] = $value;
        }

        $output->write("Sum of pairs: ");
        $k = intval(trim(fgets(STDIN)));

        $numberOfPairs = $this->numberOfPairs($k, $inputs);
        $output->writeln("Result: " . $numberOfPairs);
    }

    protected function numberOfPairs($k, $inputs)
    {
        $visited = [];
        $pairs = 0;

        foreach ($inputs as $i => $value1) {
            for ($j = ($i + 1); $j < count($inputs); $j++) {
                $value2 = $inputs[$j];

                if (($value1 + $value2) == $k) {
                    // verifying if $value1 has already been used with $value2
                    if (array_key_exists($value1, $visited) && in_array($value2, $visited[$value1])) {
                        continue;
                    }

                    // mark value2 was used with value1
                    $visited[$value2][] = $value1;
                    $pairs++;
                    // only to debug
                    // echo "i=$i value1=$value1 j=$j value2=$inputs[$j]" . PHP_EOL;
                }
            }
        }

        return $pairs;
    }
}