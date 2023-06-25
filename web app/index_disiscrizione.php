<?php
    session_start();
    if (isset($_POST['codice_appello']) && isset($_POST['codice_docente']) && isset($_POST['codice_esame']) && isset($_POST['studente'])) {
        $connection = pg_connect("host=postgres.favo02.dev port=5432 dbname=unitua user=server password=3*2da@ELNj@DFP"); 

        $query = "CALL unitua.delete_iscritto($1, $2, $3, $4)";

        $res = pg_prepare($connection, "get_all_esito", $query);
        $res = pg_execute($connection, "get_all_esito", array($_POST['codice_docente'], $_POST['studente'], $_POST['codice_esame'], $_POST['codice_appello']));

        //$affectedRows = pg_affected_rows($res);

        if ($res) {
            $_SESSION['disiscrizione'] = "Disiscrizione all'esame avvenuta con successo!";
            header('Location: conf_dis.php');
        } else {
            $_SESSION['disiscrizione'] = "Errore durante la disiscrizione all'esame!";
            header('Location: conf_dis.php');
        }
    }
?>