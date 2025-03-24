# API REST - Gestión de Recursos Humanos

Sistema de gestión de recursos humanos que permite administrar usuarios, nóminas, capacitaciones y reclutamiento.

## Tecnologías Utilizadas

- PHP 7.4+
- Oracle Database
- Apache Server
- Composer (para dependencias)

## Requisitos

- PHP >= 7.4
- Oracle Database
- Apache con mod_rewrite habilitado
- Extensión OCI8 para PHP
- Composer

## Instalación

1. Clonar el repositorio:
```bash
git clone <URL_DEL_REPOSITORIO>
cd proyecto_api
```

2. Instalar dependencias:
```bash
composer install
```

3. Configurar la base de datos:
   - Editar `api/config/database.php` con tus credenciales de Oracle
   - Importar los scripts SQL en el siguiente orden:
     - sql/crear_bd.sql
     - sql/insertar_datos.sql

4. Configurar el servidor web:
   - Asegurarse que mod_rewrite está habilitado
   - Configurar el DocumentRoot al directorio del proyecto

## Estructura del Proyecto

```
proyecto_api/
├── api/                 # Carpeta principal de la API
│   ├── config/         # Configuración
│   ├── models/         # Modelos de datos
│   ├── helpers/        # Funciones auxiliares
│   └── index.php       # Punto de entrada de la API
├── docs/               # Documentación
├── sql/               # Scripts SQL
└── index.html         # Interfaz web simple
```

## Documentación

La documentación completa de la API se encuentra en la carpeta `docs/`.

## Endpoints Disponibles

- GET /api/usuarios - Lista todos los usuarios
- GET /api/nomina - Lista todos los registros de nómina
- GET /api/capacitacion - Lista todos los registros de capacitación
- GET /api/reclutamiento - Lista todos los registros de reclutamiento

## Pruebas

Puedes probar la API usando:

1. La interfaz web incluida (index.html)
2. Postman o cualquier cliente REST
3. cURL desde la línea de comandos

## Seguridad

- Uso de prepared statements para prevenir SQL injection
- Validación y sanitización de datos de entrada
- Manejo de errores consistente

## Autor

Emilio Tijerina

## Licencia

Este proyecto está bajo la Licencia MIT.

## Estructura de la base de datos

La base de datos consta de cuatro tablas principales:

1. usuario
   - ID (PK)
   - nombre
   - edad
   - puesto
   - horastrabajadas

2. nomina
   - salarioporhora
   - pagototal
   - usuario_ID (FK)
   - usuario_nombre (FK)
   - usuario_horastrabajadas (FK)

3. capacitacion
   - curso
   - usuario_ID (FK)
   - usuario_nombre (FK)
   - usuario_horastrabajadas (FK)

4. reclutamiento
   - salarioporhora
   - usuario_ID (FK)
   - usuario_nombre (FK)
   - usuario_horastrabajadas (FK)

## Ejemplos de uso

```bash
# Obtener todos los usuarios
curl http://localhost/proyecto_api/api/usuarios

# Obtener todos los registros de nómina
curl http://localhost/proyecto_api/api/nomina

# Obtener todos los registros de capacitación
curl http://localhost/proyecto_api/api/capacitacion

# Obtener todos los registros de reclutamiento
curl http://localhost/proyecto_api/api/reclutamiento
```
