<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 26/11/14
 * Time: 23:38
 */

namespace Scraper\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Property
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection
     */
    private $rooms;

    /**
     *  Constructor
     */
    public function __construct()
    {
        $this->rooms = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param Room $room
     * @return Property
     */
    public function addRoom(Room $room)
    {
        $room->setProperty($this);
        $this->rooms->add($room);

        return $this;
    }

    /**
     * @param Room $room
     * @return Property
     */
    public function removeRoom(Room $room)
    {
        $this->rooms->remove($room);

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRooms()
    {
        return $this->rooms;
    }
} 