<html>
    <head>
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        
        <!-- Icon-->
        <link rel="icon" href="img/icon.png">
        <title>Sign up</title>
    </head>
    <body>
    </body>
</html>
<?php
	 //Verifica se le variabili esistono (serve per la prima volta)
              if(isset($_POST['username'])){
              $host = "localhost";
              $user = "stavrimele";
              $db = "my_stavrimele";
              $password = "";
              try {
              // stringa di connessione al DBMS
               $connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);
              $connessione->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
               // notifica in caso di connessione effettuata
               //echo "Connessione a MySQL tramite PDO effettuata.". "<br />";
               echo "<br>";
              // inserimento dati inseriti nella form
              $sql=("INSERT INTO utenti (username,password,nome,cognome,email) VALUES
              ('$_POST[username]','$_POST[password]',' $_POST[nome]',' $_POST[cognome]',' $_POST[email]')");
              $query=$connessione->exec($sql);
              echo "<center>Registrazione effettuata". "<center><br />";
              echo"<center><a class='btn btn-primary btn-xl js-scroll-trigger' href='index.php'>Home</a></center>";
               }
              catch(PDOException $e)
              {
               // notifica in caso di errore nel tentativo di connessione
               die("Connessione fallita: ". $e->getMessage());
              }
              }
?>