<?php
require 'vendor/autoload.php';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

$serverUrl = 'http://localhost:4444/wd/hub';



$chromeOptions = new ChromeOptions();
$chromeOptions->addArguments(['window-size=1920x1020']);

$capabilities = DesiredCapabilities::chrome();
$capabilities->setCapability(ChromeOptions::CAPABILITY, $chromeOptions);
$driver = RemoteWebDriver::create($serverUrl, $capabilities);


try {
    $driver->get('https://monkeytype.com/');
    
    $modalSelector = 'div.modal';
    $acceptAllSelector = 'button.active.acceptAll';
    
    $isModalPresent = $driver->findElements(WebDriverBy::cssSelector($modalSelector));
    if (count($isModalPresent) > 0) {
        $driver->wait()->until(
            WebDriverExpectedCondition::elementToBeClickable(
                WebDriverBy::cssSelector($acceptAllSelector)
            )
        );
        $acceptAllButton = $driver->findElement(WebDriverBy::cssSelector($acceptAllSelector));
        $acceptAllButton->click();
    }

     $driver->wait()->until(
        WebDriverExpectedCondition::visibilityOfElementLocated(
            WebDriverBy::cssSelector('div#words')
        )
    );

   $inputField = $driver->findElement(WebDriverBy::cssSelector('input#wordsInput'));
   $wordsContainer = $driver->findElement(WebDriverBy::cssSelector('div#words'));

   $wordElements = $wordsContainer->findElements(WebDriverBy::cssSelector('div.word.active, div.word'));
   foreach ($wordElements as $wordElement) {
       $word = $wordElement->getText();

       $inputField->sendKeys($word . ' ');
       
       usleep(100000); 
   }

   sleep(10);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $driver->quit();
    echo "Chrome Winodw Closed \n";
}
