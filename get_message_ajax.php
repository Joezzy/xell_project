<?php
    require_once("./inc/config.php");
    if(isset($_GET['c_id'])){
        //get the conversation id and
        $conversation_id = base64_decode($_GET['c_id']);
        //fetch all the messages of $user_id(loggedin user) and $user_two from their conversation
        $q = mysql_query("SELECT * FROM `messages` WHERE conversation_id='$conversation_id'");
        //check their are any messages
        if(mysql_num_rows($q) > 0){
            while ($m = mysql_fetch_assoc($q)) {
                //format the message and display it to the user
                $user_form = $m['user_from'];
                $user_to = $m['user_to'];
                $message = $m['message'];

                //get name and image of $user_form from `user` table
                $user = mysql_query("SELECT user,profile_pix FROM `members` WHERE id='$user_form'");
                $user_fetch = mysql_fetch_assoc($user);
                $user_form_username = $user_fetch['user'];
                $user_form_img = $user_fetch['profile_pix'];

                //display the message
                echo "
                            <div class='message'>
                                <div class='img-con'>
                                
                                    <img src='{$user_form_img}'>
                                </div>
                                <div class='text-con'>
                                    <a href='#''>{$user_form_username}</a>
                                    <p>{$message}</p>
                                </div>
                            </div>
                            ";

            }
        }else{
            echo "No Messages";
        }
    }

?><?php

?>