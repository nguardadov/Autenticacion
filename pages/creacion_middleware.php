<?php include('../layouts/link.php');?>
   <div class="container">
   <h2>Creaci&oacute;n de Middleware</h2>
    <p>
        <ol>
            <li>Crearemos la carpeta <code>middlewares</code></li>
            <li>
                Dentro de la carpeta creada crearemos el archivo <code>AuthMiddleware</code>
            </li>
            <li>
                Creamos le m&eacute; para comprobar si un usario esta logeado.
                <pre>
                    <code>
                    //middleware que verifica si una persona esta logueada
                    AuthMiddleware.isAuthentication = function (req, res, next) {
                        if(!req.session.user) // verificamos is existe la session
                        {
                            return res.redirect('/'); //redirigimos al index si esto no es posible
                        }
                        //si existe la sesion parsea el contenido
                        data = JSON.parse(req.session.user);
                        User.findOne({ email: data.email })
                            .exec(function (err, user) {
                                if (err) {
                                    return next(err);
                                }
                                else {
                                    if (!user) {
                                        return res.redirect('/');
                                    }
                                    else {
                                        bcrypt.compare(data.userId, user._id.toString(), function (err, result) {
                                            console.log("llego aca", data.userId);
                                            if (result == true) {
                                                return next();
                                            }
                                            else {
                                                return next(err);
                                            }
                                        });
                                    }
                                }
                            });
                    };

                    module.exports = AuthMiddleware;
                    </code>
                </pre>
            </li>
        </ol>
        
    </p>
    <?php include('../layouts/boton_inicio.php');?> 
   </div>
<?php include('../layouts/scripts.php');?> 