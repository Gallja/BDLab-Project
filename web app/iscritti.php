<!DOCTYPE html>
<html lang="it">
<head>
    <title>Unitua: Gestisci lezioni</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <?php
        include_once('navbar2.php');
        include_once('check_login.php');

        include_once('connection.php');

        $query_ins = "SELECT * FROM unitua.get_insegnamenti($1)";
        $res_ins = pg_prepare($connection, "rep", $query_ins);
        $res_ins = pg_execute($connection, "rep", array($_SESSION['email']));

        while ($row_ins = pg_fetch_assoc($res_ins)) {
            echo "<h2>Iscritti di: ".$row_ins['nome_insegnamento']."<h2>";

            $query_es = "SELECT * FROM unitua.get_es($1)";
            $res_es = pg_prepare($connection, "", $query_es);
            $res_es = pg_execute($connection, "", array($row_ins['codice']));

            echo "<ul class='list-group' id='centrato'>";

            while ($row_es = pg_fetch_assoc($res_es)) {
                $current_year = date('Y');
                $query_app = "SELECT * FROM unitua.get_appello($1, $2)";
                $res_app = pg_prepare($connection, "", $query_app);
                $res_app = pg_execute($connection, "", array($row_ins['id'], $current_year));
                
                while ($row_app = pg_fetch_assoc($res_app)) {
                    //echo "<h1>Appello di:".$row_app['get_appello']."</h1>";
                    $query = "SELECT * FROM unitua.get_iscritti($1, $2)";
                    $res = pg_prepare($connection, "", $query);
                    $res = pg_execute($connection, "", array($row_es['get_es'], $row_app['get_appello']));
                    
                    while ($row = pg_fetch_assoc($res)) {
                        // print_r($row);
                        echo "<li class='list-group-item'>";
                        foreach ($row as $key => $value) {
                            switch ($key) {
                                case 'cognome':
                                    echo $value." ";
                                    break;
                                case 'nome':
                                    $campi_chiave = explode("_", $key);
                                    echo $value." ";
                                    break;
                                case 'matricola':
                                    echo $value." ";
                                    break;
                            }
                        }
                                
                    echo "</li>";
                    }    
                }    
            }
            echo "</ul>";
            echo "<br><br>";
        }
    ?>

    

</body>
</html>