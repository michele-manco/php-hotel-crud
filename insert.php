<?php


if (
  // faccio tutti i controlli possibili x garantire validità dati
  !empty($_POST) &&
  !empty($_POST['numero_stanza']) &&
  !empty($_POST['piano']) &&
  !empty($_POST['letti']) &&
  is_numeric($_POST['numero_stanza']) &&
  is_numeric($_POST['piano']) &&
  is_numeric($_POST['letti']) &&
  intval($_POST['numero_stanza']) > 0 &&
  intval($_POST['piano']) > 0 &&
  intval($_POST['letti']) > 0
      // !empty($_POST) && parse_room_data($_POST['numero_stanza'],$_POST['piano'],intval($_POST['letti']) )

) {
  // recupero i dati new room
  $numero_stanza = intval($_POST['numero_stanza']);
  $piano = intval($_POST['piano']);
  $letti = intval($_POST['letti']);
  echo 'numero_stanza ' . $numero_stanza . ' - piano ' . $piano . ' - letti ' . $letti ;

  // salvo new room in db


  $sql = "INSERT into stanze (room_number, floor, beds, created_at, updated_at ) VALUES ($numero_stanza, $piano, $letti, NOW(), NOW())";
  // con le doppievirgolette mi legge le variabili anche se nn sono chiuse fra parent.,con gli apici no
  $result = esegui_query($sql);
} else {
  $result = false;
}


include 'layout/header.php'


?>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <h1>Creazione nuova Stanza</h1>
      <?php
        ?>
      </div>
      <div class="col-sm-6 text-right">
          <a id="homecoming"class="btn btn-success" href="index.php">Torna in homepage</a>
      </div>

  </div>
  <div class="row">
    <div class="col-sm-12">

      <?php

      if ($result) {
          ?>
            <h2>Stanza creata con successo!</h2>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Dettagli stanza</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>Numero stanza: <?php echo $numero_stanza; ?></li>
                        <li>Piano: <?php echo
                        $piano; ?></li>
                        <li>Numero letti: <?php echo $letti; ?></li>
                    </ul>
                </div>
            </div>

            <?php
        } else {
            ?>
            <p>Si è verificato un errore</p>
            <?php
        }
        ?>
    </div>
  </div>
</div>
