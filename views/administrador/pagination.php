<?php 

define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'bibliotecauae');
define('NUM_ITEMS_BY_PAGE', 25);
 
$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
mysqli_set_charset( $connexion, 'utf8');
$result = $connexion->query('SELECT COUNT(*) as total_libros FROM libro WHERE eliminado = 0');

$row = $result->fetch_assoc();
$num_total_rows = $row['total_libros'];


if ($num_total_rows > 0) {
    $num_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
    $result = $connexion->query(
        'SELECT * FROM libro
        WHERE eliminado = 0 
        ORDER BY id DESC 
        LIMIT 0, '.NUM_ITEMS_BY_PAGE
    );
    if ($result->num_rows > 0) {
        echo '<tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['nombre'].'</td>';
            echo '<td>'.$row['autor'].'</td>';
            echo '<td>'.$row['idEditorial'].'</td>';
     
 
        }
        echo '<tr>';
    }
 
    if ($num_pages > 1) {
        echo '<div class="row">';
        echo '<div class="col-lg-12">';
        echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination justify-content-end">';
 
        for ($i=1;$i<=$num_pages;$i++) {
            $class_active = '';
            if ($i == 1) {
                $class_active = 'active';
            }
            echo '<li class="page-item '.$class_active.'"><a class="page-link" href="#" data="'.$i.'">'.$i.'</a></li>';
        }
 
        echo '</ul>';
        echo '</nav>';
        echo '</div>';
        echo '</div>';
    }
}

 ?>