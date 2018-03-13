 <!-- 
Author:     Jonathan Herron
File Name:  DataBaseAdaptor.php
Purpose:    Communicates with the MariaDB database using sql
            and sends transcribed data back to the controller.
-->
 <?php
 class DatabaseAdaptor {
     // The instance variable used in every one of the functions in class DatbaseAdaptor
     private $DB;
     public function __construct() {
         $db = 'mysql:dbname=moviemates;host=127.0.0.1;charset=utf8';
         $user = 'root';
         $password = '';
         
         try {
             $this->DB = new PDO ( $db, $user, $password );
             $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
         } catch ( PDOException $e ) {
             echo ('Error establishing Connection');
             exit ();
         }
     }
  
  // Return all movie records with release date >= $year
  // as an associative PHP array.
  public function getData() {
    $stmt = $this->DB->prepare ( "SELECT * FROM users");
    $stmt->execute ();
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  
  // This function flags a quote.
  public function flag($id, $flag) {
      $stmt = $this->DB->prepare("UPDATE users SET flagged=".$flag." WHERE id=".$id);
      $stmt->execute ();
  } 
  
  // This function adds users.
  public function register($username, $password, $firstname, $lastname, $email, $phonenumber, $city, $state, $genre, $image, $description) {
      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $zero = 0;
      $stmt = $this->DB->prepare("INSERT into users (username, password, firstname, lastname, email, phonenumber, city, state, genre, image, description) VALUES (\"".$username."\", \"".$hashed."\", \"".$firstname."\", \"".$lastname."\", \"".$email."\", \"".$phonenumber."\", \"".$city."\", \"".$state."\", \"".$genre."\", \"".$image."\", \"".$description."\")");
      $stmt->execute ();
  }
  
  public function checkUsers($username) {
      $stmt = $this->DB->prepare( "SELECT * from users" );
      $stmt->execute();
      $array = $stmt->fetchAll( PDO::FETCH_ASSOC );
      $found = 0;
      for ($i = 0; $i < count($array); $i++) {
          if ($array[$i]['username'] == $username) {
              $found = 1;
              return "true";
          }
      }
      if ($found == 0) {
          return "false";
      }
  }
  
  public function checkLogin($username, $password) {
      $stmt = $this->DB->prepare( "SELECT * from users" );
      $stmt->execute();
      $array = $stmt->fetchAll( PDO::FETCH_ASSOC );
      $found = 0;
      for ($i = 0; $i < count($array); $i++) {
          if ($array[$i]['username'] == $username) {
              $output = true;
              //$output = password_verify($username, $array[$i]['password']);
              if ($output == true) {
                  $found = 1;
                  return "true";
              }
          }
      }
      if ($found == 0) {
          return "false";
      }
  }
  
} // End class DatabaseAdaptor

// Testing code that should not be run when a part of MVC
$theDBA = new DatabaseAdaptor ();
 
?>