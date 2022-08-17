<?php

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

//Usamos vendor para el PHP
require_once('vendor/autoload.php');

//Definimos el host de selenium
$host = 'http://localhost:4444/';

//Entramos en chrome
$capabilities = DesiredCapabilities::chrome();

// Se empieza a auto controlar la página
$driver = RemoteWebDriver::create($host, $capabilities);
$driver->manage()->window()->maximize();

// entramos a la pagina donde vamos hacer las pruebas en OrangeHRM
// open | https://opensource-demo.orangehrmlive.com/index.php/leave/viewHolidayList | 
$driver->get("https://opensource-demo.orangehrmlive.com/index.php/leave/viewHolidayList");
// click | id=txtUsername | 
$driver->findElement(WebDriverBy::id("txtUsername"))->click();
// type | id=txtUsername | admin
sleep(1);
$driver->findElement(WebDriverBy::id("txtUsername"))->sendKeys("admin");
// type | id=txtPassword | admin123
sleep(1);
$driver->findElement(WebDriverBy::id("txtPassword"))->sendKeys("admin123");
// submit | id=frmLogin | 
sleep(1);
$driver->findElement(WebDriverBy::id("frmLogin"))->submit();
// click | id=btnAdd | 
sleep(1);
$driver->findElement(WebDriverBy::id("btnAdd"))->click();
// click | id=holiday_description | 
$driver->findElement(WebDriverBy::id("holiday_description"))->click();
sleep(1);
// type | id=holiday_description | Anexion
$driver->findElement(WebDriverBy::id("holiday_description"))->sendKeys("Anexion");
sleep(1);
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='Add Holiday'])[1]/following::ol[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='Add Holiday'])[1]/following::ol[1]"))->click();
sleep(1);
// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='*'])[2]/following::img[1] | 
$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='*'])[2]/following::img[1]"))->click();
sleep(1);
// click | link=25 | 
$driver->findElement(WebDriverBy::linkText("25"))->click();
sleep(1);
// click | id=holiday_recurring | 
$driver->findElement(WebDriverBy::id("holiday_recurring"))->click();
sleep(1);
// click | id=holiday_length | 
$driver->findElement(WebDriverBy::id("holiday_length"))->click();
sleep(1);
// click | id=saveBtn | 
$driver->findElement(WebDriverBy::id("saveBtn"))->click();
sleep(1);
// click | link=Anexion | 
$driver->findElement(WebDriverBy::linkText("Anexion"))->click();
sleep(1);
// click | id=holiday_description | 
$driver->findElement(WebDriverBy::id("holiday_description"))->click();
sleep(1);
// type | id=holiday_description | Anexion Guanacaste
$driver->findElement(WebDriverBy::id("holiday_description"))->clear();
sleep(1);
$driver->findElement(WebDriverBy::id("holiday_description"))->sendKeys("Anexion Guanacaste");
sleep(1);
// click | id=saveBtn | 
$driver->findElement(WebDriverBy::id("saveBtn"))->click();
sleep(1);
// click | id=ohrmList_chkSelectRecord_27 | 
$driver->findElement(WebDriverBy::id("ohrmList_chkSelectRecord_11"))->click();
sleep(1);
// click | id=btnDelete | 
$driver->findElement(WebDriverBy::id("btnDelete"))->click();
sleep(1);
// click | id=dialogDeleteBtn | 
$driver->findElement(WebDriverBy::id("dialogDeleteBtn"))->click();
sleep(1);


// add new cookie
$cookie = new Cookie('cookie_set_by_selenium', 'cookie_value');
$driver->manage()->addCookie($cookie);

// dump current cookies to output
$cookies = $driver->manage()->getCookies();
//print_r($cookies);

// terminate the session and close the browser
$driver->quit();