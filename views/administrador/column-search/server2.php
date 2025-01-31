<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// // DB table to use
// $table = 'usuario';
 
// // Table's primary key
// $primaryKey = 'id';
 
// // Array of database columns which should be read and sent back to DataTables.
// // The `db` parameter represents the column name in the database, while the `dt`
// // parameter represents the DataTables column identifier. In this case simple
// // indexes
// $columns = array(
//     array( 'db' => 'carnet', 'dt' => 0 ),
//     array( 'db' => 'nombre',  'dt' => 1 ),
//     array( 'db' => 'correo',   'dt' => 2 ),
//     array( 'db' => 'telefono', 'dt' => 3),
//     array( 'db' => 'id',     'dt' => 4,'formatter' => function( $d, $row ) {
//             return "<button type='button' class='btn btn-info btn-circle editar btn-sm' id='".$d."' value='Editar'><i class='fas fa-edit'></i></button>
//                 <button type='button' class='btn btn-danger btn-circle eliminar btn-sm' id='".$d."' value='Eliminar'><i class='fas fa-trash'></i></button>";
//         })

   
// );
 
// // SQL server connection information
// $sql_details = array(
//     'user' => 'root',
//     'pass' => '',
//     'db'   => 'bibliotecauae',
//     'host' => 'localhost'
// );
 


$table = 'usuario';

// Table's primary key
$primaryKey = 'id';


$columns = array(
    array( 'db' => '`u`.`carnet`', 'dt' => 0, 'field' => 'carnet' ),
    array( 'db' => '`u`.`nombre`',  'dt' => 1, 'field' => 'nombre' ),
    array( 'db' => '`u`.`apellido`',   'dt' => 2, 'field' => 'apellido' ),
    array( 'db' => '`c`.`nombre`',     'dt' => 3, 'field' => 'nombre' ),

    array( 'db' => '`u`.`id`',     'dt' => 4, 'field' => 'id' ,'formatter' => function( $d, $row ) {
            return "<button type='button' class='btn btn-info btn-circle editar btn-sm' id='".$d."' value='Editar'><i class='fas fa-edit'></i></button>
                <button type='button' class='btn btn-danger btn-circle eliminar btn-sm' id='".$d."' value='Eliminar'><i class='fas fa-trash'></i></button>";
        }),
);

 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'bibliotecauae',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'vendor/DataTables/server-side/scripts/ssp.class.php' );
 
// echo json_encode(
//     // SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
//     SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, $sWhere)
// );

$joinQuery = "FROM `usuario` AS `u` JOIN `carrera` AS `c` ON (`u`.`idCarrera` = `c`.`id`)";
$extraWhere = "`u`.`estado` = 1";
$groupBy = "`u`.`id`";
$having = "";

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);