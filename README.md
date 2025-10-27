<p align="center">
  <img src="https://img.icons8.com/?size=512&id=22813&format=png" alt="Docker Logo" width="90"/>
  <img src="https://img.icons8.com/?size=512&id=20906&format=png" alt="Git Logo" width="90"/>
</p>

<h1 align="center">🌐 TR-Nonprofit · ONG Demo</h1>

<p align="center">
  <strong>Proyecto desarrollado por Tomás Ramírez</strong><br>
  <em>Aplicación web para la gestión de proyectos, donaciones y voluntariado</em><br>
  <strong>PHP · MySQL · Docker · GitHub</strong>
</p>

---

# 🧱 Descripción del proyecto

Proyecto desarrollado para la asignatura **Programación Web II (IACC)**.  
Permite gestionar **proyectos, donantes y donaciones** de una organización sin fines de lucro.  
Integra PHP y MySQL bajo un entorno Docker, con un flujo de trabajo colaborativo basado en Git y GitHub.

---

## 🚀 Instalación y ejecución

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/ramirezdelcampo.tomas2/tr-nonprofit.git
   cd tr-nonprofit
   ```

2. Construir e iniciar los contenedores:
   ```bash
   docker compose up -d --build
   ```

3. Acceder a la aplicación:  
   👉 [http://localhost:8080](http://localhost:8080)

**Base de datos MySQL:**
- Host: localhost  
- Puerto: 3308  
- Usuario: root  
- Contraseña: root  
- Base de datos: ORGANIZACION  

---

## 🧩 Estructura del proyecto

```
tr-nonprofit/
 ┣ docker-compose.yml
 ┣ Dockerfile
 ┣ .gitignore
 ┣ README.md
 ┣ docker/
 ┃ ┣ init.sql
 ┃ ┗ organizacion.sql
 ┣ src/
 ┃ ┣ assets/style.css
 ┃ ┣ partials/
 ┃ ┃ ├ header.php
 ┃ ┃ └ footer.php
 ┃ ┣ bootstrap.php
 ┃ ┣ index.php
 ┃ ┣ project_form.php
 ┃ ┣ donor_form.php
 ┃ ┣ donation_form.php
 ┃ ┗ reports.php
```

---

## 🤝 Flujo de trabajo colaborativo

1. Asegurarse de estar en la rama de desarrollo:
   ```bash
   git checkout dev
   git pull origin dev
   ```

2. Crear una nueva rama desde dev para la funcionalidad asignada:
   ```bash
   git checkout -b feature-nueva-funcionalidad
   ```

3. Guardar cambios:
   ```bash
   git add .
   git commit -m "feat: descripción breve del cambio"
   git push origin feature-nueva-funcionalidad
   ```

4. Crear un Pull Request (PR) desde feature-nueva-funcionalidad hacia dev en GitHub.

5. Usar la pestaña **Issues** para discutir errores o mejoras.

---

## 💡 Buenas prácticas

- Commits pequeños y descriptivos.  
- Pruebas locales antes de fusionar ramas.  
- Revisar y comentar *pull requests*.  
- Mantener documentación actualizada.  

---

## 📚 Créditos y tecnologías

**Autor:** Tomás Ramírez — *IACC, Programación Web II (2025)*  
**Ubicación:** Santiago, Chile

**Tecnologías empleadas:**
- PHP 8.2  
- MySQL 8.0  
- Docker  
- Bootstrap 5.3  
- Git & GitHub  

---

## 📜 Licencia

Proyecto de uso educativo y académico.  
Distribución permitida solo con fines no comerciales.
