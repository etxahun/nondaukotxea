<?php

/** Deshabilitamos el Error Reporting **/
error_reporting( 0 );

/** Comprobamos qué "action" almacenaremos mediante GET */
if( isset($_POST["action"]) ) {
    $action = $_POST["action"];
}
else {
    $action = "get";
}

/** Comprobamos qué "id" almacenaremos mediante GET */
if( isset($_POST["id"]) ) {
    $id = $_POST["id"];
}
else {
    $id = 0;
}

/** Comprobamos qué "user_id" almacenaremos mediante GET */
if( isset($_POST["user_id"]) ) {
    $user_id = $_POST["user_id"];
}
else {
    $user_id = 0;
}


/** Comprobamos qué "latitude" almacenaremos mediante GET*/
if( isset($_POST["poslat"]) ) {
    $latitude = $_POST["poslat"];
}
else {
    $latitude="";
}

/** Comprobamos qué "longitude"  almacenaremos mediante GET*/
if( isset($_POST["poslong"]) ) {
    $longitude = $_POST["poslong"];
}
else {
    $longitude="";
}

/**************************/

/* Activamos el debugging */
if( $debug=="1" ) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}
/**************************/

/** Por defecto, en caso de no especificar el "action", el valor es "get" */
if( $action=="" ) {
    $action="get";
}

/** CONEXIÓN CON MySQL **/
/*  ==================  */

$host="localhost";
$username="kakafu";
$password="kakafu";
$database="geonundagokotxea";

/** Connectamos con la base de datos **/
$mysqli=new mysqli($host,$username,$password,$database);
$mysqli->set_charset('utf8');

/*********************************************************/

/** Comprobamos que "action" llevaremos a cabo */
switch( $action ) {

    /** En el caso de que queramos obtener los "locations" de la base de datos */
    case "get":

        $res_locations = $mysqli->query("SELECT * FROM kokalekua" );

        $locations_arr = array();

        while($r = mysqli_fetch_assoc($res_locations)) {
            $locations_arr[] = $r;
        }

        echo json_encode($locations_arr);
        break;

    /** En el caso de que queramos añadir una nueva "location" */
    case "add":

        if( $latitude=="" ) {
            echo "ERROR_WRONG_LATITUDE";
        }
        else if ( $longitude=="" ) {
            echo "ERROR_WRONG_LONGITUDE";
        }   
        else {
            //Primero borramos los valores que haya anteriores:
            $q_1 = "DELETE FROM kokalekua";
            $q_2 = "INSERT INTO kokalekua (user_id,latitude,longitude) VALUES (".$user_id.",'".$latitude."','".$longitude."')";
            
            if( $debug=="1" ) {
                echo "[DEBUG] Query #1: $q_1 <br />";
                echo "[DEBUG] Query #2: $q_2 <br />";
            }

            $res_del = $mysqli->query( $q_1 );
            $res_add = $mysqli->query( $q_2 );

            if ( !$res_del ) {
                echo "ERROR_FAILED_DEL_OPERATION";          
            }
            else if( !$res_add ) {
                echo "ERROR_FAILED_ADD_OPERATION";
            }
            else {
                //echo true;
                echo "NO_ERROR";
            } //fin del else
        }
        break;

    /** En el caso de que queramos borrar una "location" */
    case "del":

        if( $id=="" ) {
            echo "ERROR_WRONG_LOCATION_ID";
        }
        else {
            $q = "DELETE FROM kokalekua";
            $res_name = $mysqli->query( $q );

            if( !$res_name ) {
                echo "ERROR_FAILED_DEL_OPERATION";
            }
            else {
                 //echo "NO_ERROR";

                $res_locations = $mysqli->query("SELECT * FROM location" );
                $locations_arr = array();
                while($r = mysqli_fetch_assoc($res_locations)) 
                    {
                     $locations_arr[] = $r;
                    }
                echo json_encode($locations_arr);
            }
        }
        break;

    default:
        echo "ERROR_NO_ACTION";
        break;
}

$mysqli->close();
?>