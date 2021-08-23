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

    <div class="container pt-3 ">

        <!-- boton notas -->
        <div class="margenes centrar" >
          <button type="button" class="bton2 centro" data-bs-toggle="modal" 
              data-bs-target="#agregarNota"    
          >
              ¿tienes algo que contarme?
          </button>
        </div>
        

        <!-- Modal agregar nota -->
        <?php
            include("./views/components/nota-modal.html");
        ?>

        <!-- todas las notas publicas -->

        <section class="pt-4">

        <div class="row row-cols-1 row-cols-md-2 g-4">

            <?php 

              $resnotas = $obj -> obtenerNotasPublicas_Controller();
              
              // var_dump($resnotas['data'][0]);

              if($resnotas["eval"]){

                $notas = $resnotas['data'];
                foreach ($notas as $nota) {
                  # code...
                  // var_dump($nota);
            ?>

            <div class="col">
              <div class="card">
                <img src="./public/img_note/<?= $nota['url_foto'] ?>" 
                  class="card-img-top " 
                  height="100%"
                  alt="..."
                >
                <div class="card-body">
                  <small class="text-muted"><?= $nota['fecha_publicacion'] ?></small>
                  <h5 class="card-title"><?= $nota['titulo'] ?></h5>
                  <p class="card-text">
                    <?= $nota['contenido'] ?>
                  </p>
                </div>
                  <div class="card-footer">
                    <span>
                      <a href="#" class="">
                        <img src="./views/public/icons/like.png" 
                          width="25px"
                          alt=""
                        >
                      </a>
                        +5
                    </span>

                    <span>
                      <a href="#" 
                        class=""
                        data-bs-toggle="modal" data-bs-target="#coments_diary"
                        onclick="imprimirComentarios(<?= $nota['idnota'] ?>)"
                      >
                        <img src="./views/public/icons/comentario.png" 
                          width="25px"
                          alt=""
                        >
                      </a>  
                    </span>
                  </div>
                </div>

            </div>

            <?php
              } // FIN DEL FOREACH

            }else {

            ?>



            <div class="col">
              <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">INSERTAR TU NUEVA NOTA</h5>
                  <p class="card-text">
                    Pon los detalles de tu nota aqu;i
                  </p>
                </div>
                  <div class="card-footer">
                      <small class="text-muted">...</small>
                  </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Insertar otra nota aquí</h5>
                  <p class="card-text">
                    Dale click al boton de arriba para crear una nueva nota
                  </p>
                </div>
                  <div class="card-footer">
                      <small class="text-muted">...</small>
                  </div>
              </div>
            </div>

            <?php
            
            } //FIN DEL ELSE

            ?>


        </section>




    </div>
      
    <div class="py-4">
    </div>


    <!-- Modales -->
    <?php
        include_once ("./views/components/modal-coments.html");
    ?>

    <!-- Footer pages -->
    <?php
        include_once ("./views/pages/footer.html");
    ?>


    <!-- Footer links -->
    <?php
        include_once ("./views/modules/footer.html");
    ?>




</body>
</html>