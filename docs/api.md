# Documentación de la API

## Descripción General
API RESTful para la gestión de recursos humanos, incluyendo usuarios, nómina, capacitación y reclutamiento.

## Endpoints

### Usuarios

#### GET /api/usuarios
Obtiene la lista de todos los usuarios.

**Response 200 (application/json)**
```json
[
  {
    "ID": 1,
    "NOMBRE": "Juan Pérez",
    "EDAD": 30,
    "PUESTO": "Gerente",
    "HORASTRABAJADAS": 40
  }
]
```

### Nómina

#### GET /api/nomina
Obtiene todos los registros de nómina.

**Response 200 (application/json)**
```json
[
  {
    "SALARIOPORHORA": 100,
    "PAGOTOTAL": 4000,
    "USUARIO_ID": 1,
    "USUARIO_NOMBRE": "Juan Pérez",
    "USUARIO_HORASTRABAJADAS": 40
  }
]
```

### Capacitación

#### GET /api/capacitacion
Obtiene todos los registros de capacitación.

**Response 200 (application/json)**
```json
[
  {
    "CURSO": "SQL Avanzado",
    "USUARIO_ID": 1,
    "USUARIO_NOMBRE": "Juan Pérez",
    "USUARIO_HORASTRABAJADAS": 40
  }
]
```

### Reclutamiento

#### GET /api/reclutamiento
Obtiene todos los registros de reclutamiento.

**Response 200 (application/json)**
```json
[
  {
    "SALARIOPORHORA": 90,
    "USUARIO_ID": 1,
    "USUARIO_NOMBRE": "Juan Pérez",
    "USUARIO_HORASTRABAJADAS": 40
  }
]
```

## Códigos de Estado

- 200: Éxito
- 404: Recurso no encontrado
- 500: Error interno del servidor 