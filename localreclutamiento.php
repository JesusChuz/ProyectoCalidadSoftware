<?php

//proyecto documenteacion del software orangeHR

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');
  // This is where Selenium server 2/3 listens by default. For Selenium 4, Chromedriver or Geckodriver, use http://localhost:4444/
$host = 'http://localhost:4444/wd/hub';
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities);


$driver->manage()->window()->maximize();

// entramos a la pagina donde vamos hacer las pruebas en OrangeHRM
 // open | https://opensource-demo.orangehrmlive.com/index.php/auth/validateCredentials | 
$driver->get("https://opensource-demo.orangehrmlive.com/index.php/auth/validateCredentials");
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='LOGIN Panel'])[1]/following::span[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='LOGIN Panel'])[1]/following::span[1]"))->click();
// type | id=txtUsername | Admin
$driver->findElement(WebDriverBy::id("txtUsername"))->sendKeys("Admin");
// click | id=txtPassword | 
$driver->findElement(WebDriverBy::id("txtPassword"))->click();
// type | id=txtPassword | admin123
$driver->findElement(WebDriverBy::id("txtPassword"))->sendKeys("admin123");
// click | id=btnLogin | 
$driver->findElement(WebDriverBy::id("btnLogin"))->click();
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='Projects'])[1]/following::b[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='Projects'])[1]/following::b[1]"))->click();
// click | id=btnAdd | 
$driver->findElement(WebDriverBy::id("btnAdd"))->click();
// click | id=addCandidate_firstName | 
$driver->findElement(WebDriverBy::id("addCandidate_firstName"))->click();
// type | id=addCandidate_firstName | Juan
$driver->findElement(WebDriverBy::id("addCandidate_firstName"))->sendKeys("Juan4");
// click | id=addCandidate_lastName | 
$driver->findElement(WebDriverBy::id("addCandidate_lastName"))->click();
// type | id=addCandidate_lastName | Ramirez
$driver->findElement(WebDriverBy::id("addCandidate_lastName"))->sendKeys("Ramirez4");
// click | id=addCandidate_email | 
$driver->findElement(WebDriverBy::id("addCandidate_email"))->click();
// type | id=addCandidate_email | jramirez@gmail.com
$driver->findElement(WebDriverBy::id("addCandidate_email"))->sendKeys("jramirez@gmail.com");
// click | id=addCandidate_vacancy | 
$driver->findElement(WebDriverBy::id("addCandidate_vacancy"))->click();
// select | id=addCandidate_vacancy | label=Software Engineer
//$driver->findElement(WebDriverBy::id("addCandidate_vacancy"))->selectByVisibleText("Software Engineer");
$selectElement = $driver->findElement(WebDriverBy::id('addCandidate_vacancy'));
$select = new WebDriverSelect($selectElement); 
$selectedOptions = $select->getAllSelectedOptions();
// click | id=btnSave | 
$driver->findElement(WebDriverBy::id("btnSave"))->click();

$driver->get("https://opensource-demo.orangehrmlive.com/index.php/auth/validateCredentials");

$driver->quit();

