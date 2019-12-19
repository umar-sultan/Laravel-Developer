
<?php  include_once("connection.php")  ?>
<?php 
  if(isset($_GET["log"]))
  {
    session_destroy();
    header("location:index.php");  
  } 
 ?>
  






<nav>
    <div class="container-fluid bg-dark py-2">
    <div class=" d-flex mt-3">
    <img src="" alt="logo" width="40" class="rounded-circle mx-5 text-white ml-5"> 
    <input type="text" class="form-control w-50 " style="margin-left: 60px;" placeholder="Search Friends chat ">
    <b class="btn btn-info ml-1 mr-5"> Search </b>
    <img src="img/profile.jpg" width="40" class="rounded-circle" style="margin-left: 150px;">
    <a href="?log=<?=$userId ?>" class="text-white pt-2 pl-3 ">Log out</a>
    </div>
    </div>
</div>
</nav>