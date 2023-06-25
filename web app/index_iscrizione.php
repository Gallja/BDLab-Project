<?php
    session_start();
    if (isset($_POST['codice_appello']) && isset($_POST['codice_docente']) && isset($_POST['codice_esame'])) {
        
        $connection = pg_connect("host=postgres.favo02.dev port=5432 dbname=unitua user=server password=3*2da@ELNj@DFP"); 

        $query1 = "SELECT * FROM unitua.get_matricola($1)";

        $res1 = pg_prepare($connection, "get_all", $query1);
        $res1 = pg_execute($connection, "get_all", array($_SESSION['email']));
        $row1 = pg_fetch_assoc($res1); //Adesso ho la matricola dello studente
        print_r($row1);

        $query2 = "CALL unitua.insert_iscritto($1, $2, $3, $4)";

        $res2 = pg_prepare($connection, "get_all_res", $query2);
        $res2 = pg_execute($connection, "get_all_res", array($_POST['codice_docente'], $row1['get_matricola'], $_POST['codice_esame'], $_POST['codice_appello']));

        $_SESSION['iscrizione'] = "Iscrizione avvenuta con successo!";
        //echo "<p>".$_SESSION['iscrizione']."</p>";
        header('Location: conf_iscrizione.php');
    }
?>