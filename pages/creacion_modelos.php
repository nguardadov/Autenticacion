<?php include('../layouts/link.php');?>
    <div class="container mt-5">
        <h2>Creaci&oacute;n de modelos</h2>
        <p>
            <ol>
                <li>Crear la carpeta
                    <code>models</code>.</li>
                <li>Crearemos el archivo
                    <code>users.js</code>.</li>
                <li>
                    En nuestro archivo requeriremos las siguientes librerias:
                    <pre>
                       <code class="js">
                            const mongoose = require('mongoose'); //Para manipular conexi&oacute;n y el manejo de la base de datos
                            const bcrypt = require('bcrypt'); // Para encriptar contrase&ntilde;as
                       </code>
                   </pre>
                </li>
                <li>
                    Despues de requerir las librerias, crearemos el esquema del documento
                    <code>users</code>, el cual tendra la siguiente estructura:
                    <pre>
                        <code class="js">
                            const { Schema } = mongoose; //Objeto Schema para realizar diferentes operaciones
                            const UserSchema = new Schema({
                                //atributos con sus validaciones
                                email: {type:String, required:true, unique:true}, 
                                password: {type:String, required:true}
                            });
                        </code>
                    </pre>
                    <p>
                        <ul>
                            <li>
                                type: Indicamos el tipo para el atributo.
                            </li>
                            <li>
                                required: Indicamos que el campo sera requerido.
                            </li>
                            <li>
                                unique: El campo sera unico.
                            </li>
                        </ul>
                    </p>
                </li>
                <li>
                    <p>
                        Siguiendo el archivo
                        <code>users.js</code> crearemos los m&eacute;todos para autenticar las credenciales que nos
                        enviaran, para esta guia haremos
                        uso de las credenciales
                        <code>email</code> y
                        <code>password</code>
                    </p>
                    <p>
                        <pre>
                        <code>
                            UserSchema.statics.authenticate = function (email, password, callback) {
                                User.findOne({ email: email })
                                    .exec(function (err, user) {
                                        if (err) {
                                            return callback(err)
                                        } else if (!user) {
                                            var err = new Error('User not found.');
                                            err.status = 401;
                                         return callback(err);
                                        }
                                            bcrypt.compare(password, user.password, function (err, result) {
                                                if (result === true) {
                                                    return callback(null, user);
                                                } else {
                                                    return callback(new Error('User or Password are wrong'));
                                                }
                                            })
                                        });
                                }
                        </code>
                    </pre>
                    </p>
                </li>
                <li>
                    <p>Crearemos el metodo para encriptar las contrase&ntilde;a.</p>
                    <pre>
                      <code class="js">
                            UserSchema.pre('save', function (next) {
                                var user = this;
                                bcrypt.hash(user.password, 10, function (err, hash) {
                                  if (err) {
                                    return next(err);
                                  }
                                  user.password = hash;
                                  next();
                                })
                              });
                            let User = mongoose.model('users', UserSchema);
                      </code>
                  </pre>
                </li>
                <li>
                    <p>Exportaremos el esquema para que este sea accesible por toda la aplicaci&oacute;n</p>
                    <pre>
                        <code class="js">
                            module.exports = User;
                        </code>
                    </pre>
                </li>
            </ol>
        </p>
        <?php include('../layouts/boton_inicio.php');?> 
    </div>
    <?php include('../layouts/scripts.php');?>  