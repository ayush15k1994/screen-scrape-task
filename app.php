#!/usr/bin/env php
<?php require_once 'vendor/autoload.php';

$application = new \Symfony\Component\Console\Application();
$application->add(new \Scraper\Command\ScraperCommand());
$application->run();