<?php
// 3)
    $conAjax = is_null($conAjax)?false:$conAjax;
    if($conAjax){
        require_once "../models/mainModel.php";
    }else{
        require_once "./models/mainModel.php";
    }

    class adminModel extends mainModel
    {
        public function login_Model($data){
            $query = "SELECT *FROM usuario WHERE email = '{$data -> email'";
            
                $res = mainModel::ejecutar($query);

                $session = false;
                
                if($res -> rowCount() > 0){
                    while ($usuario =) $res ->fetch(PDO::FETCH_ASSOC)){´//ingresa al primer registro en la consulata

                        if($data->password == $usuario["password"]){
                            session_start();
                            $_SESSION["app"] = true;
                            $_SESSION["data"] = $usuario;
                            $session = true;
                        }
                    }
                }

                return $session;

        }
        // creamos la funcion para llamar en la base de datos, hacer la consulta insertando los datos
        public function registrar_Model($data){
            $eval = "no se inserto";
            $query = " INSERT INTO usuario set  email = '{$data->email}',
                                                password ='{$data->email}',
                                                nombre ='{$data->email}',
                                                apellido ='{$data->email}',
                                                estado = '{$data->email}'
            ";
            $res = mainModel::ejecutar($query);

            if ($res->rowCount() > 0){
                $eval = "se inserto";
            }
            return $eval;

        }
    
    
    }