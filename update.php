<?php

include 'functions.php';
if (
  // faccio tutti i controlli possibili x garantire validità dati
  !empty($_POST) &&
  !empty($_POST['id_stanza']) &&
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
  $id_stanza = intval($_POST['id_stanza']);


  // salvo new room in db


  $sql = "UPDATE stanze SET room_number = $numero_stanza, floor =  $piano, beds = $letti, updated_at = NOW() WHERE id = $id_stanza";
  // con le doppievirgolette mi legge le variabili anche se nn sono chiuse fra parent.,con gli apici no
  $result = esegui_query($sql);
} else {
  $result = false;
}

if ($result) {
  $get_message = '?success=true&id_stanza= ' . $id_stanza;
} else {
  $get_message = '?success=false&id_stanza=' . $id_stanza ;
}

header('Location: edit.php' . $get_message);

include 'layout/header.php'


?>
