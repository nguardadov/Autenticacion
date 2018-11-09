<?php include('../layouts/link.php');?>
    <div class="container mt-5">
        <h2>Creacion del proyecto</h2>
        <ol>
            <li>
                <p>Instalaremos
                    <code>express-generator</code> de la siguiente manera:</p>
                <p>
                    <code>npm install express-generator -g</code>
                </p>
                <p>
                    Esto nos servira para crear la estructura y configuraci&oacute;n de nuestro proyecto en
                    <code>node</code> con
                    <code>express</code>
                </p>
                <p>
                    Nota: al incluir el atributo
                    <code>-g</code> se instala de forma global, por lo tanto solo uan vez se instalar
                </p>
            </li>
            <li>
               <p>Por medio de la consola nos moveremos al directorio <code>Escritorio</code>.</p>
            </li>
            <li>
               <p>Crearemos nuestro proyecto utilizando el siguiente comando:</p>
               <p><code>express ./login --git --view = pug</code></p>
               <p>
                   <ul>
                       <li>login: nombre del proyecto</li>
                       <li>--git: agregamos .gitignore </li>
                       <li>--view = pug: Inidicamos que el motor de plantillas a usar sera <code>pug</code>.</li>
                   </ul>
               </p>
            </li>
            <li>
                Por medio de la consola nos dirigiremos al proyecto que hemos creado y ejecutaremos el siguiente comando:
                <code>npm install</code>
            </li>
            <li>
                Instalaremos las siguientes librerias:
                <ul>
                    <li><code>mongoose</code>: Nos servira para la creaci&oacute;n de modelos y conexi&oacuten a la base de datos</li>
                    <li><code>connect-mongo</code>: Alamcenar sesiones en la base de datos</li>
                    <li><code>bcrypt</code>: Encriptar contrase&ntilde;as</li>
                    <li><code>express-session</code>: Manejo de sesiones</li>
                </ul>
            </li>
            Haciendo uso del siguiente comando: <code>npm i mongoose mongo-store bcrypt express-session</code>
        </ol>
        <?php include('../layouts/boton_inicio.php');?> 
    </div>
