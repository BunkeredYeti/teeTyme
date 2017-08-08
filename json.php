<?php
  include "crud2/database.php";
  echo json_encode(
    Database::prepare(
      'SELECT * FROM `assignment06`',
       array()
    )->fetchAll(PDO::FETCH_ASSOC)
  );

?>
