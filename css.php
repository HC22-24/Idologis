<?php

if (isset($_POST[''])) {
    $color = $_POST['color'];
    echo "<style>  
        .section_principale{
        background-image:linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url(img/background.jpg);
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        }

        h1{
        color = <?php $color ?>;
        } </style>";
    }



