# Apirest Macuri

[![N|Solid](http://www.zonadamacuri.com/Assets/img/logos/portabar.png)](https://webmacuri.website/)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://github.com/macu2020)

### Crear un usuario y logearce  Auth - Login
Enviar por post al controlador.
ejemplo :http://localhost/apirestmacuri/authController.php
```sh
POST / auth 
     {
     "usuario":"",  ->REQUERIDO
     "password":"",  ->REQUERIDO
      } 
```

### Crud de pacientes con token
Enviar al controlador.
ejemplo :http://localhost/apirestmacuri/Controllers/pacienteControll.php
Para obtner numero de paginas de pacientes y obtener solo un id
```sh
GET / pacienteControll.php 
     GET /pacienteControll.php?page=$numeroPagina
     GET /pacienteControll.php?id=$idPaciente
```

```sh
POST / pacienteControll.php 
   {
       "nombre" : "",    ->REQUERIDO
       "dni" : "",       ->REQUERIDO
       "correo" : "",    ->REQUERIDO
       "codigoPostal" : "", 
       "genero" : "",
       "telefono" : "", 
       "fechaNacimiento" : "", 
       "token" : "",    ->REQUERIDO
   }
```


```sh
PUT / pacienteControll.php 
   {
       "token" : "",         ->REQUERIDO
       "pacienteId" : "",    ->REQUERIDO
   }
```


```sh
 DELETE / pacienteControll.php 
   {
       "nombre" : "",    
       "dni" : "",       
       "correo" : "",    
       "codigoPostal" : "", 
       "genero" : "",
       "telefono" : "", 
       "fechaNacimiento" : "", 
       "token" : "",         ->REQUERIDO
       "pacienteId" : "",    ->REQUERIDO
   }
```
***
## Autor
* **Jorge Macuri ayra** - *APirestMaci* -[macu2020](https://github.com/macu2020)
***



