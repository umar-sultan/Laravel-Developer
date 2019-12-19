<?php  include_once("connection.php")  ?>

<?php 

    if(isset($_POST["content"]))
    {
        $msg = $_POST["content"];
        $sender_id = $_POST["sender_id"];
        $receiver_id = $_POST["receiver_id"];
        $q = "insert into msg(content, sender_id, receiver_id) values('$msg', $sender_id, $receiver_id)  ";

        $conn->query($q);
    }

    header("Location: chat.php?f=$receiver_id");


?>