<?php

$is_invalid =false;

if($_SERVER["REQUEST_METHOD"]==="POST"){

    $mysqli = require __DIR__ ."/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE  email = '%s' ",
            $mysqli->real_escape_string($_POST["email"]) );
    $result = $mysqli ->query($sql);

    $user = $result->fetch_assoc();

    if($user){

        if(password_verify($_POST["password"],$user["password_hash"])){

           // die("Login successful");
            session_start();
            session_regenerate_id();
            //toavoid session fixation attack

            $_SESSION["user_id"] = $user["id"];

            header("Location: index.php");
            exit;

        }

    }
    $is_invalid=true;

    //var_dump($user);
    //exit;

}

?>
<!DOCTYPE html>
<html lang>

<head>

    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles4.css">

</head>

<body>

<h1>Login</h1>
<?php if($is_invalid):?>

    <em>Invalid Login</em>

<?php endif;?>



<br><br>
<form method ="post">
    <label for="email">email</label>
    <br>
    <input type="email" name ="email" id="email"
            value="<?= htmlspecialchars($_POST["email"] ?? " ") ?>">
            <!--the form will remember inserted email-->
    <br><br>
    <label for="password">Password</label>
    <br>
    <input type ="password" name="password" name="password" id="password">
    <input type="checkbox" onclick="myFunction()">Show Password
    <br><br>
    <button>Login</button>

</form>
    <br><br><br><br>
    <a href="http://localhost/website/login/signup.html" style=color:red;>Not Registered? Sign Up Here</a>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>

</html>