# CodeNode – Semana 4 WordPress REST API

## Descripción

En esta práctica se desarrolló un plugin personalizado de WordPress para registrar un **Custom Post Type (CPT)** llamado `proyecto`, añadir un **campo personalizado con ACF** y consumir los datos desde el frontend utilizando la **REST API de WordPress** mediante JavaScript `fetch()`.

El objetivo es mostrar contenido dinámico en el frontend a partir de datos almacenados en WordPress y expuestos como JSON.

---

## Objetivos

- Crear un plugin personalizado
- Registrar un Custom Post Type `proyecto`
- Añadir un campo personalizado con ACF (`descripcion_corta`)
- Exponer los datos en la REST API de WordPress
- Consumir los datos desde el frontend con JavaScript `fetch()`
- Mostrar los proyectos en una página mediante shortcode

---

## Tecnologías utilizadas

- WordPress  
- PHP  
- Advanced Custom Fields (ACF)  
- WordPress REST API  
- JavaScript (Fetch API)

---

## Desarrollo

### 1. Creación del plugin

Se creó la carpeta del plugin:


wp-content/plugins/codenode-semana4-proyectos-rest


Dentro se creó el archivo principal:


codenode-semana4-proyectos-rest.php


Este archivo contiene la cabecera del plugin necesaria para que WordPress lo detecte desde el panel de administración.

---

### 2. Registro del Custom Post Type

Se registró el CPT `proyecto` utilizando `register_post_type()` con la opción:


'show_in_rest' => true

![show_rest](capturas/image.png)


Esto permite que los proyectos estén disponibles en la REST API.

![panel_proyectos](capturas/image2.png)

---

### 3. Campo personalizado con ACF

Se creó un campo personalizado con ACF llamado:


descripcion_corta


Este campo permite añadir una breve descripción a cada proyecto.

![campo_acf](capturas/image3.png)

---

### 4. Verificación de la REST API

Los proyectos pueden consultarse en la siguiente ruta:


http://localhost/wordpress/wp-json/wp/v2/proyecto


WordPress devuelve los proyectos en formato JSON a través de la REST API.

![api_json](capturas/image4.png)

---

### 5. Shortcode y página frontend

Se creó el shortcode:


[codenode_proyectos]

![shortcode](capturas/image5.png)

Y se añadió en una página llamada **Proyectos API**, donde los proyectos se muestran dinámicamente usando JavaScript `fetch()`.

![frontend](capturas/image6.png)

---

## Resultado

La página **Proyectos API** muestra los proyectos almacenados en WordPress consumiendo los datos desde la REST API.

---

### Endpoint personalizado (Reto opcional)

Como mejora adicional se implementó un endpoint personalizado en la REST API utilizando register_rest_route().

Ruta creada:

/wp-json/codenode/v1/proyectos

Este endpoint devuelve únicamente los títulos de los proyectos en un array JSON limpio, en lugar de utilizar la respuesta completa de la REST API estándar de WordPress.

Ejemplo de respuesta
[
 "Boda balinesa en jardín privado",
 "Boda ibicenca frente al mar",
 "Boda tradicional en pazo gallego"
]
Estructura del plugin

El plugin se encarga de:

Registrar el Custom Post Type proyecto

Permitir su acceso desde la REST API

Crear un endpoint personalizado

Devolver datos simplificados en formato JSON

### Mejoras adicionales en la web

Durante la práctica también se realizaron mejoras en la coherencia general del sitio Aura Wedding Planner:

Reorganización del menú de navegación

Mejora de la estructura de páginas

Integración de:

servicios

formulario de presupuesto

tienda WooCommerce

formulario de contacto

Ajustes visuales para mantener una línea estética más coherente

## Autor

Jesica Serrano