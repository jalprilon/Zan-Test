<form action="<?php print path("agenda/add"); ?>" method="post">
  <fieldset>
    <p>
      <?php print isset($alert) ? $alert : NULL; ?>
    </p>
    <p>
      Nombre: <input type="text" name="name" value="<?php print recoverPOST("name"); ?>" />
    </p>
    <p>
      Email: <input type="text" name="email" value="<?php print recoverPOST("email"); ?>" />
    </p>
    <p>
      Teléfono: <input type="text" name="phone" value="<?php print recoverPOST("phone"); ?>" />
    </p>
    <p>
      <input type="submit" name="add" value="Agregar" />
    </p>
  </fieldset>  
</form>