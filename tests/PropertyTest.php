<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 16:14
 */

namespace Tests;


use Scraper\Model\Property;
use Scraper\Model\Room;

class PropertyTest extends \PHPUnit_Framework_TestCase
{
    public function testAddRoom()
    {
        $property = new Property();
        $room = new Room();
        $property->addRoom($room);

        $this->assertTrue($property->getRooms()->contains($room));
    }

    public function testRemoveRoom()
    {
        $property = new Property();
        $room = new Room();
        $property->addRoom($room);

        $this->assertTrue($property->getRooms()->contains($room));

        $property->removeRoom($room);

        $this->assertFalse($property->getRooms()->contains($room));
    }
} 