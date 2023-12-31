<!DOCTYPE html>
<html lang="it">
<head>
    <title>Unitua: Tutti gli insegnamenti</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style2.css">
</head>
<body>
    <?php
        include_once('navbar3.php');
        include_once('../../script/check_login.php');

        echo "<h2 id='scritta_is'>Tutti gli insegnamenti dell'ateneo</h2>";

        include_once('../../script/connection.php');

        $query = "SELECT * FROM unitua.esami_insegnamenti ORDER BY cdl";
        $res = pg_prepare($connection, "", $query);
        $res = pg_execute($connection, "", array());

        while ($row = pg_fetch_assoc($res)) {
            echo "<ul class='list-group' id='centrato'>";
            foreach ($row as $key => $value) {
                switch ($key) {
                    case 'codice_insegnamento':
                        echo "<li class='list-group-item'>";
                        echo strtoupper($key).": ".$value;
                        echo "</li>";
                        break;
                    case 'nome_insegnamento':
                        echo "<li class='list-group-item'>";
                        echo "NOME INSEGNAMENTO: ".$value;
                        echo "</li>";
                        break;
                    case 'anno_insegnamento':
                        echo "<li class='list-group-item'>";
                        echo "ANNO INSEGNAMENTO: ".$value;
                        echo "</li>";
                        break;
                    case 'docente':
                        echo "<li class='list-group-item'>";
                        echo "ID DOCENTE RESPONSABILE: ".$value;
                        echo "</li>";
                        break;
                    case 'codice_esame':
                        echo "<li class='list-group-item'>";
                        echo "CODICE ESAME: ".$value;
                        echo "</li>";
                        break;
                    case 'tipologia':
                        echo "<li class='list-group-item'>";
                        echo strtoupper($key).": ".$value;
                        echo "</li>";
                        break;
                    case 'modalita':
                        echo "<li class='list-group-item'>";
                        echo "DATA IMMATRICOLAZIONE: ".$value;
                        echo "</li>";
                        break;
                    case 'cdl':
                        echo "<li class='list-group-item'>";
                        echo "Codice CdL: ".$value;
                        echo "</li>";
                        break;
                }
            }
            echo "</ul>";
        }
        echo "<br><hr>";
    ?>
</body>
</html>