<?php include('../layouts/link.php');?>
    <div class="container">
        <h2>Configuraci&oacute;n  para la conexi&oacute;m a mongo db</h2>
        <ol>
            <li>
                Crearemos la carpeta <code>configs</code>
            </li>
            <li>
                Dentro de la carpeta <code>config</code> crearemos el archivo <code>keys.js</code>,
                el cual contendra las credenciales de nuestra base de datos.
                <pre>
                    <code class="js">
                        //credenciales de conexion a la base de datos
                        module.exports = {
                            mongodb:
                            {
                                URI: 'mongodb://localhost:27017/practica' 
                            }
                        }
                    </code>
                </pre>
                <p>
                    URI, contiene la ruta donde esta nuestra base de datos la cual se llama <code>login</code>.
                    Nota: Si la base de datos no existe esta se crea automaticamente. 
                </p>
            </li>
            <li>
                Crearemos el archivo <code>database.js</code>, el cual se encargar de la conexi&oacute;n a la base de datos.
                <pre>
                    <code class="js">
                        const moongose = require('mongoose'); //requerimos la libreria moongose
                        const {mongodb} = require('./keys'); //requerimos el archivo de nuestras crendenciales
                        //el m&eacute;todo <code>connect</code> recibe como parametros la URI de
                        //conexi&oacute;n.
                        moongose.connect(mongodb.URI,{ 
                            useNewUrlParser: true,
                            useCreateIndex: true
                        })
                        .then(db=>console.log('Connection success!!'))
                        .catch(err=>console.error(err));
                    </code>
                </pre>
            </li>
        </ol>
        <?php include('../layouts/boton_inicio.php');?> 
    </div>    
<?php include('layouts/scripts.php');?>