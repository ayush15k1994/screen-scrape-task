<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 09:04
 */

namespace Scraper\Writer;


use Doctrine\Common\Collections\ArrayCollection;
use Scraper\Model\Property;
use Scraper\Model\Room;
use Symfony\Component\Console\Output\OutputInterface;

class CSVWriter implements WriterInterface
{
    /**
     * @var OutputInterface
     */
    private $output;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function write(ArrayCollection $data)
    {
        $handle = fopen('php://temp', 'w');
        fputcsv($handle, array('Property', 'Room type', 'Starting price'));

        foreach ($data as $property) {
            /** @var Property $property */
            if ($property->getRooms()->count()) {
                foreach ($property->getRooms() as $room) {
                    /** @var Room $room */
                    fputcsv($handle, array($property->getName(), $room->getRoomType(), $room->getStartingPrice()));
                }
            } else {
                fputcsv($handle, array($property->getName(), '', ''));
            }
        }

        rewind($handle);
        $csv = stream_get_contents($handle);
        fclose($handle);

        $this->output->writeln($csv);
    }
}