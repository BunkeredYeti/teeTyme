<?php
    include 'database.php';
    $sql = "
        CREATE TABLE `tt_rounds` (
            `id`     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `teeDate`   date NOT NULL,
            `teeTime`  time NOT NULL,
            `strokes01` int(11) NOT NULL
        )";
    Database::prepare($sql, array());
    echo "Rounds Table Created";
?>