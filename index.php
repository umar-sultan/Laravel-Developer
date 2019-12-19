<?php  session_start() ?>
<?php  include_once("connection.php")  ?>

<?php
if(isset($_POST["username"]))
{
    $fname = $_POST["username"];
    $password = $_POST["password"];

    $result = $conn->query("select * from users where fname = '$fname' and password = '$password' ");
    $row = $result->fetch_assoc();
    if(count($row)>0)
    {
        $_SESSION["isUserLogedIn"] = true;
        $_SESSION["username"] = $fname;
        $_SESSION["userId"] = $row["id"];
        header("location: chat.php");
    }
    else
    {
        echo "<div class='alert alert-danger'> Login Failed </div>";
    }
    
}

?>

<?php  include_once("header.php")?>
<div class="container">
    <h2 class="my-4 text-primary text-center">LOGIN</h2>
    <div class="shadow w-50 my-5 mx-auto p-5">
        <form action="" method="post">
            <input class="form-control mb-3" type="text" name="username" placeholder="Username">
            <input class="form-control mb-3" type="password" name="password" placeholder="Password"> 
            <input class="btn btn-outline-primary" type="submit" value="Login">
            <a href="signup.php"  class="btn btn-outline-primary">Signup</a>
        </form>
    </div>
</div>


<?php  include_once("footer.php") ?>
    
