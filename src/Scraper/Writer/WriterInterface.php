<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 08:42
 */

namespace Scraper\Writer;

use Doctrine\Common\Collections\ArrayCollection;

interface WriterInterface
{
    public function write(ArrayCollection $data);
}