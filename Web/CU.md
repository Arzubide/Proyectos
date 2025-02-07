# Casos de Uso Usuario

## Descripción General
El sistema maneja la gestión de casilleros (lockers) para estudiantes, incluyendo solicitud, asignación, renovación y administración.

## Actores
- Usuario (Estudiante)
- Administrador

## Casos de Uso Usuario

### 1. Solicitud de Casillero (Flujo Principal)
1. El usuario se registra/inicia sesión
2. Completa formulario con datos personales y académicos
3. El sistema verifica disponibilidad de casilleros
4. Usuario recibe confirmación de solicitud en estado "SOLICITUD"
5. Espera aprobación administrativa

### 2. Renovación de Casillero
1. Usuario inicia sesión
2. Sistema verifica si tiene casillero asignado
3. Usuario solicita renovación 
4. Sistema cambia estado a "RENOVACION"
5. Administrador revisa y aprueba/rechaza
6. Usuario recibe notificación

### 3. Gestión de Acuse
1. Usuario recibe asignación de casillero
2. Descarga formato de acuse
3. Firma y escanea documento
4. Sube acuse al sistema
5. Espera validación administrativa

### 4. Consulta de Estado
1. Usuario inicia sesión
2. Visualiza estado actual de su solicitud/casillero
3. Puede ver historial de uso

## Casos de Uso Administrador

### 1. Gestión de Solicitudes
1. Admin revisa solicitudes pendientes
2. Verifica datos del estudiante
3. Asigna/Rechaza solicitud
4. Sistema notifica al usuario

### 2. Gestión de Casilleros
1. Admin visualiza estado de casilleros
2. Puede marcar como disponible/no disponible
3. Asigna casilleros a usuarios
4. Gestiona renovaciones

### 3. Validación de Acuses
1. Admin revisa acuses subidos
2. Verifica información y firmas
3. Aprueba o rechaza acuse
4. Actualiza estado del casillero

### 4. Reportes
1. Genera reportes de uso
2. Visualiza estadísticas
3. Exporta información

## Reglas de Negocio
1. Solo estudiantes activos pueden solicitar casillero
2. Un estudiante solo puede tener un casillero
3. Renovación sujeta a buen uso previo
4. Acuse obligatorio para activar uso
5. Tiempo límite para subir acuse

## Notas Técnicas
- Implementar sistema de notificaciones por email
- Validar documentos PDF/imágenes para acuses
- Implementar hash para contraseñas (usar algoritmo bcrypt)
- Mantener logs de todas las operaciones
