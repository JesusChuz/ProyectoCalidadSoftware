<?php

//proyecto documenteacion del software orangeHR

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

//Usamos vendor para el PHP
require_once('vendor/autoload.php');

//Definimos el host de selenium
//$host = 'http://localhost:4444/';

//Entramos en chrome
//$capabilities = DesiredCapabilities::chrome();

// Se empieza a auto controlar la página
//$driver = RemoteWebDriver::create($host, $capabilities);

function executeTestCase($caps) {
    $driver = RemoteWebDriver::create(
        "https://j.mendezquesada18:Iw9Aet4iSCG9OnI4MN4pKO5YSHrBCwCnGXiJY9has28VXmzJWq@hub.lambdatest.com/wd/hub",
        $caps
  );

$driver->manage()->window()->maximize();

// entramos a la pagina donde vamos hacer las pruebas en OrangeHRM
// open | https://opensource-demo.orangehrmlive.com/index.php/leave/viewHolidayList | 
$driver->get("https://opensource-demo.orangehrmlive.com/index.php/leave/viewHolidayList");
// click | id=txtUsername | 
$driver->findElement(WebDriverBy::id("txtUsername"))->click();
// type | id=txtUsername | admin
$driver->findElement(WebDriverBy::id("txtUsername"))->sendKeys("admin");
// type | id=txtPassword | admin123
$driver->findElement(WebDriverBy::id("txtPassword"))->sendKeys("admin123");
// submit | id=frmLogin | 
$driver->findElement(WebDriverBy::id("frmLogin"))->submit();
// click | id=btnAdd | 
$driver->findElement(WebDriverBy::id("btnAdd"))->click();
// click | id=holiday_description | 
$driver->findElement(WebDriverBy::id("holiday_description"))->click();
// type | id=holiday_description | Anexion
$driver->findElement(WebDriverBy::id("holiday_description"))->sendKeys("Anexion");
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='Add Holiday'])[1]/following::ol[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='Add Holiday'])[1]/following::ol[1]"))->click();
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='*'])[2]/following::img[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='*'])[2]/following::img[1]"))->click();
// click | link=25 | 
$driver->findElement(WebDriverBy::linkText("25"))->click();
// click | id=holiday_recurring | 
$driver->findElement(WebDriverBy::id("holiday_recurring"))->click();
// click | id=holiday_length | 
$driver->findElement(WebDriverBy::id("holiday_length"))->click();
// click | id=saveBtn | 
$driver->findElement(WebDriverBy::id("saveBtn"))->click();
// click | link=Anexion | 
$driver->findElement(WebDriverBy::linkText("Anexion"))->click();
// click | id=holiday_description | 
$driver->findElement(WebDriverBy::id("holiday_description"))->click();
// type | id=holiday_description | Anexion Guanacaste
$driver->findElement(WebDriverBy::id("holiday_description"))->clear();
$driver->findElement(WebDriverBy::id("holiday_description"))->sendKeys("Anexion Guanacaste");
// click | id=saveBtn | 
$driver->findElement(WebDriverBy::id("saveBtn"))->click();
// click | id=ohrmList_chkSelectRecord_27 | 
$driver->findElement(WebDriverBy::id("ohrmList_chkSelectRecord_27"))->click();
// click | id=btnDelete | 
$driver->findElement(WebDriverBy::id("btnDelete"))->click();
// click | id=dialogDeleteBtn | 
$driver->findElement(WebDriverBy::id("dialogDeleteBtn"))->click();

// terminate the session and close the browser
$driver->quit();

}

$caps = array(
    array(
        "platform" => "Windows 10",
        "browserName" => "Chrome",
        "version" => "103.0",
        "resolution" => "1920x1080",
        "build" => "TestFeriados Build",
        "name" => "Test Feriados"
    )
  );
foreach ( $caps as $cap ) {
    executeTestCase($cap);
}