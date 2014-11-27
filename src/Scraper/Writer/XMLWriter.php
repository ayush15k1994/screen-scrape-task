<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 09:58
 */

namespace Scraper\Writer;


use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\Console\Output\OutputInterface;

class XMLWriter implements WriterInterface
{
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @var Serializer
     */
    private $writer;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
        $this->writer = SerializerBuilder::create()->build();
    }

    public function write(ArrayCollection $data)
    {
        $xmlContent = $this->writer->serialize($data, 'xml');
        $this->output->writeln($xmlContent);
    }
}