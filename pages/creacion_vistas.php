<?php include('../layouts/link.php');?>
<div class="container">
    <h2>Creaci&oacute;n de vista</h2>
    <p>
        <ol>
            <li>Nos dirigimos a la carpeta views</li>
            <li>
                Crearemos el archivo <code>index.pug</code> el cual tendra el siguiente contenido.
                <pre>
                    <code class="pug">
                        if !session.user
                            ul
                                li 
                                    a(href="/users/signin") Ingresar
                                li
                                    a(href="/users/signup") Registrate
                        else
                            ul
                                li 
                                    a(href="/users/logout") Salir
                                li
                                    a(href="/users/profile") Perfil
        
                        h1 Bienvenido
                        p Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, debitis.
                        p Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, repellendus.
                        p Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, beatae!
                    </code>
                </pre>
            </li>
            <li>
                creamos el archivo <code>signin.pug</code>, el cual tendra lo siguiente:
                <pre>
                    <code class="pug">
                    h1 Signin
                    a(href="/") Inicio
                    div= err
                    form(method='POST' action='/users/signin')
                        div
                            input(type='email',placeholder='Ingrese su correo' name='email' required value=email?email:'')
                        br
                        div
                            input(type='password', placeholder='*********' name='password')
                        br
                        input(type='submit' value='Entrar')
                    </code>
                </pre>
            </li>
        </ol>
    </p>
</div>
<?php include('../layouts/scripts.php');?> 