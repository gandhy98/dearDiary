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