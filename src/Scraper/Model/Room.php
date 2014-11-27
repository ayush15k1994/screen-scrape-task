<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 07:54
 */

namespace Scraper\Model;


class Room
{
    /**
     * @var string
     */
    private $roomType;

    /**
     * @var float
     */
    private $startingPrice;

    /**
     * @var Property
     */
    private $property;

    /**
     * @return Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param Property $property
     */
    public function setProperty(Property $property)
    {
        $this->property = $property;
    }

    /**
     * @return string
     */
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * @param string $roomType
     */
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;
    }

    /**
     * @return float
     */
    public function getStartingPrice()
    {
        return $this->startingPrice;
    }

    /**
     * @param float $startingPrice
     */
    public function setStartingPrice($startingPrice)
    {
        $this->startingPrice = $startingPrice;
    }
}