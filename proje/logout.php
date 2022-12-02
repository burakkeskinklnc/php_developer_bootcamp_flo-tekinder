<?php
session_start();
session_destroy();
header("Location:http://localhost:90/proje/index.php");
