<!DOCTYPE html>
<html lang="it">
<head>
    <title>Unitua: Modifica esami</title>
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

        if (isset($_SESSION['modifica_es'])) {
            echo "<h2 id='scritta_is'>".$_SESSION['modifica_es']."</h2>";
        } else {
            echo "<h2 id='scritta_is'>Errore nella modifica dell'insegnamento...</h2>";
        }
    ?>

    <h5 id="scritta_is">Torna alla schermata precedente:</h5>
    <br>
    <div id="div_is">
        <a class="btn btn-primary" href="mod_ins.php" role="button">Indietro</a>
    </div>
</body>
</html>