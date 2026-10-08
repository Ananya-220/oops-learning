<?php

class Dbh {

    protected function connect() {

        try {

            $username = "root";
            $password = "";

            $dbh = new PDO(
                "mysql:host=localhost;dbname=ooplogin;charset=utf8mb4",
                $username,
                $password
            );

            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbh;

        } catch (PDOException $e) {

            die("Connection failed: " . $e->getMessage());

        }
    }
}