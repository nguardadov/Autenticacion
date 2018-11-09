<?php include('../layouts/link.php');?>
    <div class="container">
        <h2>Creaci&oacute;n de controladores</h2>
        <p>
          <ol>
            <li>Crearemos la carpeta <code>controllers</code></li>
            <li>
                Dentro de la carpeta creada crearemos el archivo <code>UserController.js</code>
            </li>
            <li>
                <p>
                    Requeriremos las siguientes librerias:
                </p>
                <p>
                    <pre>
                        <code class="js">
                            const mongoose = require('mongoose'); //libreria para el manejo a la conexion de bases de datos
                            const User = require("../models/users"); //modelo usuarios.
                            const AuthController = {}; // objeto que tendra la logica de nuestra web
                            const bcrypt = require('bcrypt'); //libreria para encriptar
                        </code>
                    </pre>
                </p>
            </li>
            <li>
            <p>
                Realizaremos un metodo que nos renderizara una vista que contien el formulario para ingresar al sistema
            </p>
               <p>
                <pre>
                    <code class="js">
                        /*nos devuelve la vista signin que es para ingresar al sistema */
                        AuthController.login = function (req, res, next) {
                            res.render('signin')
                        }     
                        </code>
                    </pre>
               </p>
            </li>
          </ol>  
        </p>
    </div>
<?php include('../layouts/scripts.php');?>  
