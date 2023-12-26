<?php
            $datos[] = array("nombre" => 'jose',
                            "codarea3" =>'RAMIRO',
                            "detarea3" =>'PEDRO',
                            "detcargo3" => 'MARIA',
                            "codsoli3" => 'RITA',
                            "codcargo3" => 'ALONSO');
        //$_SESSION['aarea'] = $datos['codarea3'];
        var_dump($datos);
        print_r($datos);
echo '<br>';
echo $datos[0]['codarea3'];
?>        