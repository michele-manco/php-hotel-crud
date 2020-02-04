<?php


include 'functions.php';
$sql = "SELECT * FROM stanze WHERE id = " .$_GET['id_stanza'];
$result = esegui_query($sql);
include 'layout/header.php'
?>



    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1>Dettaglio Stanza</h1>
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
          if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc(); ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dettagli Stanza numero <?php echo $row['id']; ?></h3>
            </div>
            <div class="panel-body">
            <ul>
              <li>numero stanza: <?php echo $row['room_number']; ?></li>
              <li>piano: <?php echo $row['floor']; ?></li>
              <li>numero letti : <?php echo $row['beds']; ?></li>
              <li>data creaziione : <?php echo $row['created_at']; ?></li>
              <li>data ultima modifica : <?php echo $row['updated_at']; ?></li>
              </ul>
          </div>
          </div>
          <?php
      } elseif ($result) { ?>
          <p>Non ci sono risultati</p>
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

    <?php
    include 'layout/footer.php';
    ?>
