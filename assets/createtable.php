<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kulinermahasiswa";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sqlpag = "CREATE TABLE page (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            page VARCHAR(50) NOT NULL
            )";

    // use exec() because no results are returned
    $conn->exec($sqlpag);

    // sql to create table
    $sqlart = "CREATE TABLE artikel (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(50) NOT NULL,
            deskripsi TEXT NOT NULL,
            tanggalditulis DATE NOT NULL,
            penulis VARCHAR(50) NOT NULL,
            foto VARCHAR(255) NOT NULL,
            id_kategori INT(11) NOT NULL,

            CONSTRAINT fk_id_kategori
                FOREIGN KEY (id_kategori) 
                REFERENCES page (id) 
                ON UPDATE CASCADE
            )";

    // use exec() because no results are returned
    $conn->exec($sqlart);

    // sql to create table
    $sqlren = "CREATE TABLE rentangharga (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            merek VARCHAR(50) NOT NULL,
            deskripsi TEXT NOT NULL,
            hargaminimal INT(11) NOT NULL,
            hargamaksimal INT(11) NOT NULL,
            id_artikel INT(11) NOT NULL,

            CONSTRAINT fk_id_artikel
                FOREIGN KEY (id_artikel) 
                REFERENCES artikel (id) 
                ON UPDATE CASCADE
            )";

    // use exec() because no results are returned
    $conn->exec($sqlren);

    // sql to create table
    $sqlrat = "CREATE TABLE ratingulasan (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            rating INT(11) NOT NULL,
            ulasan TEXT NOT NULL,
            tanggalditulis DATE NOT NULL,
            penulis VARCHAR(50) NOT NULL,
            id_artikel INT(11) NOT NULL,

            CONSTRAINT fk_id_rentangharga
                FOREIGN KEY (id_artikel) 
                REFERENCES rentangharga (id) 
                ON UPDATE CASCADE
            )";

    // use exec() because no results are returned
    $conn->exec($sqlrat);

    // sql to create table
    $sqlres = "CREATE TABLE resep (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_artikel INT(11) NOT NULL,
            bahan TEXT NOT NULL,
            prosedur TEXT NOT NULL,

            CONSTRAINT fk_id_artikel2
                FOREIGN KEY (id_artikel) 
                REFERENCES artikel (id) 
                ON UPDATE CASCADE
            )";

    // use exec() because no results are returned
    $conn->exec($sqlres);

    // sql to create table
    $sqlkri = "CREATE TABLE kritiksaran (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            tanggapan TEXT NOT NULL
            )";

    // use exec() because no results are returned
    $conn->exec($sqlkri);

    // sql to create table
    $sqluse = "CREATE TABLE users (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            role VARCHAR(50) NOT NULL
            )";

    // use exec() because no results are returned
    $conn->exec($sqluse);

    echo "Tables created successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
