# Foro de Fórmula 1 🏎️🔥

Este proyecto es una aplicación web tipo foro desarrollada en PHP con arquitectura MVC. Forma parte de la segunda evaluación de la asignatura **Desarrollo de Interfaces** (DAM 2º).

## 🧩 Funcionalidades

- Registro de usuarios con contraseña cifrada
- Inicio de sesión y sistema de sesiones
- Envío de email de bienvenida al registrarse
- Creación de nuevos temas por parte de usuarios logueados
- Visualización de temas con título, descripción, autor y fecha
- Comentarios en cada tema
- Restricción de acciones según login
- Estructura MVC organizada
- Estilo limpio y funcional

## 🛠 Tecnologías utilizadas

- PHP 8
- Apache2 + LAMP en Ubuntu
- MySQL (PhpMyAdmin)
- HTML + CSS
- Git y GitHub

## 📁 Estructura del proyecto

/foro-f1 ├── config/ │ └── database.php ├── controllers/ │ ├── UsuarioController.php │ ├── TemaController.php │ └── ComentarioController.php ├── models/ │ ├── Usuario.php │ ├── Tema.php │ └── Comentario.php ├── views/ │ ├── layout/ │ │ ├── header.php │ │ └── footer.php │ ├── usuario/ │ ├── tema/ ├── index.php └── .htaccess
## 📬 Requisitos

- Tener Apache y PHP configurados correctamente (LAMP)
- Base de datos MySQL creada con el script `foro_f1_tabla.sql`
- Opcional: servidor de correo local configurado para pruebas de `mail()`

## 🚀 Cómo empezar

1. Clona el repositorio:
   ```bash
   git clone git@github.com:TU_USUARIO/foro-f1.git
2. Copia el proyecto en /var/www/html/foro-f1

3. Importa el archivo SQL en PhpMyAdmin (foro_f1_tabla.sql)

4. Abre en navegador:

http://localhost/foro-f1/
