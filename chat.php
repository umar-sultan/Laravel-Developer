<?php  session_start() ?>

<?php
    $username = "";
    $userId = "";

    $isLoggedIn = $_SESSION["isUserLogedIn"];
    if(isset($isLoggedIn))
    {
        if($isLoggedIn == true)
        {
            $username = $_SESSION["username"];
            $userId = $_SESSION["userId"];
            
        }
        else
        {
            header("location: index.php");
        }
    }
    else
    {
        header("location: index.php");
    }



?>

<?php  include_once("connection.php")  ?>

<?php

        
        if(isset($_GET["f"]))
        {
            $frnd_id = $_GET["f"];
        }
        else
        {
            $frnd_id = 0;
        }

        $msgs = $conn->query("select * from msg where sender_id in ($frnd_id, $userId) and receiver_id in ($frnd_id, $userId)  ");
        $friends = $conn->query("SELECT * from users join friends on users.id = friends.user_id where friends.friend_id = $userId");
?>



<?php  include_once("header.php") ?>
<?php  include_once("nav.php") ?>

<div class="container-fluid">
    <div class="row p-3" style="height: 85vh">

        <div class="col-md-3 pt-4 shadow">
            <h3 class="text-info text-center">Friends</h3>
            <div class="text-white p-4">
                
            <?php while($friend = $friends->fetch_assoc())
            { ?>

                   <a href="?f=<?=$friend["user_id"] ?>" class="text-decoration-none">
                       <div class="<?= ($friend["user_id"] == $frnd_id) ? 'bg-success' : 'bg-info'   ?> rounded py-3 px-4 mb-2">
                           <img src="img/profile.jpg" width="50" class="rounded-circle mr-3">
                           <b class="mr-3 text-white"> <?= $friend["fname"] ?> </b>
                           <span class="badge badge-success">online</span>
                       </div>
                   </a>

            <?php } ?>
                

            </div>
        </div>

        <div class="col-md-7 shadow">
            <div class="pb-5 pt-2 px-3 h-100">
                <div class="rounded p-4" style="background-color: #fcfcfc; height: 500px; overflow: auto;">
                    
                    <?php while($msg = $msgs->fetch_assoc()) { ?>

                        <?php if($userId == $msg["sender_id"]){  ?>
                            <div class="p-2">
                                <img src="img/profile.jpg" width="30" class="rounded-circle mr-2">
                                <span class="bg-primary text-white py-2 px-4 rounded">
                                    <?= $msg["content"] ?>
                                </span>
                            </div>
                        <?php } else { ?>
                            <div class="p-2 float-right">
                                <span class="bg-warning text-white py-2 px-4 rounded">
                                    <?= $msg["content"] ?>
                                </span>
                                <img src="img/profile.jpg" width="30" class="rounded-circle ml-2">
                            </div>
                        <?php } ?>
                        <br>
                    <?php }; ?>

                </div>
                <form action="sendmsg.php" method="post" class="form-inline">
                    <input type="text" name="content" class="form-control w-75" placeholder="Type Something...">
                    <input type="hidden" name="sender_id" value="<?= $userId ?>">
                    <input type="hidden" name="receiver_id" value="<?= $frnd_id ?>">
                    <button class="ml-4 btn btn-success">Send</button>
                </form>
                
            </div>
        </div>

    </div>
</div>


<?php  include_once("footer.php") ?>
    
