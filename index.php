<?php


include 'functions.php';
$sql = "SELECT id, room_number, floor FROM stanze";
$result = esegui_query($sql);

include 'layout/header.php'
?>



    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1>Le stanze dell' hotel</h1>
        </div>
            <div class="col-sm-6 text-right">
                <a id="creastanza"class="btn btn-success" href="create.php">Crea nuova stanza</a>
            </div>
      </div>
      <?php
       if (!empty($_GET['success'])) {?>
         <div class="row">
           <div class="col-sm-6 col-sm-offset-3"> <?php
           if ($_GET['success'] == 'true') { ?>
             <div class="alert alert-success" role="alert">Stanza eliminata con successo</div>
             <?php
           } else { ?>
             <div class="alert alert-danger" role="alert">Si è verificato un errore.
             </div>
             <?php
           } ?>
         </div>
       </div>
     <?php } ?>
      <div class="row">
        <div class="col-sm-12">
          <div class="table-responsive">
            <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th>Numero stanza</th>
                        <th>Piano</th>
                        <th>Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($result && $result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['room_number']; ?></td>
                          <td><?php echo $row['floor']; ?></td>
                          <td>
                            <a class="btn btn-info" href="details.php?id_stanza=<?php echo $row['id'] ?>">Visualizza</a>
                            <a class="btn btn-warning" href="edit.php?id_stanza=<?php echo $row['id'] ?>">Modifica</a>
                            <a class="btn btn-danger" href="delete.php?id_stanza=<?php echo $row['id'] ?>">Cancella</a>
                            </td>
                      </tr>
                      <?php
                      }
                    } elseif ($result) { ?>
                      <tr>
                        <td colspan="3">Non ci sono risultati</td>
                      </tr>
                      <?php
                      } else {
                        ?>
                        <tr>
                          <td colspan="3">Si è verificato un errore</td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
        </table>
        </div>


        </div>

      </div>

    </div>

<?php
include 'layout/footer.php';
?>
