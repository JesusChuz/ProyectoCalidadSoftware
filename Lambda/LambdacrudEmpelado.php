<?php

//*******************************proyecto documenteacion del software orangeHR*******************************

namespace Facebook\WebDriver;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

//Usamos vendor para el PHP
require_once('vendor/autoload.php');

//Definimos el host de selenium si queremos que el test sea local
/*$host = 'http://localhost:4444/';

//Entramos en chrome
$capabilities = DesiredCapabilities::chrome();

// Se empieza a auto controlar la página
$driver = RemoteWebDriver::create($host, $capabilities);*/
//Definimimos lo siguiente si deseamos que el test corra en la nube
function executeTestCase($caps) {
    $driver = RemoteWebDriver::create(
        "https://j.mendezquesada18:Iw9Aet4iSCG9OnI4MN4pKO5YSHrBCwCnGXiJY9has28VXmzJWq@hub.lambdatest.com/wd/hub",
        $caps
  );

$driver->manage()->window()->maximize();

//--------------------------------------Ingresar a la página Web--------------------------------------------------------------
	// entramos a la pagina donde vamos hacer las pruebas en OrangeHRM
	$driver->get("https://opensource-demo.orangehrmlive.com/index.php/auth/login");
	$driver->wait()->until(
		WebDriverExpectedCondition::urlContains('https://opensource-demo.orangehrmlive.com/index.php/auth/login'));
	// Imprime el URL
	echo "La URL es: '" . $driver->getCurrentURL(). "'<br>";
	// click | xpath=(.//*[normalize-space(text()) and normalize-space(.)='LOGIN Panel'])[1]/following::span[1] | 
	$driver->findElement(WebDriverBy::xpath("(.//*[normalize-space(text()) and normalize-space(.)='LOGIN Panel'])[1]/following::span[1]"))->click();

	// type | id=txtUsername | Admin
	$driver->findElement(WebDriverBy::id("txtUsername"))->sendKeys("Admin");
	// click | id=txtPassword | 
	$driver->findElement(WebDriverBy::id("txtPassword"))->click();
	// type | id=txtPassword | admin123
	$user = $driver->findElement(WebDriverBy::id("txtPassword"))->sendKeys("admin123");
	// click | id=btnLogin | 
	$driver->findElement(WebDriverBy::id("btnLogin"))->click();
//--------------------------------------Agregar un Usuario--------------------------------------------------------------
	// click | id del boton PIM
	$driver->findElement(WebDriverBy::id("menu_pim_viewPimModule"))->click();
	// click | id del boton Lista de empleados, Para ver la lista de empleados actuales
	$driver->findElement(WebDriverBy::id("menu_pim_viewEmployeeList"))->click();
	// click | id del boton Lista de Agregar | Para ingresar un nuevo empleado
	$driver->findElement(WebDriverBy::id("btnAdd"))->click();
	//Esperamos hasta confirmar la url
	$driver->wait()->until(
		WebDriverExpectedCondition::urlContains('https://opensource-demo.orangehrmlive.com/index.php/pim/addEmployee'));
	// Imprime el URL
	echo "La URL es: '" . $driver->getCurrentURL(). "'<br>";
	// type | Nombre del empleado | Sebastian
	$driver->findElement(WebDriverBy::id("firstName"))->sendKeys("Sebastian");
	// type | Segundo nombre del empleado | Asegura
	$driver->findElement(WebDriverBy::id("middleName"))->sendKeys("Asegura");
	// type | Apellido del empleado | Montes
	$driver->findElement(WebDriverBy::id("lastName"))->sendKeys("Montes");
	// click | id=btnSave | Para salvar
	$driver->findElement(WebDriverBy::id("btnSave"))->click();
	echo "La URL es: '" . $driver->getCurrentURL(). "'<br>";
//--------------------------------------Salir de la página Web--------------------------------------------------------------
	// add new cookie
	$cookie = new Cookie('cookie_set_by_selenium', 'cookie_value');
	$driver->manage()->addCookie($cookie);

	// dump current cookies to output
	$cookies = $driver->manage()->getCookies();
	print_r($cookies);

	// terminate the session and close the browser
	$driver->quit();
}

$caps = array(
    array(
        "platform" => "Windows 10",
        "browserName" => "Chrome",
        "version" => "103.0",
        "resolution" => "1920x1080",
        "build" => "Build Simulacion final agregar empleados",
        "name" => "Caso de prueba 2 CRUD empelados"
    )
  );
foreach ( $caps as $cap ) {
    executeTestCase($cap);
}
?>
