
<?php
include 'functions.php';
$sql = "SELECT * FROM stanze WHERE id = " .$_GET['id_stanza'];
$result = esegui_query($sql);
include 'layout/header.php'


 ?>

 <div class="container">
   <div class="row">
     <div class="col-sm-6">
       <h1>Modifica Stanza</h1>
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


          if (!empty($_GET['success'])) {?>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3"> <?php
              if ($_GET['success'] == 'true') { ?>
                <div class="alert alert-success" role="alert">Stanza modificata con successo</div>
                <?php
              } else { ?>
                <div class="alert alert-danger" role="alert">Si è verificato un errore.
                </div>
                <?php
              } ?>
            </div>
          </div>
        <?php } ?>


         $row = $result->fetch_assoc(); ?>
          <form method="POST" action="update.php">
            <input type="hidden" name="id_stanza" value="<?php echo $row['id']; ?>">
            <div class="form-group">
              <label for="numero Stanza">Numero Stanza</label>
              <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Numero Stanza" value="<?php echo $row['room_number']; ?>">

            </div>
            <div class="form-group">
              <label for="piano">Piano</label>
              <input name="piano" type="text" class="form-control" id="piano" placeholder="Piano" value="<?php echo $row['floor']; ?>">
            </div>
            <div class="form-group">
              <label for="letti">Letti</label>
              <input name="letti" type="text" class="form-control" id="letti"
              placeholder="Piano" value="<?php echo $row['beds']; ?>">
            </div>

            <button type="submit" class="btn btn-success">Modifica stanza</button>
          </form>
          <?php
      } elseif ($result) { ?>
          <p>Stanza non trovata</p>
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
