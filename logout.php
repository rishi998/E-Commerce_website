<?php
include('connection.php');
session_destroy();
echo'<script>
        setTimeout(function(){
            window.location.replace("index.php");
        },100);
        
        </script>';
?>