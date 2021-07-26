<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once("../../modules/session_start.php");?>
    <h1>ESCRIBIR LAS NOTAS</h1>
    <main>
        <div>
            <form action="../notas.php" method="post">
                <div>
                    <input type="text" name="titulo" placeholder="ingresa titulo">
                    <input type="date" name="fecha">
                </div>
                <div>
                    <textarea name="descripcion" rows="5"></textarea>
                </div>
                <div>
                    <input type="submit" value="GUARDAR">
                    <a href="../principal.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>