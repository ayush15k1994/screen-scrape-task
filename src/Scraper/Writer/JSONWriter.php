<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 09:04
 */

namespace Scraper\Writer;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Console\Output\OutputInterface;
use JMS\Serializer\SerializerBuilder;

class JSONWriter implements WriterInterface
{
    /**
     * @var OutputInterface
     */
    private $output;

    private $writer;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
        $this->writer = SerializerBuilder::create()->build();
    }

    public function write(ArrayCollection $data)
    {
        $jsonContent = $this->writer->serialize($data, 'json');
        $this->output->writeln($jsonContent);
    }
}