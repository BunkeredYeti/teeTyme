<?php
    include 'database.php';
    $sql = "
        CREATE TABLE `tt_courses` (
            `id`     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name`   VARCHAR(100) NOT NULL,
            `email`  VARCHAR(100) NOT NULL,
            `phone` VARCHAR(100) NOT NULL,
			`description` VARCHAR(1024),
			`address` VARCHAR (255),
			`city` VARCHAR (255),
			`state` VARCHAR (2),
			`zip` VARCHAR (10)
			
        )";
    Database::prepare($sql, array());
    echo "Courses Table Created";
?>