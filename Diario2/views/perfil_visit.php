<!DOCTYPE html>
<html lang="en">
<head>
           
        <!-- header links -->
        <?php
            include_once ("./views/modules/header.html");
        ?>
        <title>PERFIL | DIARY</title>
</head>
<body id="perfil_visit_view">
    <!-- Footer pages -->
    <?php
        //var_dump($_SESSION['data']['nombre']);
        include_once ("./views/pages/nav_principal.html");

    ?>


    <?php 

        // var_dump($_SESSION["data"]);
        $res_usuario = $obj->obtenerPerfilVisita_Controller($_GET['cod']);

        if($res_usuario["eval"]){

        $usuario = $res_usuario["data"];
    ?>


    <div class="container py-3 text-white perfil-cabecera">

        <div class="row">
            <div class="col-md-5 text-center">
                <!-- FOTO PERFIL -->
                <img src="./public/img_perfil/<?=$usuario["url_foto"]?>?<?=time() . "_" . rand(1,100)?>" 
                    class="rounded mx-auto d-block img-fluid mb-2" 
                    alt="..."
                    width="200px"
                    heigth="200px"
                >

            </div>

            <div class="col-md-7">
                <!-- DATOS PERFIL -->
                <div class="mb-3">
                    <label for="exampleFormControlInput0" class="form-label">Nombre</label>
                    <input type="text" 
                        class="form-control txt_nombre" 
                        id="exampleFormControlInput0" 
                        placeholder="Ingrese nombre"
                        value="<?= $usuario["nombre"] ?>"
                        disabled
                    >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                    <input type="text" 
                        class="form-control txt_apellido" 
                        id="exampleFormControlInput1" 
                        placeholder="Ingrese apellido"
                        value="<?= $usuario["apellido"] ?>"
                        disabled
                    >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Correo Electrónico</label>
                    <input type="email" 
                        class="form-control txt_email" 
                        id="exampleFormControlInput2" 
                        placeholder="Ingrese Email"
                        value="<?= $usuario["email"] ?>"
                        disabled
                    >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">
                        Fecha nacimento
                    </label>
                    <input type="date" 
                        class="form-control txt_fechaNacimiento" 
                        id="exampleFormControlInput3" 
                        value="<?= $usuario["fecha_nacimiento"] ?>" 
                        disabled
                    >
                </div>

                <div class="mb-3">
                    <button class="btn btn-sm py-2"
                        onclick="seguirUser(<?=$usuario['idusuario']?>)"
                    >
                        <small class="text_seguir">SEGUIR</small>
                    </button>
                </div>

               
            </div>
        </div>

    </div>

        <!-- boton notas -->
    <div class="margenes  ">
        <!--<button type="button" class="bton2 centro" data-bs-toggle="modal" 
                data-bs-target="#agregarNota"    
            >
                ¿tienes algo que contarme?
        </button>-->
        <h2></h2>

            <!-- Modal agregar nota -->
            <?php
                //include("./views/components/nota-modal.html");
            ?>


            <!-- todas las notas publicas -->
            <div class="container pt-3 ">
                <div class="centro">
                    <p>NOTAS DEL VISITADO</p>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4">

            <?php 

              $resnotas = $obj -> obtenerNotasPublicas_Controller($_GET["cod"], 2, 1);
              
              // var_dump($resnotas['data']);

              if($resnotas["eval"]){

                $notas = $resnotas['data'];
                foreach ($notas as $nota) {
                  # code...
                  // var_dump($nota);
            ?>
            
            <div class="col">
              <div class="card">

                <div class="px-3">
                  <small class="">
                    <img 
                      src="./public/img_perfil/<?= $nota['url_foto_user'] ?>" 
                      height="50px" width="43" 
                      class="rounded-circle"
                      alt=""  >
                    <?= $nota['nombre'] ?> <?= $nota['apellido'] ?>
                  </small>
                  <br>
                  <a href="?app=perfil_visit&cod=<?= $nota['usuario_idusuario'] ?>">ver perfil</a>
                </div>
                
                <img src="./public/img_note/<?= $nota['url_foto'] ?>" 
                  class="card-img-top " 
                  height="100%"
                  alt="..."
                >
                <div class="card-body">
                  <small class="text-muted"><?= $nota['fecha_publicacion'] ?> (<?= $nota['estado']==2?"public":"private" ?>)</small>
                  <h5 class="card-title"><?= $nota['titulo'] ?></h5>
                  <p class="card-text">
                    <?= $nota['contenido'] ?>
                  </p>
                </div>
                  <div class="card-footer">
                    <span>
                      <a href="#odasoda" class="">
                        <img src="./views/public/icons/like.png" 
                          width="25px"
                          alt=""
                          onclick="addLikeNote(<?= $nota['idnota'] ?>)"                          
                        >
                      </a>
                        +<span class="like-<?= $nota['idnota'] ?>"> <?= $nota['cantlike'] ?> </span>
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

    <?php
        }else{
    ?>

        <div class="container">
            <h3>EL USUARIO NO EXISTE</h3>
            <a href="?app=principal">REGRESAR</a>
        </div>

    <?php
        }
    ?>

    <!--Modales comentario-->
    <?php
        include_once ("./views/components/modal-coments.html");
    ?>   
        
    <script>
        // INICIANDO VARIABLES DE LA PÁGINA
        let _iduser=<?=$usuario["idusuario"]?>;
        
    </script>

    <!-- MODALES -->
    <?php
        include("./views/components/preguntas.html");
    ?>


    <!-- Footer links -->
    <?php
        include_once ("./views/modules/footer.html");
    ?>


</body>
</html>