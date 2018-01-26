<?php
            require_once '../../clases/config/config.php';
            require_once '../../clases/config/Dbmysqli.php';
            //Variables recibidas para el POST.
            //DATOS DE PRENSA
            $p_id_prensa= $_POST['id_prensa'];
            $p_num_prensa= $_POST['num_prensa'];
            $p_desc_prensas= $_POST['desc_prensas'];
            $p_capacidad_Solido= $_POST['capacidad_Solido'];
            $p_capacidad_hueco= $_POST['capacidad_hueco'];
            $p_diametro_prensa = $_POST['diametro_prensa'];
            $p_presion_prensa = $_POST['presion_prensa'];
            $p_long_mesa = $_POST['long_mesa'];
            $p_min_ling_prensa = $_POST['min_ling_prensa'];
            $p_long_max_prensa = $_POST['long_max_prensa'];
            $p_cabezote_prensa =$_POST['cabezote_prensa'];
            $p_mordaza_prensa = $_POST['mordaza_prensa'];
            $p_prensa_id = $_POST['prensa_id'];
            $p_cizalla_id = $_POST['cizalla_id'];
            $p_horno_id=$_POST['horno_id'];
            $p_puller_id= $_POST['puller_id'];
            $p_mesa_enfria_id =$_POST['mesa_enfria_id'];
            $p_temp_sup_prensa =$_POST['temp_sup_prensa'];
            $p_temp_inf_prensa=$_POST['temp_inf_prensa'];
            $p_temp_sup_matriz = $_POST['temp_sup_matriz'];
            $p_temp_inf_matriz =$_POST['temp_inf_matriz'];
            $p_vel_ext_prensa = $_POST['vel_ext_prensa'];
            //Preparando afectación a la BD.
            if ($stmt = $mysqli->prepare("CALL sp_updatePrensaCatSAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))
            {
                //Vinculando parametros a la consultad
                if (!$stmt->bind_param("iisdddddddddiiiiiddddd",$p_id_prensa,$p_num_prensa,$p_desc_prensas, $p_capacidad_Solido, $p_capacidad_hueco, $p_diametro_prensa, $p_presion_prensa,  $p_long_mesa, $p_min_ling_prensa, $p_long_max_prensa,  $p_cabezote_prensa, $p_mordaza_prensa, $p_prensa_id,  $p_cizalla_id,  $p_horno_id, $p_puller_id, $p_mesa_enfria_id, $p_temp_sup_prensa, $p_temp_inf_prensa, $p_temp_sup_matriz, $p_temp_inf_matriz, $p_vel_ext_prensa)) {
                    echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
                }
                // ejecutar la consulta
                if (!$stmt->execute()) {
					echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
					$mysqli->rollback();
					echo "Todas las consultas han sido revertidas";
                }else{
					$mysqli->commit();
					//echo "Consultas ejecutadas correctamente";
                }
                //Obteniendo los resultados de la consulta
                if (!($resultado = $stmt->get_result())) {
					echo "<p>Falló la obtención del conjunto de resultados: (" . $stmt->errno . ") " . $stmt->error;
                }
                //Haciendo uso de los resultados obtenidos
                $resultClientesGrid = array();
                while($rows=$resultado->fetch_assoc()){
                    //array_push($resultClientesGrid, $rows);
                    //$resultClientesGrid[]=array_map('utf8_encode', $rows);
                    $resultClientesGrid = array(
                    'MESSAGE'=> $rows["MESSAGE"]);
                }
                //print_r($resultado);
                echo json_encode($resultClientesGrid);
            }
            else
            {
                echo "<p>Error al preparar consulta: (" . $mysqli->errno . ") " . $mysqli->error;
            }
?>