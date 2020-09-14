<?php

  include "database/connection.php";


      $error = "";
      $successMessage = "";

      if (isset($_POST['submit']) && $_POST['submit']=="invia"){


        $formName = mysqli_real_escape_string($link, $_POST['name']);
        $mail = mysqli_real_escape_string($link, $_POST['email']);
        $content = mysqli_real_escape_string($link, $_POST['content']);

        $sql = "INSERT INTO messaggi (email, nome, messaggio) VALUES ('$mail','$formName','$content')";

            if(mysqli_query($link, $sql)){
              $successMessage = '<div class="alert alert-success" role="alert">Grazie ' .$_POST["name"]. ', <br>Il tuo messaggio è stato inviato!!</div>';
          } else{
              $error = '<div class="alert alert-danger" role="alert"><p><strong>C\'è un errore, riprova più tardi!</strong></p></div>';
          }
        }



      if ($_POST) {

        if (!$_POST['email']) {

          $error .= "L'indirizzo Email è obbligatorio<br>";
        }

        if (!$_POST['name']) {
          $error .= "Il nome è obbligatorio<br>";
        }

        if (!$_POST['content']) {
          $error .= "Il messaggio è obbligatorio<br>";
        }

        if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {

          $error .= "L'indirizzo email non è valido<br>";
        }

        if ($error != "") {

          $error = '<div class="alert alert-danger" role="alert"><p>C\'è un errore</p>'. $error .'</div>';

        } else {

          $emailTo = "christian.francini87@gmail.com";

          $name = $_POST['name'];

          $content = $_POST['content'];

          $headers = "From: ".$_POST['email'];

          if (mail($emailTo,$name,$content, $headers)) {

            $successMessage = '<div class="alert alert-success" role="alert">Grazie ' .$_POST["name"]. ', <br>Il tuo messaggio è stato inviato!!</div>';

          }
        }


    }


?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <!-- AOS animate CDN -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- INTERNAL CSS-->
    <link rel="stylesheet" href="css/style.css">

    <style>
      /* Default height for small devices */
      #primaryContainer {
        height: 600px;
      }

      /* Height for devices larger than 992px */
      @media (min-width: 992px) {
        #primaryContainer {
          height: 800px;
        }
      }
    </style>

    <title>Christian Francini | Contatti</title>
    <link rel="icon" type="image/png" href="img/logo/logo_franchie.png">

</head>

<body>
    <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Navbar brand Logo-->
      <img src="img/logo/logo_franchie_white.png" height="30" alt="" loading="lazy" />
      <!-- Toggle button -->
    <button
        class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

  <!-- Collapsible wrapper -->
  <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" >
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="index.html#chisono">Chi Sono</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html#portfolio">Portfolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contatti.php">Contatti</a>
      </li>
      </ul>
      <!-- Social Icons-->
      <ul class="navbar-nav ml-auto navbar-icons d-flex flex-row">
        <li class="nav-item">
          <a class="nav-link" href="https://www.linkedin.com/in/christianfrancini/"><i class="fab fa-linkedin-in"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://twitter.com/christian_fra"><i class="fab fa-twitter-square"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/christian.francini"><i class="fab fa-facebook"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.instagram.com/christian_fra/"><i class="fab fa-instagram"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/Chri2187"><i class="fab fa-github"></i></a>
        </li>
      </ul>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
  <!-- END NAVBAR-->

<div id="formDiv" class="container-fluid bg-image" style="background: linear-gradient(15deg,rgba(29, 236, 197, 0.7),rgba(77, 53, 211, 0.7) 100%);">
<!-- Testo sopra Form -->
<div class="container mt-5 text-center text-white">
    <h1 class="display-3">Richiedi una consulenza</h1>
    <p>Hai bisogno di un sito web per la tua azienda?</p>
    <p>Vorresti un sito personale ma non sai da dove iniziare?</p>
    <p>Compila il modulo qui sotto per richiedere una consulenza e un preventivo per il tuo sito web.</p>
</div>

<!-- Message DIV -->
<div class="container-fluid w-50 animate__animated animate__zoomInUp" id="message"><?php echo $error.$successMessage; ?></div>
<!-- End Message DIV -->

<!-- Contact Form -->
<div id="primaryContainer" class="container p-5 w-75 text-black ">
    <form id="form" method="POST">
        <div class="form-group mb-3">
            <label for="email"><i class="far fa-envelope"></i> Email</label>
            <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="email@email.com">
        </div>
        <div class="form-group mb-3">
            <label for="name"><i class="fas fa-user"></i> Nome</label>
            <input name="name" class="form-control form-control-lg" id="name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="content"><i class="fas fa-marker"></i> Scrivi qui il tuo messaggio</label>
            <textarea class="form-control form-control-lg" name="content" id="content" rows="4"></textarea>
        </div>
        <button type="submit" name="submit" value="invia" class="btn btn-primary mt-2">Invia</button>
    </form>
</div>
<!-- End Contact Form -->
</div>

<!-- START FOOTER -->
<footer class="bg-dark text-center text-lg-left">
    <!-- Grid container -->

    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">© 2020 Copyright:
        <a class="text-white" href="https://christianfrancini.altervista.org/">christianfrancini.altervista.org</a>
    </div>
    <!-- Copyright -->
</footer>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- AOS CDN -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>

<!-- Personal Script -->
    <script type="text/javascript">


        $("form").submit(function (e) {

            var error = "";

            if ($('#email').val() == "") {

                error += "Il campo Email non può essere vuoto<br>";

            }

            if ($('#name').val() == "") {

                error += "Il campo Nome non può essere vuoto<br>";

            }
            if ($('#content').val() == "") {

                error += "Il campo Messaggio non può essere vuoto<br>";

            }

            if (error != "") {

                $('#message').html('<div class="alert alert-danger" role="alert"><p><strong>C\'è un errore</strong></p>' + error + '</div>');

                return false;

            } else {

                $('#message').html('<div class="alert alert-success" role="alert"><p><strong>Messaggio Inviato</strong></p></div>');

                return true;

            }

        });



    </script>

</body>

</html>
