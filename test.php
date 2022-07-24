<?php

// An example of using php-webdriver.
// Do not forget to run composer install before. You must also have Selenium server started and listening on port 4444.

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

// This is where Selenium server 2/3 listens by default. For Selenium 4, Chromedriver or Geckodriver, use http://localhost:4444/
$host = 'http://localhost:4444/wd/hub';

$capabilities = DesiredCapabilities::chrome();

$driver = RemoteWebDriver::create($host, $capabilities);

// navigate to Google
$driver->get('https://www.google.com');
$driver->manage()->window()->maximize();
// open | https://opensource-demo.orangehrmlive.com/index.php/auth/login | 
$driver->get("https://opensource-demo.orangehrmlive.com/index.php/auth/login");
// print title of the current page to output
echo "El titulo del sitio es: '" . $driver->getTitle() . "\n";
// print URL of current page to output
echo "Y su URL es: '" . $driver->getCurrentURL() . "\n";
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='LOGIN Panel'])[1]/following::span[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='LOGIN Panel'])[1]/following::span[1]"))->click();
// type | id=txtUsername | Admin
$driver->findElement(WebDriverBy::id("txtUsername"))->sendKeys("Admin");
// click | id=txtPassword | 
echo "txtUsername found \n";
$driver->findElement(WebDriverBy::id("txtPassword"))->click();
// type | id=txtPassword | admin123
echo "txtPassword found \n";
$driver->findElement(WebDriverBy::id("txtPassword"))->sendKeys("admin123");
// click | id=btnLogin | 
$driver->findElement(WebDriverBy::id("btnLogin"))->click();
echo "btn Login clicked \n";

//end session and close the browser
$driver->quit(); 