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
 
// DB table to use
$table = 'inventario';

// Table's primary key
$primaryKey = 'id';

$columns = array(
    array( 'db' => '`iv`.`numeroInventario`', 'dt' => 0, 'field' => 'numeroInventario' ),
    array( 'db' => '`l`.`nombre`',  'dt' => 1, 'field' => 'nombre' ),
    array( 'db' => '`l`.`autor`',   'dt' => 2, 'field' => 'autor' ),
    array( 'db' => '`l`.`idEditorial`',     'dt' => 3, 'field' => 'idEditorial'),
    array( 'db' => '`l`.`idTipoColeccion`',     'dt' => 4, 'field' => 'idTipoColeccion' ),

    array( 'db' => '`l`.`autor`',     'dt' => 5, 'field' => 'autor' )
);

 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
// $columns = array(
//     array( 'db' => 'numeroInventario', 'dt' => 0 ),
//     array( 'db' => 'nombre',  'dt' => 1 ),
//     array( 'db' => 'precio',   'dt' => 2 ),
//     array( 'db' => 'facilitante', 'dt' => 3,),
//     array( 'db' => 'fechaEstado','dt' => 4,
//         'formatter' => function( $d, $row ) {
//             return date( 'd-m-Y', strtotime($d));
//         }
//     )
   
// );


 
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

$joinQuery = "FROM `libro` AS `l` JOIN `inventario` AS `iv` ON (`iv`.`idLibro` = `l`.`id`)";
$extraWhere = "`iv`.`eliminado` = 0";
$groupBy = "`iv`.`id`";
$having = "";

echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);