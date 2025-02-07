# Documentación de la Base de Datos

## Descripción General
Este sistema de base de datos está diseñado para gestionar usuarios, administradores, accesos y casilleros (lockers).

## Estructura de Tablas

### Tabla: user
Almacena la información principal de los usuarios del sistema.

**Campos:**
- `userId` (INT): Identificador único del usuario (Llave primaria)
- `nombres` (VARCHAR(45)): Nombres del usuario
- `apellidoP` (VARCHAR(45)): Apellido paterno
- `apellidoM` (VARCHAR(45)): Apellido materno
- `telefono` (VARCHAR(45)): Número telefónico
- `email` (VARCHAR(45)): Correo electrónico
- `boleta` (VARCHAR(45)): Número de boleta/identificación
- `estatura` (INT): Estatura del usuario
- `credencial` (VARCHAR(45)): Número de credencial | url a archivo de credencial
- `horario` (VARCHAR(45)): Horario asignado | url a archivo de horario
- `username` (VARCHAR(45)): Nombre de usuario para acceso al sistema
- `password` (VARCHAR(45)): Contraseña del usuario
- `status` (VARCHAR(45)): Estado de la solicitud del usuario
  - Valores posibles:
    * "solicitado": Usuario ha realizado una solicitud
    * "asignado": Solicitud aprobada y casillero asignado
    * "rechazado": Solicitud rechazada
- `lockerId` (INT): Llave foránea que relaciona con la tabla locker

### Tabla: admin
Gestiona los administradores del sistema.

**Campos:**
- `userId` (INT): Identificador único del administrador (Llave primaria)
- `username` (VARCHAR(45)): Nombre de usuario del administrador
- `password` (VARCHAR(45)): Contraseña del administrador

### Tabla: acuse
Registra los accesos al sistema.

**Campos:**
- `id` (INT): Identificador único del acceso (Llave primaria)
- `username` (VARCHAR(45)): Nombre de usuario que realizó el acceso
- `password` (VARCHAR(45)): Contraseña utilizada en el acceso

### Tabla: locker
Administra la información de los casilleros.

**Campos:**
- `lockerId` (INT): Identificador único del casillero (Llave primaria)
- `numero` (VARCHAR(45)): Número de identificación del casillero
- `fila` (VARCHAR(45)): Ubicación del casillero por fila

## Relaciones

1. **user - locker**: Relación uno a uno
   - Un usuario puede tener asignado un solo casillero
   - Un casillero puede ser asignado a un solo usuario
   - Relación establecida mediante el campo `lockerId` en la tabla user

## Notas Adicionales
- El sistema permite la gestión completa de asignación de casilleros a usuarios
- Los administradores pueden aprobar o rechazar solicitudes de usuarios
- Se mantiene un registro de accesos al sistema mediante la tabla acuse
