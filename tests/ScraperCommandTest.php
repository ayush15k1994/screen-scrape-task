<?php
/**
 * Created by PhpStorm.
 * User: mateuszsojda
 * Date: 27/11/14
 * Time: 16:02
 */

namespace Tests;


use Scraper\Command\ScraperCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ScraperCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $app = new Application();
        $app->add(new ScraperCommand());

        $command = $app->find('scraper:run');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName(), '--format' => 'json'));

        $jsonData = $commandTester->getDisplay();

        $this->assertTrue(is_array(json_decode($jsonData)));
    }
}