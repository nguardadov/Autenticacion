<?php include('../layouts/link.php');?>
    <div class="container">
        <h2>Creaci&oacute;n de rutas</h2>
        <p>
            <ol>
                <li>
                    Nos dirigiremos a la carpeta <code>routes</code>
                </li>
                <li>
                    Abrimos el archivo <code>users.js</code>
                </li>
                <li>
                    Modificaremos el archivo de la siguiente manera:
                </li>
                <li>
                    Requerimos las siguientes librerias
                    <pre>
                        <code class="js">
                            const express = require('express');
                            const router = express.Router();
                            //Requerimos el controlador que hemos creado
                            const AuthController =require("../controllers/UserController");
                            //Requerimos el Middelware que hemos creado
                            const AuthMiddleware = require("../middlewares/AuthMiddleware")
                            //Requerimos el modelo
                            const User = require("../models/users");
                        </code>
                    </pre>
                </li>
                <li>
                    Agregamos las rutas de nuestra de app.
                    <pre>
                        <code class="js">
                            //ruta que nos devolvera el formulario para crear usuarios
                            router.get('/signup',AuthController.create);
                            //ruta que enviara los datos del usuario para almacenarlos en la base de datos
                            router.post('/signup',AuthController.store);
                            //ruta que nos devolvera el formulario para ingresar
                            router.get('/signin',AuthController.login);
                            //ruta que enviara los datos del usuario para ingresar al sistema
                            router.post('/signin',AuthController.signin);
                            //ruta para salir del sistema
                            router.get('/logout',AuthController.logout);
                            /*Middlewar que verifica que solo los usuarios registrados podran ingresar a esta seccion */
                            router.use(AuthMiddleware.isAuthentication);
                            //ruta para acceder al perifl
                            router.get('/profile',AuthController.profile);
                            module.exports = router;
                        </code>
                    </pre>
                </li>
            </ol>
        </p>
    </div>
<?php include('../layouts/scripts.php');?> 