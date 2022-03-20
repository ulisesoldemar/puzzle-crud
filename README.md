# CRUD Laravel
## Acerca de
Un CRUD simple de rompecabezas utilizando Laravel 9 y Breeze para la autenticación, Inertia Vue.js 3 y Tailwind.
## Setup
1. Clonar este repositorio y entrar en la carpeta
    ```
   git clone https://github.com/ulisesoldemar/puzzle-crud.git
   cd puzzle-crud
   ```
3. Generar `.env`
   ```
   cp .env.example .env
   ```
4. Instalar las dependencias
   ```
   composer install
   npm install && npm run dev 
   ```
5. Generar referencia al almacenamiento local
   ```
   php artisan storage:link
   ```
6. Ejecutar las migraciones
     ```
   php artisan migrate
   ```
