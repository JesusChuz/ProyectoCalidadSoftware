<?php

// An example of using php-webdriver.
// Do not forget to run composer install before. You must also have Selenium server started and listening on port 4444.

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

require_once('vendor/autoload.php');

// This is where Selenium server 2/3 listens by default. For Selenium 4, Chromedriver or Geckodriver, use http://localhost:4444/
$host = 'http://localhost:4444/wd/hub';

$capabilities = DesiredCapabilities::chrome();

$driver = RemoteWebDriver::create($host, $capabilities);

// open | https://opensource-demo.orangehrmlive.com/index.php/auth/login | 
$driver->get("https://opensource-demo.orangehrmlive.com/index.php/auth/login");
// click | id=txtUsername | 
$driver->findElement(WebDriverBy::id("txtUsername"))->click();
// type | id=txtUsername | Admin
$driver->findElement(WebDriverBy::id("txtUsername"))->sendKeys("Admin");
// type | id=txtPassword | admin123
$driver->findElement(WebDriverBy::id("txtPassword"))->sendKeys("admin123");
// click | id=btnLogin | 
$driver->findElement(WebDriverBy::id("btnLogin"))->click();
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='Assign Leave'])[1]/following::b[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='Assign Leave'])[1]/following::b[1]"))->click();
// click | id=viewSubmitted | 
$driver->findElement(WebDriverBy::id("viewSubmitted"))->click();
// click | id=btnApprove | 
$driver->findElement(WebDriverBy::id("btnApprove"))->click();
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='Assign Leave'])[1]/following::b[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='Assign Leave'])[1]/following::b[1]"))->click();
// click | id=viewSubmitted | 
$driver->findElement(WebDriverBy::id("viewSubmitted"))->click();
// click | id=btnReject | 
$driver->findElement(WebDriverBy::id("btnReject"))->click();

$driver->quit();

?>