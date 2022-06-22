# Instalación y configuración de Composer+Chromedriver+Selenium Server+PHP web driver

Los pasos necesarios para poder correr nuestras pruebas automatizadas constan de 7 acciones y un solo requisito obligatorio.

El lenguaje utilizado para estas pruebas sera PHP, ya que el sitio que deseamos analizar esta escrito en este mismo lenguaje.

	
  `GitHub oficial de php-webdriver:`  https://github.com/php-webdriver/php-webdrive
  
  `OrangeHRM opensource-demo:` https://opensource-demo.orangehrmlive.com/index.php/auth/validateCredentials

## Prerequisitos: 
Tener el JDK de Java instalado: https://www.oracle.com/java/technologies/downloads/ 
Tener un servidor local para correr archivos PHP, por ejemplo XAMPP o WAMPP.
Google Chrome es el navegador elejido para estas pruebas.
  
Tomando en cuenta que ya se tiene nuestro servidor de XAMPP funcionando, tenemos claro que para correr archivos y scripts de PHP es necesario hacerlo abriendo la carpeta que contenga los script desde el localhost en alguno de nuestros navegadores.

## Instalaciones y configuraciones necesarias: 

Composer: 
1. Primero es necesario instalar Composer en nuestra máquina, este software lo podemos descarfar desde su página oficial en la sección de descargas. Encuentre el link  a continuación:  https://getcomposer.org/download/
![image](https://user-images.githubusercontent.com/45716413/172532471-eaddeacf-94a8-459b-b543-3a51176ee65f.png)
Continuando con este mismo paso, una vez se descargue el .exe se debe correr el setup de Composer dentro de la localización que prefiera, lo recomendable es que sea en una de las primeras carpetas que se encuentran en la unidad de almacenamiento, por ejemplo: E:\ComposerSetup
  
2. El siguiente paso sería navegar a la ruta donde decidimos hacer la instalación de Composer a traves de una ventana de Command Prompt(cmd) para correr el siguiente comando:
   
    `php composer.phar require php-webdriver/webdriver`
    
Una forma de abrir esta ruta en cmd mas rápidamente es escribiendo "cmd ." y luego presionar enter en la barra que muestra nuestra ruta actual en el File Explorer, por ejemplo:

  ![image](https://user-images.githubusercontent.com/45716413/172533840-d622f72a-24f4-43e5-9c3f-2612aa65cb99.png)

Una vez tenemos nuestra ventana abierta, podemos proceder a digitar el comando previamente mencionado para correr el archivo composer.phar, descargando así los archivos necesarios para usar el php-webdriver.

![image](https://user-images.githubusercontent.com/45716413/172534018-b98c34a8-8056-42b3-bbd3-d68e14c11406.png)

Tras esto, se puede notar que se creo una carpeta bin, dentro de este folder la carpeta vendor fue creada y al mismo nivel de la carpeta, el resto de archivos necesarios. Con esta instalación podemos notar que ahora tenemos localmente los archivos del php web driver que aparecen en el repositorio de GitHub oficial del driver.

Selenium Server (Grid) y Chromedriver:
3. El siguiente requisito es tener un servidor de Selenium corriendo, para esto necesitamos descargar un archivo .jar que ejecutaremos cada vez que queramos hacer pruebas con Selenium Web server. El .jar neceario se puede encontrar acá: https://www.selenium.dev/downloads/
  Descargamos la última versión estable de Selenium Server(Grid).  
  
  ![image](https://user-images.githubusercontent.com/45716413/172534770-78c2fd19-9e35-4ed7-9475-b9afbe5fc091.png)
Elegimos donde deseamos guardar el .jar, importante recordar la ruta para poder encontrarlo fácilmente a futuro.

4. También se necesita un driver más, el cual se llama Chromedriver. Este se puede descargar desde la página oficial: https://chromedriver.chromium.org/downloads
![image](https://user-images.githubusercontent.com/45716413/172535361-8721c0a3-b3c3-4622-a920-acd8c961022d.png)

Seleccione la version que se ajuste a su version de su navegador Chrome actual. Puede comprbar su version abriendo el navegador Chrome -> Configuración -> Información de Chrome. 
Dentro de este mismo paso tenemos que tener en cuenta que tambien se tiene que guardar la ruta donde guardamos el driver como variable de ambiente. Para hacer esto nos dirigimos a las propiedas del equipo:

![image](https://user-images.githubusercontent.com/45716413/172535588-b592983f-a5be-44f8-8297-87d0933d631e.png)
![image](https://user-images.githubusercontent.com/45716413/172535882-d006d38e-d6d5-4173-b41d-395dd67d0f94.png)

Configuraciones de sitema avanzadas a la derecha de la pantalla emergente -> Variables de ambiente -> Una vez se muestre la siguiente ventana, damos click en Variables del Sistema, posteriormente buscamos y editamos la variable "Path" -> finalmente ahora agregamos la ruta donde guardamos el .exe chromewebdriver_win32, por ejemplo: 				
![image](https://user-images.githubusercontent.com/45716413/172536045-c9d436d2-4d64-4574-aa66-793a1377e7d5.png)
![image](https://user-images.githubusercontent.com/45716413/172536082-797b9f6a-3df4-4c52-8869-8011b1f9fd17.png)

5. El penúltimo paso es iniciar el servidor de Selenium, abrimos una ventana de cmd en donde guardamos nuestro .jar previamente y corremos el siguiente comando para iniciar el server.    
Hay que tener en cuenta que es necesario inicar el server cada que querramos hacer pruebas.

El comando sería el siguiente:

`java -jar selenium-server-#.jar standalone`

Se reemplaza el # por la version del jar que se descargo, por ejemplo: java -jar selenium-server-4.2.1.jar standalone.
La respuesta correcta por parte de la consola de cmd debe ser similar a esta:

![image](https://user-images.githubusercontent.com/45716413/172538509-c0de1f32-2cee-48cf-b200-66efaa2f3322.png)


Correr los scripts:

6. Ahora ya podemos abrir archivos de php que corran instrucciones, por ejemplo en el repositorio de GitHub del driver hay un archivo que se llama "example.php", si lo descargamos o creamos uno con ese codigo dentro del folder de htdocs se puede ver como empieza una sesión siguiendo nuestras ordenas para automatizar las pruebas, podemos monitorear si esta corriendo o no en https:/localhost:4444/ cuando el servidor de Selenium esta corriendo. 
Tener en cuenta que ocupamos copiar la carpeta "vendor" que se genero cuando se instalo el phpwebdriver con Composer en la misma ruta de htdocs donde tenemos nuestro script para que se encuentren los archivos necesarios. Por ejemplo:

![image](https://user-images.githubusercontent.com/45716413/172536516-0c9f6ecc-bf37-4d0a-ae00-33c134b439f2.png)

Con todo listo, el último paso es dirigirse al navegador y tratar de abrir los archivos por medio de https:/localhost:#puertoasignadoenXAMPP/


Elaborado por: Grupo3-SC-405-KN-ProyectoCalidadSoftware
