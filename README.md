# Bienes Raíces

Proyecto de sitio web para una inmobiliaria, desarrollado con PHP, SASS y JavaScript.

## Requisitos

- PHP 7.4 o superior
- Node.js 14.0 o superior
- MySQL/MariaDB

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/TU_USUARIO/bienesraices.git
cd bienesraices
```

2. Instalar dependencias de Node.js:
```bash
npm install
```

3. Compilar assets (CSS, JS, imágenes):
```bash
# Si tienes gulp instalado globalmente
gulp

# Si no tienes gulp instalado globalmente
npx gulp
```

4. Configurar base de datos:
- Descargar MySQL Workbench
- Importar el archivo `database.sql` en tu servidor MySQL
- Copiar `config.example.php` a `config.php` y configurar credenciales
- Para que funcione todo en la base de datos creada tienes que hacer 3 tablas
    - propiedades: 
        - id int(11) Pk,NN,Ai
        - titulo varchar(45)
        - precio decimal(10)
        - imagen varchar(200)
        - descripcion longtext
        - habitaciones int(1)
        - wc int(1)
        - estacionamientos int(1)
        - creado date
        - vendedores_id int(11) NN
    - usuarios
        - id int(1) PK, NN AI
        - email varchar(50)
        - password char(60)
    - vendedores
        - id int(11) Pk,NN,Ai
        - nombre varchar(45)
        - apellido varchar(45)
        - telefono varchar(10)
- Asegurarse de tener la carpeta de xampp de php en las variables globales
- prender SQl y apache de xampp cuando esten mandando solicitudes
- tener php y gulp prendidos para ver cambios 

5. Configurar servidor web:
- Apuntar el DocumentRoot a la carpeta del proyecto
- Asegurarse que PHP tiene permisos de escritura en la carpeta `/imagenes`

## Desarrollo

Para trabajar en el proyecto:

```bash
# Compilar y observar cambios en SASS/JS
gulp watchArchivos

# O usar el comando por defecto que incluye todas las tareas
gulp
```

## Estructura del Proyecto

- `/src/scss/` - Archivos fuente SASS
- `/src/js/` - JavaScript sin compilar
- `/build/` - Archivos compilados (CSS, JS, imágenes)
- `/includes/` - Archivos PHP reutilizables
- `/admin/` - Panel de administración
- `/imagenes/` - Imágenes subidas por usuarios

## Características

- Diseño responsive
- Panel de administración
- Gestión de propiedades
- Optimización de imágenes
- Dark mode
- Validación de formularios