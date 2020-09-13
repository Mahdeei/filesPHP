<?php
    include "index.php";

    
    if(isset($_POST['user_id'])){
        $comments = array();
        $user_id = $_POST['user_id'];
    

        $sql=$db->query("select id from comment WHERE user_id='$user_id'");
        $User_id = $sql->fetch_assoc();
        $id = $User_id['id'];

        $sql=$db->query("select * from comments_item WHERE comment_id='$id'");
        
        
        while ($row=$sql->fetch_assoc())
        {
                $comments[]=$row;
        }

    
    }else{
        $resultUser['status']="not have post in insert";
    }





    $resultUser=json_encode($comments);
    
    echo $resultUser;




    $db->close();

?>