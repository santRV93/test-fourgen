# Instalación
- Para instalar todas las dependencias del proyecto lo que hay que ejecutar el comando composer install
- Para ejecutar el proyecto se debe de ingresar el comando php artisan serve

# Endpoints
- Para usar los endpoints es indispensable usar el header accept: application/json

## Users (Registro y login)
- La ruta para registrar usuarios es {{base_url}}/api/auth/register, metodo POST y se deben de ingresar los campos: name, email, password, password_confirmation
- La ruta para hacer login es {{base_url}}/api/auth/login, método POST y se deben ingresar los campos: email, password

## People
- Estos endpoints requiren un authorization tipo Bearer
- La ruta para registrar personas es {{base_url}}/api/people/create, método POST y se deben de ingresar los campos: name, email, birth_date
- La ruta para actualizar personas es {{base_url}}/api/people/{{id}}, metodo POST, recibe como url param el id de la persona que se desea actualizar y se deben de ingresar los campos: name, email, birth_date
- La ruta para borrar personas es {{base_url}}/api/people/{{id}}, método DELETE, recibe como url param el id de la persona que se desea borrar
- La ruta para obtener todas las personas es {{base_url}}/api/people/get, metodo GET
- La ruta para obtener los datos de una persona con sus respectivas mascotas es {{base_url}}/api/people/pets/{{id}}, método GET, recibe como url param el id de la persona

## People
- Estos endpoints requiren un authorization tipo Bearer
- La ruta para registrar mascotas es {{base_url}}/api/pets/create, método POST y se deben de ingresar los campos: name, species, age, breed, person_id
- La ruta para actualizar mascotas es {{base_url}}/api/pets/{{id}}, metodo POST, recibe como url param el id de la mascota que se desea actualizar y se deben de ingresar los campos: name, species, age, breed, person_id
- La ruta para borrar mascotas es {{base_url}}/api/pets/{{id}}, método DELETE, recibe como url param el id de la mascota que se desea borrar
- La ruta para obtener todas las mascotas es {{base_url}}/api/pets/get, metodo GET

# Migraciones
- Para registrar la estructura de las tablas en la base de datos se debe de ejecutar el comando php artisan migrate

# Seeders
- Los seeders generan datos de prueba en la base de datos
- Para ingresar usuarios de prueba se puede ejecutar el comando php artisan db:seed --class=UserSeeder, por defecto el password siempre es abc1234
- Para registrar mascotas de prueba se puede ejecutar el comando php artisan db:seed --class=PetSeeder. Este comando ya crea personas asociadas a las mascotas