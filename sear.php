<html> 
  <head> 
     <style  type="text/css" media="screen"> 
        ul  li { 
        list-style-type:none; 
        } 
     </style>
     <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
     <title>Поиск</title> 
  </head> 
  <body> 
      <table border="1" width="30%" cellpadding="5">
    <h3>Поиск</h3> 

    <form  method="post" action="sear.php?go" id="searchform"> 
      <input  type="text" name="name"> 
      <input  type="submit" name="submit" value="Search"> 
    </form> 
<?php 

    if (isset($_POST['submit'])) { 
        if (isset($_GET['go'])) {
                $connection = new PDO('mysql:host=localhost;dbname=fp;charset=utf8','root');
                $name=$_POST['name'];

                $statement = $connection->query("SELECT * FROM users WHERE firt_name LIKE '%" . $name .  "%' OR last_name LIKE '%" . $name ."%' OR bdate LIKE '%" . $name ."%'");

            while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
           echo "<th>",$row["id"],"</th>";
           echo "<th>",$row["firt_name"],"</th>";
           echo "<th>",$row["last_name"],"</th>";
           echo "<th>",$row["bdate"],"<tr>";
}
 


    }
    }    else { 
        echo  "<p>Пожалуйста, введите поисковый запрос</p>"; 
    } 

?>
  </body> 
</html>