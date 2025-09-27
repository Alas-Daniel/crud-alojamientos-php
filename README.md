# Sistema CRUD de Alojamientos — LuxeStay

Este repositorio contiene un sistema CRUD de alojamientos con registro e inicio de sesión de usuarios. El siguiente README explica cómo probar la aplicación **en remoto** y **en local (XAMPP)**.

---

## 🚀 Prueba remota

- **URL:** [http://luxestay.infinityfree.me](http://luxestay.infinityfree.me)
- **Credenciales de prueba (Administrador):**
  - Correo: `juan.perez@gmail.com`
  - Contraseña: `juan1234`

La aplicación en remoto ya está desplegada y lista para usarse con las credenciales anteriores.

---

## 💻 Prueba en local (XAMPP)

### ✅ Requisitos mínimos
- XAMPP (Apache + MySQL).
- PHP 7.4+ o 8.x.
- Git (opcional, para clonar el repositorio).

---

### 📂 Pasos para levantar el proyecto localmente

#### 1. Clonar o copiar el repositorio en la carpeta pública de XAMPP (`htdocs`)


---

#### 2. Importar la base de datos

Localiza el archivo `alojamientos.sql` en la raíz del repositorio e importar en xampp

---

#### 3. Configurar la conexión a la base de datos

crear un archivo .env en la raiz del proyecto y colocar los datos segun el entorno local. Ejemplo:

```arduino
DB_HOST=localhost
DB_NAME=alojamientos
DB_USER=root
DB_PASS=2020
DB_CHARSET=utf8mb4

```

---

#### 4. Iniciar Apache y MySQL (XAMPP)

Abrir el panel de XAMPP y arrancar **Apache** y **MySQL**.

---

#### 5. Acceder en el navegador a la URL del proyecto

```arduino
http://localhost/crud-alojamientos-php/
```

(o `http://localhost/<NOMBRE_CARPETA>` si se uso otro nombre).

---

#### 6. Iniciar sesión con los datos de prueba

- Correo: `juan.perez@gmail.com`  
- Contraseña: `juan1234`

---

## 📁 Archivos y rutas importantes

- `alojamientos.sql` — Script para crear la base de datos y datos de prueba.  
- `config/database.php` — Configuración de la base de datos.  
- `app/controllers/` — Controladores.  
- `app/models/` — Modelos.  
- `app/views/` — Vistas (login, register, dashboard).  
- `assets/` — CSS.  

