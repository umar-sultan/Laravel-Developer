<?php  include_once("connection.php")  ?>

<?php 
   if(isset($_POST["fname"]))
   {
       $fname=$_POST["fname"];
       $lname=$_POST["lname"];
       $email=$_POST["email"];
       $password=$_POST["Password"];
       $conn->query("insert into users (fname,lname,email,Password) values ('$fname','$lname','$email','$password')");
        echo "<div class='alert alert-Success'> Welcome you are signup here </div>";
   }

 ?>





<?php  include_once("header.php") ?>

<div class="container">
    <h2 class="my-4 text-primary text-center">Sign up</h2>
    <div class="shadow w-50 my-5 mx-auto p-5">
        <form action="" method="post">
            <input class="form-control mb-3" type="text" name="fname" placeholder="First Name">
            <input class="form-control mb-3" type="text" name="lname" placeholder="Last Name"> 
            <input class="form-control mb-3" type="text" name="email" placeholder="Email"> 
            <input class="form-control mb-3" type="password" name="Password" placeholder="Password"> 
            <input class="btn btn-outline-primary" type="submit" value="signup">
            <a href="index.php"  class="btn btn-outline-primary">Login</a>
        </form>
    </div>
</div>
        </form>
    </div>
</div>

<?php  include_once("footer.php") ?>