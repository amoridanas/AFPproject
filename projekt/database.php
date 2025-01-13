<?php
    define('dbHOST','localhost');
    define('dbUSERNAME','root');
    define('dbPASSWORD','');
    define('dbDATABASE','oktatasi_portal');
    define('dbPORT','3306');

    function connect()
    {
        $connection = mysqli_connect(dbHOST,dbUSERNAME,dbPASSWORD,dbDATABASE,dbPORT);
        if(!$connection)
        {
            die("Hiba a kapcsolat kiépítés során: ".mysqli_connect_error());
        }
        return $connection;
    }
    function add_user($username,$email,$password,$permission)
    {
        $connection = connect();
        $query = "INSERT INTO users (username,email,password,permission)
                  VALUES ('$username','$email','$password','$permission')";
                  mysqli_query($connection, $query) or die("Hiba a lekérdezésben: $query");
                  mysqli_close($connection);
                  header("Location: index.php?page=1&msg=Sikeres regisztráció!");
    }
