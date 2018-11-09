<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
    <title>Practica 10</title>
</head>

<body>

    <header class="mt-1">
        <h1 class="text-center">
            Autenticación en
            <code>nodejs</code>.
        </h1>
    </header>

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
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>

</html>