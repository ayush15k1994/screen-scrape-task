<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 26/11/14
 * Time: 23:30
 */

namespace Scraper\Crawler;

use Doctrine\Common\Collections\ArrayCollection;
use Goutte\Client;
use Scraper\Model\Property;
use Scraper\Model\Room;
use Symfony\Component\DomCrawler\Crawler;

class GoutteCrawler implements CrawlerInterface
{
    /**
     * @return ArrayCollection
     */
    public function crawl()
    {
        $client = new Client();

        $crawler = $client->request('GET', 'http://www.unite-students.com/liverpool');

        $properties = new ArrayCollection();

        $crawler->filter("div.contained-content ul.nav > li > .listing-item__caption a")->each(function ($node) use ($properties, $client) {
            /** @var Crawler $node */
            $crawler = $client->click($node->link());

            $property = new Property();

            $propertyNameNode = $crawler->filter('.main__content.gallery .large-header > span');
            if ($propertyNameNode->count()) {
                $propertyNameNode = $propertyNameNode->text();

                $property->setName(trim($propertyNameNode));
            }

            $crawler->filter("#rooms .rooms__list .rooms__list__menu__item")->each(function ($node) use ($property) {
                $room = new Room();

                $roomType = $node->filter(".rooms__list__menu__link")->text();
                if (preg_match('/\£(\d+(?:\.\d{1,2})?)/', $roomType, $price)) {
                    $room->setStartingPrice($price[1]);
                }
                $roomType = substr($roomType, 0, strpos($roomType, 'From'));
                $room->setRoomType(trim($roomType));
                $property->addRoom($room);
            });

            $properties->add($property);

        });

        return $properties;
    }
} 