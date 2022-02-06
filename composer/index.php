<?php
    require_once("../lib/functions.php");
    cabecera("composer","DWES Tarea 3::Composer");
?>
<h1>Composer y JSON</h1>

<h3>¿Qué es Composer y qué no es según ellos?</h3> 

<p>Composer es un gestor de dependencias para PHP. Con él, puedes requerir librerías para proyectos PHP, como MPDF (para generar pdfs mediante código web)
o Laravel, que es un framework del patrón MVC.
</p>
<p>
    <b>No</b> es un gestor de paquetes como APT o YUM, propios de las distribuciones Linux. Sí es verddad que gestiona librerías (o bibliotecas según la traducción) y/o paquetes,
    pero no de manera global, sino que se requieren por separado en cada uno de nuestros proyectos PHP, dentro de una carpeta llamada <em>vendor</em></p>
    <div class="logo">
<figure>
    <img src="img/logo_composer.png" alt="Logotipo de composer"/>
    <figcaption><b>Logotipo de Composer</b></figcaption>
    </figure>
</div>

<h3>¿Con qué archivo configuramos nuestro proyecto en Composer?</h3> 
<p>Nuestro proyecto en Composer se configura con el archivo <b>composer.json</b>, que contendrá los paquetes que vamos a necesitar para nuestro proyecto.</p>

<h3>¿Qué es JSON?</h3>

<p><b>JSON</b> es la abreviatura de <b>J</b>ava<b>S</b>cript <b>O</b>bject <b>N</b>otation. (Notación de Objetos de JavaScript).</p>
<p> Es un formato de estructura de información,
 parecido al XML, pero más moderno, y como su nombre indica sigue el patrón/estructura/sintaxis de los objetos en Javascript. En lugar de ir encerrado entre etiquetas, va encerrado entre llaves.
  Es a la vez la extensión de este tipo de archivos, y es compatible con muchos lenguajes de programación.</p>
  <div class="logo">
<figure>
    <img src="img/json_xml.png" alt="Comparativo XML y JSON"/>
    <figcaption><b>Comparativa entre XML y JSON</b></figcaption>
    </figure>
</div>
  

<h3>¿Cómo instalamos nuestras dependencias en Composer y qué archivo se genera?</h3>
<p>Para instalar nuestras dependencias, debemos crear un archivo llamado <b>composer.json</b> que contendrá la palabra reservada <b>require</b> y dentro contendrá el paquete o dependencia
que queremos instalar y la versión. En el fragmento de código de abajo podemos observar un pequeño ejemplo.</p>

<pre>
{
  "require": {
    "monolog/monolog": "2.0.*"
   }
}
</pre>
   
<p>Una vez tengamos elegidas las dependencias, tenemos que ejecutar el comando:</p>
<code>
    <pre>
php composer.phar <span>install</span>
</pre>
</code>
<p>Tras esto, se nos creará un árbol de directorios con las dependencias solicitadas, además de un archivo <b>composer.lock</b>, que contendrá todas las dependencias que ha tenido que 
instalar el sistema, pues puede haber paquetes requeridos que dependan de otros. Este archivo composer.lock es el que debemos conservar y usar si nos llevamos nuestro proyecto a otro servidor,
pues instalará exactamente las mismas dependencias que nos ha instalado a nosotros. Cuando nos referimos a otro servidor, también podemos referirnos a nuestro repositorio de control de versiones.</p>




<h3>¿Cómo actualizamos nuestras dependencias a sus últimas versiones?</h3> 

<p>Para actualizar nuestras dependencias a la última versión, basta con ejecutar el siguiente comando:
<code>
    <pre>
php composer.phar <span>update</span>
</pre>
</code>

<h3>¿Qué es Packagist y cómo se usa?</h3>

<p>Packagist es el principal repositorio de dependencias para Composer. Su uso es tan sencillo como escrbir en su campo de búsqueda el paquete que queremos usar, nos dirá el código 
    que debemos incluir en nuestro archivo composer.json y lo copias y pegamos. Puedes visitar su sitio web pulsando <a href="https://packagist.org" target="_blank">aquí</a>.

<h3>¿Cómo cargamos (específicamente autoloading) nuestras dependencias en PHP?</h3>
<p>Cuando instalamos nuestras dependencias con el archivo composer.json, se nos crea un fichero llamado <b>autoload.php</b> en la raíz del árbol de directorios generado (vendor/autoload.php).</p>

<p>En el script php que vayamos a usar alguna dependencia, requerimos el archivo autoload.php e instanciamos un objeto de la clase del paquete que queramos usar, como en el siguiente ejemplo</p>

<code>
    <pre>
require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('name');
</pre>
</code>
</body>
<html>