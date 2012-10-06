<?php 
if (is_array($contacts)){
  foreach ($contacts as $contact) {
    ?>
  <div class='contact'>
    <p><strong>Nombre:</strong> <a href="<?php print path("agenda/contact/" . $contact["id_contact"]); ?>"><?php print $contact["name"]; ?></a></p>
    <p><strong>Email:</strong> <?php print $contact["email"]; ?></p>
    <p><strong>Teléfono:</strong> <?php print $contact["phone"]; ?></p>
  </div>
<?php
  }
}
?>