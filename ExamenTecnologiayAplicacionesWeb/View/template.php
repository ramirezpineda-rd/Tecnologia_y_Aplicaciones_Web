<html>
<head>
    <meta charset="UTF-8"/>
    <title>Examen Parcial Unidad 1</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
    header{
			position:relative;
			margin:auto;
			text-align:center;
			padding:5px;	
            }
            
            nav{
                position:relative;
                margin:auto;
                width:100%;
                height:auto;
                background:black;
            }

            nav ul{
                position:relative;
                margin:auto;
                width:50%;
                text-align: center;
            }

            nav ul li{
                display:inline-block;
                width:24%;
                line-height: 50px;
                list-style: none;
            }

            nav ul li a{
                color:white;
                text-decoration: none;
            }

            section{
                position:relative;
                padding:20px;
            }
    </style>
    
    </head>
    <body>
            
            <header><h1>Bienvenidos al examen parcial de la unidad 1</h1></header>
            <header><h1>LIBROS</h1></header>
                <?php
                //incluir el menú de navegación
                    include "navegacion.php";
                ?>
                <section>
                    <!--Contenedor donde se muestran las opciones del sistema -->
                    <?php
                        //Mostrar opciones
                        $mvc = new MvcController();
                        $mvc -> enlacesPaginasController();
                    ?>
                </section>
                <div class = "fondo"> </div>
    </body>
    
</html>