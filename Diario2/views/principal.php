<!DOCTYPE html>
<html lang="en">
<head>
        
        <!-- header links -->
        <?php
            include_once ("./views/modules/headerPrin.html");
        ?>
        
        <title>PRINCIPAL | DIARY</title>
</head>
<body>

    <!-- Footer pages -->
    <?php
        include_once ("./views/pages/nav_principal.html");
    ?>
    <!-- insert notes to dear diary -->
    <main>
        <div>
            <input class="#" onClick="entrarNotas()" type="text" placeholder = "¿tienes algo que contarme?">
        </div>
    </main>

   <!-- Footer links -->
   <?php
        include_once ("./views/modules/footer.html");
    ?> 



</body>
</html>