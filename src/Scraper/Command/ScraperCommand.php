<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 26/11/14
 * Time: 21:18
 */

namespace Scraper\Command;

use Scraper\Crawler\GoutteCrawler;
use Scraper\ScraperService;
use Scraper\Writer\CSVWriter;
use Scraper\Writer\JSONWriter;
use Scraper\Writer\TableWriter;
use Scraper\Writer\XMLWriter;
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
            ->addOption('format', null, InputOption::VALUE_OPTIONAL, 'Set output format. Possible choices are: csv, json, table, xml');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $format = $input->getOption('format');

        if (isset($format) && false === in_array($format, ['csv', 'json', 'xml', 'table'])) {
            throw new \RuntimeException("Format not implemented!");
        }

        $crawler = new GoutteCrawler();

        switch ($format) {
            case 'csv':
                $writer = new CSVWriter($output);
                break;
            case 'json':
                $writer = new JSONWriter($output);
                break;
            case 'xml':
                $writer = new XMLWriter($output);
                break;
            case 'table':
                $writer = new TableWriter($this->getHelper('table'), $output);
                break;
            default:
                $writer = new CSVWriter($output);
                break;
        }

        $scraperService = new ScraperService($crawler, $writer);
        $scraperService->printOutput();
    }
}