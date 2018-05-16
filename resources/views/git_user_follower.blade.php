<?php
 $user_data_json = json_decode(json_encode($user_followers_data,true));
echo "<h1>Followers</h1>";
 foreach ($user_data_json as $all_data){

     ?>
         <div class="right">
             <img src="{{ $all_data->avatar_url}}">
             <div>
                <span>{{ $all_data->login  }}</span>
                <span><a href='{{ $all_data->followers_url}}'>{{ $all_data->followers_url}}</a></span>
             </div>
         </div>
     <?php
 }
 ?>

 <style>
.right {
    width: 100%;
    text-align: left;
    display: block;
    overflow: hidden;
    margin: 10px;
    border-bottom: 1px solid #dddddd;
    padding-bottom: 10px;
}
 .right img{
    height: 100px;
    width: 100px;
    float: left;
 }
.right div {
    float: left;
}

 .right span {
     clear: both;
     display: block;
     text-align: left;
     margin-left: 15px;
     font-size: 18px;
 }
 </style>