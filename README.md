#🎬 Proyecto_Videoclub_Pablo_Ismael

Proyecto educativo basado en un videoclub. Este proyecto ha contado con el apoyo de inteligencia artificial (IA) para generar explicaciones, resolver dudas técnicas y redactar este README.

##📖 Descripción general

Este proyecto simula el funcionamiento de un videoclub, permitiendo gestionar soportes audiovisuales (como cintas de vídeo, DVDs y videojuegos), clientes y alquileres.

El proyecto se desarrolla de manera incremental, aplicando conceptos de Programación Orientada a Objetos (POO) en PHP, uso de herencia, interfaces, excepciones personalizadas, namespaces, autoloading y control de versiones con Git y GitHub.# Proyecto-VideoClub-Pablo-Ismael

##⚙️ Instalación y configuración
1. Clonar el repositorio
git clone https://github.com/vjp-pabloSM/Proyecto_VideoClub_Pablo_Ismael.git
cd proyecto-videoclub

1. Inicializar el repositorio en local
git init
git add .
git commit -m "Inicializando proyecto Videoclub"

1. Conectar con GitHub
git remote add origin https://github.com/vjp-pabloSM/Proyecto_VideoClub_Pablo_Ismael.git
git push -u origin main

##🧩 Desarrollo incremental

El proyecto se divide en fases de implementación, cada una añadiendo nuevas funcionalidades al sistema.

###1️⃣ Creación de la clase base Soporte

Contiene los datos básicos de un soporte (título, número y precio).

Define una constante estática IVA = 21%.

Métodos:

getPrecio()

getPrecioConIVA()

muestraResumen()

Archivo: app/Soporte.php
Archivo de prueba: test/inicio.php

###2️⃣ Herencia: Soportes específicos

Se crean las siguientes clases que heredan de Soporte:

Clase Atributos adicionales Métodos
CintaVideo duracion muestraResumen()
Dvd idiomas, formatoPantalla muestraResumen()
Juego consola, minNumJugadores, maxNumJugadores muestraJugadoresPosibles(), muestraResumen()

###3️⃣ Clase Cliente

Gestiona la información y los alquileres de un cliente.

Principales métodos:

tieneAlquilado(Soporte $s)

alquilar(Soporte $s)

devolver(int $numSoporte)

listarAlquileres()

Archivo de prueba: test/inicio2.php

###4️⃣ Clase Videoclub

Administra los soportes y los socios.

Atributos principales:

productos: array de soportes disponibles

socios: array de clientes

Métodos:

incluirCintaVideo(), incluirDvd(), incluirJuego()

incluirSocio()

listarProductos()

listarSocios()

alquilaSocioProducto()

devolverSocioProducto()

Archivo de prueba: test/inicio3.php

###5️⃣ Mejoras con abstracción e interfaces

Se convierte Soporte en una clase abstracta.

Se crea la interfaz Resumible con el método obligatorio muestraResumen().

###6️⃣ Versionado con etiquetas

Para seguir el desarrollo incremental, se crean las siguientes etiquetas:

Versión Descripción
v0.329 Versión inicial funcional del videoclub
v0.331 Incorporación de namespaces y autoload
v0.337 Incorporación de excepciones y mejoras en gestión de alquileres

###7️⃣ Namespaces y autoload

Todas las clases se agrupan bajo el espacio de nombres:

namespace PROYECTO_VIDEOCLUB_PABLO_ISMAEL;

Se utiliza un archivo autoload.php para registrar automáticamente las clases mediante spl_autoload_register.

Ejemplo de uso en los tests:

use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Videoclub;
use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Cliente;
use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Dvd;

###8️⃣ Excepciones personalizadas

En el namespace PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Util, se crean excepciones para manejar errores de negocio:

VideoclubException

SoporteYaAlquiladoException

CupoSuperadoException

SoporteNoEncontradoException

ClienteNoEncontradoException

##🧪 Ejecución de pruebas

Ejecuta los scripts de prueba desde el navegador o la línea de comandos:

php test/inicio.php
php test/inicio2.php
php test/inicio3.php

Cada uno mostrará la evolución del proyecto y los resultados esperados de las operaciones.

##🧠 Conceptos aplicados

Programación orientada a objetos

Herencia y polimorfismo

Clases abstractas e interfaces

Namespaces

Encadenamiento de métodos

Manejo de excepciones personalizadas

Gestión de dependencias y autoloading

Control de versiones con Git (tags y commits incrementales)

##👥 Autores

Ismael Gil Jiménez y Pablo Serrano Martin

##🪪 Licencia

Este proyecto se distribuye con fines educativos.
No está destinado a uso comercial.
README generado con ayuda de inteligencia artificial (IA).