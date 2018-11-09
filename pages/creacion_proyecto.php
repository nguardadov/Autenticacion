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
        </ol>
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