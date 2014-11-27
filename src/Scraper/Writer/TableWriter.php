<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 08:52
 */

namespace Scraper\Writer;


use Doctrine\Common\Collections\ArrayCollection;
use Scraper\Model\Property;
use Scraper\Model\Room;
use Symfony\Component\Console\Helper\TableHelper;
use Symfony\Component\Console\Output\OutputInterface;

class TableWriter implements WriterInterface
{
    /**
     * @var TableHelper
     */
    private $writer;

    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @param TableHelper $table
     * @param OutputInterface $output
     */
    public function __construct(TableHelper $table, OutputInterface $output)
    {
        $this->writer = $table;
        $this->output = $output;
    }

    /**
     * @param ArrayCollection $data
     */
    public function write(ArrayCollection $data)
    {
        $this->writer->setHeaders(['Property', 'Room type', 'Starting price']);

        $rows = array();
        foreach ($data as $property) {
            /** @var Property $property */
            if ($property->getRooms()->count()) {
                foreach ($property->getRooms() as $room) {
                    /** @var Room $room */
                    $rows[] = array($property->getName(), $room->getRoomType(), $room->getStartingPrice());
                }
            } else {
                $rows[] = array($property->getName(), '', '');
            }
        }

        $this->writer->addRows($rows);
        $this->writer->render($this->output);
    }
}