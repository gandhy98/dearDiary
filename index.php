<? 

//AQUI PONEMOS LAS UNIONES

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEARDIARY</title>
   
   
    <link rel="stylesheet" href="estilo.css">


</head>
<body >
    <div class="portada">
        <!--encavezado-->
        <header>
            <?php include 'partials/navegation.html' ?> 
        </header>
    <!--registrarse y iniciar secion -->
        <div class="contenedor">
            <h1 class="titulo"><span class="text-color">BIENVENIDO</span> A DEAR DIARY</h1>
            <h3 class="frase">has que cada dia valga </h3>

            <div class="content-btns">
                <a href='login/view/login.html' class="btn m-r">iniciar sesion</a>
                <a href='login/view/signup.html' class="btn m-l">registrate</a>
            </div>
        </div>
    </div>
    
    
</body>