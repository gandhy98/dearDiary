<!DOCTYPE html>
<html lang="en">
<head>
        
        <!-- header links -->
        <?php
            include_once ("./views/modules/header.html");
        ?>
        
        <title>PRINCIPAL | DIARY</title>
</head>
<body>

    <!-- Footer pages -->
    <?php
        include_once ("./views/pages/nav_principal.html");
    ?>
    <!-- insert notes to dear diary -->

    <section class="container text-white">
        <div class="row g-3">
            <form action="../notas.php" method="post">
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                    <input type="text" 
                        class="form-control" 
                        id="exampleFormControlInput1" 
                        name="titulo"
                        placeholder="INGREAR TITULO" 
                    >

                </div>
                <div class="mb-3 col-3">
                    <label for="exampleFormControlInput1" class="form-label">FECHA</label>
                    <input type="date" 
                        class="form-control" 
                        name="fecha"
                        id="exampleFormControlInput1" 
                    >
                </div>
                <div class="mb-3 col-md-12">
                    <label for="exampleFormControlTextarea1" 
                        class="form-label" 
                        name="descripcion"
                    >
                        DETALLE DE LA NOTA
                    </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

                <div>
                    <input type="submit" value="GUARDAR">
                    <a href="../principal.php">cancelar</a>
                </div>
            </form> 
        </div>

    </section>

    
    <!-- Footer pages -->
    <?php
        //include_once ("./views/pages/footer.html");
    ?>


    <!-- Footer links -->
    <?php
        include_once ("./views/modules/footer.html");
    ?>




</body>
</html>