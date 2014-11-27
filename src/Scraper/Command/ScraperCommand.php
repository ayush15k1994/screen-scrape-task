<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 26/11/14
 * Time: 21:18
 */

namespace Scraper\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;

class ScraperCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('scraper:run')
            ->setDescription('Print properties with specified format (default: CSV)')
            ->addOption('format', null, InputOption::VALUE_OPTIONAL, 'Set output format. Possible choices are: csv, json, table');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}