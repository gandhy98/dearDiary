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

    <div class="container pt-3">

        <!-- boton notas -->
        <button type="button" class="bton2" data-bs-toggle="modal" 
            data-bs-target="#agregarNota"    
        >
            ¿tienes algo que contarme?
        </button>

        <!-- Modal agregar nota -->
        <?php
            include("./views/components/nota-modal.html");
        ?>

        <!-- todas las notas publicas -->

        <section class="pt-4">

        <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. lorem100</p>
      </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
        <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
        </div>
    </div>
  </div>
</div>


        </section>




    </div>


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