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
                    Para realizar el contralador requeriremos las siguientes librerias:
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
               Realizaremos el m&eacute;todo <code>login</code>, el cual nos renderizara el formulario para ingresar al sistema.
                <pre>
                    <code class="js">
                        /*nos devuelve la vista signin que es para ingresar al sistema */
                        AuthController.login = function (req, res, next) {
                            res.render('signin'); //
                        }     
                        </code>
                        <code>render</code> recibe como parametro el nombre de la vista que renderizara.
                    </pre>
               </p>
            </li>
            <li>
                Crearemos el m&eacute;todo <code>create</code>, este nos renderizara el formulario para registrar a un usuario
                <pre>
                    <code class="js">
                        /*nos devuelve la vista signiup para crear al usuario*/
                        AuthController.create = function (req, res, next) {
                            res.render('signup')
                        }
                    </code>
                </pre>
            </li>
            <li>
            Realizaremos el m&eacute;do <code>store</code> para crear a los usuarios.
            <pre>
                <code class="js">
                    /*Para crear el usuario*/
                        AuthController.store = async function (req, res) {
                            //obteniendo los datos del usuario
                            let user = {
                                email: req.body.email,
                                password: req.body.password
                            }
                            /*alamcenando el usuario*/
                            await User.create(user, (error, user) => { 
                                if (error) // si se produce algun error
                                    //Devolvemos una vista con los mensajes de error
                                    return res.render('signup', { err: error, email: user.email });
                                else {
                                    //Almacenamos los datos de la consulta en el objeto data
                                    let data = {
                                        userId: user._id.toString(),
                                        email: user.email,
                                        password: user.password
                                    }
                                    //hash es el m&eacute; que nos permite encriptar el password
                                    //con 10 le indicamos cuantas veces realizara la encriptaci&oacute;n
                                    bcrypt.hash(data.userId, 10, function (err, hash) {
                                        if (err) { //si produce un error
                                            next(err); // retornaremos el error
                                        }
                                        
                                        data.userId = hash; // almacenamos la password encriptada
                                        //parseamos el objeto json a cadena y lo alamcenamos en la variable session
                                        req.session.user = JSON.stringify(data);
                                        console.log(req.session.user);
                                        //nos dirigira a la pagina donde se encuentra el perfil del usuario
                                        return res.redirect('/users/profile');
                                    });
                                }
                            })

                        };
                </code>
            </pre>
            </li>
          </ol>  
        </p>
    </div>
<?php include('../layouts/scripts.php');?>  
