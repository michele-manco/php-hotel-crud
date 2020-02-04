pagina creazione id_stanza
<?php
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
   <?php
    if (!empty($_GET['success'])) {?>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-6"> <?php
        if ($_GET['success'] == 'true') { ?>
          <div class="alert alert-success" role="alert">Stanza inserita</div>
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
          <form method="POST" action="insert.php">
            <div class="form-group">
              <label for="numero Stanza">Numero Stanza</label>
              <input name="numero_stanza" type="text" class="form-control" id="numero_stanza" placeholder="Numero Stanza">
            </div>
            <div class="form-group">
              <label for="piano">Piano</label>
              <input name="piano" type="text" class="form-control" id="piano" placeholder="Piano">
            </div>
            <div class="form-group">
              <label for="letti">Letti</label>
              <input name="letti" type="text" class="form-control" id="letti"
              placeholder="Piano">
            </div>

            <button type="submit" class="btn btn-success">Crea stanza</button>
          </form>
     </div>
   </div>
 </div>

 <?php
 include 'layout/footer.php';
 ?>
