# Screen scrape task [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/msojda/screen-scrape-task/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/msojda/screen-scrape-task/?branch=master)

##About
The console command which print out rooms and their starting prices from Liverpool based properties.

**Used components**:

 - [symfony/console](https://github.com/symfony/Console) - Symfony2 Console component because of it's power and simplicity
 - [fabpot/goutte](https://github.com/FriendsOfPHP/Goutte) - Simple well written web crawler
 - [doctrine/common](https://github.com/doctrine/common) - to use **ArrayCollections** instead of PHP built-in arrays, because I prefer object-oriented architecture rather than structures like key-value arrays
 - [jms/serializer](https://github.com/schmittjoh/serializer) - A powerfull library to serializing and unserializing objects to many formats

**Architecture**:

 - **PSR-4** standard used
 - Command supports multiple writers (which implements **WriterInterface**) to easy implement new output writing strategies (for example: writing output to file)
 - It's easy to use another crawler library. It only must implement **CrawlerInterface**

##Installation

Clone repository and get app.php executable:

    git clone https://github.com/msojda/screen-scrape-task.git
    cd screen-scrape-task/
    chmod +x app.php

Get composer:

    curl -sS https://getcomposer.org/installer | php
Run composer install:

    php composer.phar install

##Usage

From the command line:

    ./app.php scraper:run
Command accept **--format** argument which outputs data in specified format:

    ./app.php scraper:run --format="table"
Accepted formats:

 - **csv**: Outputs data in CSV format
 - **json**: Outputs data in JSON format
 - **xml**: Print data in XML format
 - **table**: Print data in friendly well formated table