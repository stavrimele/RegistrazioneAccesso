<?php
	
?>
<html>
    <head>
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        
        <!-- Icon-->
        <link rel="icon" href="img/icon.png">
        <title>Log in</title>
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
        $username=$_POST['username'];
        $password=$_POST['password'];
        $pass="";
        $user="";
        try {
            // stringa di connessione al DBMS
            $connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            $connessione->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            //echo "Connessione a MySQL tramite PDO effettuata.". "<br />";
            echo "<br>";
            $query = $connessione->query("SELECT username, password FROM utenti");
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            	if($row['username']==$username){
                	//echo "username trovato<br>";
                	$user=$row['username'];
                    if($row['password']==$password){
                        $pass=$password;
                    }
                }
            }
            if($username==$user){
            	if($password==$pass){
                	echo "<center>Login effettuato</center><br>";
                    $query = $connessione->query("SELECT nome,username FROM utenti");
                    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    if($row['username']==$username){
                    	setcookie("user",$row['nome'],time()+180);
                        }
                    }
                }
                else{
                	echo "<center>Password errata</center><br>";
                }
            }
            else{
            	echo "<center>Username non registrato</center><br>";
            }
            echo"<center><a class='btn btn-primary btn-xl js-scroll-trigge' href='index.php'>Home</a></center>";
        }
        catch(PDOException $e)
        {
            // notifica in caso di errore nel tentativo di connessione
            die("Connessione fallita: ". $e->getMessage());
        }
	}
    //var_dump($_SESSION);
?>