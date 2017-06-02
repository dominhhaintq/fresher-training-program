<?php 
    // Connect to database(host, user_name, password, database)
    $dbc = mysqli_connect('localhost', 'root', '', 'library');
    // check connect
    if(!$dbc){
        trigger_error("Could not connect to DB: " . mysqli_connect_error());
    }else {
        // set connect utf-8
        mysqli_set_charset($dbc, 'utf-8');
    }
?>