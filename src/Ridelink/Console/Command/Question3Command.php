<?php

namespace Ridelink\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Question3Command extends Command
{
    protected function configure()
    {
        $this->setName('question3');
        $this->setDescription('execute question 3');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write("Type size of matrix: ");
        $n = intval(trim(fgets(STDIN)));

        $output->writeln(sprintf('We\'re expecting %d x %d matrix, type each line and press enter:', $n, $n));

        $matrix = [];

        for ($i = 0; $i < $n; $i++) {
            $output->write("> ");
            $line = trim(fgets(STDIN));
            $matrix[$i] = preg_split('//', $line, -1, PREG_SPLIT_NO_EMPTY);
        }

        $clusters = [];
        foreach ($matrix as $zoombie => $columns) {
            for ($i = $zoombie+1; $i < $n; $i++) {
                if ($columns[$i] == 1) {
                    $clusterId = $zoombie;
                    foreach ($clusters as $id => $cluster) {
                        if (in_array($zoombie, $cluster)) {
                            $clusterId = $id;
                            break;
                        }
                    }

                    $clusters[$clusterId][] = $i;
                }
            }

            $hasCluster = false;
            foreach ($clusters as $id => $cluster) {
                if ($id == $zoombie || in_array($zoombie, $cluster)) {
                    $hasCluster = true;
                    break;
                }
            }

            if (!$hasCluster) {
                $clusters[$zoombie] = [];
            }
        }

        $output->writeln("Result: " . count($clusters));
    }
}