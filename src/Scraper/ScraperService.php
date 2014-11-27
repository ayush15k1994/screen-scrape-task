<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 08:39
 */

namespace Scraper;


use Scraper\Crawler\CrawlerInterface;
use Scraper\Writer\WriterInterface;

class ScraperService
{
    /**
     * @var CrawlerInterface
     */
    private $crawler;

    /**
     * @var WriterInterface
     */
    private $writer;

    /**
     * @param CrawlerInterface $crawler
     * @param WriterInterface $writer
     */
    public function __construct(CrawlerInterface $crawler, WriterInterface $writer)
    {
        $this->crawler = $crawler;
        $this->writer = $writer;
    }

    /**
     * @return mixed
     */
    public function printOutput()
    {
        $data = $this->crawler->crawl();
        $this->writer->write($data);
    }
} 