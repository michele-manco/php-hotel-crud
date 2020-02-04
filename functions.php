<?php


function connetti_db() {
  include 'db-config.php';

    $conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;
}

function esegui_query($query){
  $conn = connetti_db();

  // Check connection
  if (!$conn || ($conn && $conn->connect_error) ) {
    // se laconn no buon fine da null perchè nn posso recuperare le stanze
    return null;
    if ($conn && $conn->connect_error) {
      echo ("Connection failed: " . $conn->connect_error);

    }
    return;

  }

  $result = $conn->query($query);

  $conn->close();
  return $result;

}


// function recupera_stanze() {
//
//   $sql = "SELECT id, room_number, floor FROM stanze";
//   return esegui_query($sql);
// }

// function recupera_dettagli_stanza($id_stanza) {
//   $conn = connetti_db();
//   if (!$conn || ($conn && $conn->connect_error)) {
//
//   return null;
// } else {
//   echo "id stanza da recuperare: " . $_GET['id'];
// }
//   $sql = "SELECT * FROM stanze WHERE id = " .$id_stanza;
//   $result = $conn->query($sql);
//   $conn->close();
//   return $result;
// }
?>
