<!DOCTYPE html>
<html lang="en">
<head>
           
        <!-- header links -->
        <?php
            include_once ("./views/modules/header.html");
        ?>
        <title>PERFIL | DIARY</title>
</head>
<body>
    <!-- Footer pages -->
    <?php
        //var_dump($_SESSION['data']['nombre']);
        include_once ("./views/pages/nav_principal.html");

    ?>


    <?php 

        // var_dump($_SESSION["data"]);
        $usuario = $_SESSION["data"];

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

                <input type="file" 
                    name="foto_perfil" 
                    class="img_foto"
                >
                <input type="button" 
                    class="btn btn-secondary my-1" 
                    value="SUBIR FOTO"
                    onclick="subirFotoPerfil()"
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
                        value="<?= $usuario["nombre"] ?>";
                        onchange="updatePerfil_data()"    
                    >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Apellido</label>
                    <input type="text" 
                        class="form-control txt_apellido" 
                        id="exampleFormControlInput1" 
                        placeholder="Ingrese apellido"
                        value="<?= $usuario["apellido"] ?>"
                        onchange="updatePerfil_data()"     
                    >
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Correo Electrónico</label>
                    <input type="email" 
                        class="form-control txt_email" 
                        id="exampleFormControlInput2" 
                        placeholder="Ingrese Email"
                        value="<?= $usuario["email"] ?>"
                        onchange="updatePerfil_data()" 
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
                        onchange="updatePerfil_data()" 
                    >
                </div>
            </div>
        </div>

    </div>

        <!-- boton notas -->
    <div class="margenes centrar ">
        <button type="button" class="bton2 centro" data-bs-toggle="modal" 
                data-bs-target="#agregarNota"    
            >
                ¿tienes algo que contarme?
        </button>

            <!-- Modal agregar nota -->
            <?php
                include("./views/components/nota-modal.html");
            ?>


            <!-- todas las notas publicas -->
            <div class="container pt-3 ">
                <div class="centro">
                    <p>MIS NOTAS PRIVADAS</p>
                </div>
                <section class="pt-4">

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="Miariam Gaby">
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
            </section>
        </div>
    </div>


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