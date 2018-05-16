<?php

 //$user_cont = count($user_data);
 $user_data_json = json_decode(json_encode($user_data,true));
 foreach ($user_data_json->items as $all_data){
     ?>
        <div class="result_main">
            <div class="result_child">
                 <img src="{{ $all_data->avatar_url}}">
                 <div class='side_image'>
                      <span>{{ $all_data->login  }}</span>
                      <span><a href='{{ $all_data->followers_url}}'>{{ $all_data->followers_url}}</a></span>
                      <input type="hidden" value="{{ $all_data->followers_url}}" class="hiddenurl">
                 </div>
                 <span class='loadmore' data-id="{{$all_data->id}}">Load More</span>
            </div>
            <div class="result_followers_data followers_data_{{$all_data->id}}"></div>
        </div>
     <?php
 }
 ?>

<style>
.result_main{
    display: block;
    overflow: hidden;
    padding: 10px;
    background: #cecece;
    border: 1px solid;
    margin: 5px;
}
.result_child{
    float: left;
    width:100%;
}
.side_image {
    display:block;
    overflow:hidden;
}
.side_image span {
    clear: both;
    display: block;
    text-align: left;
    margin-left: 15px;
    font-size: 18px;
}
.loadmore{
    background-color: #008CBA;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    color:#fff;
    float: left;
    margin: 20px 15px;
    cursor: pointer;
}
.loadmore:hover{
 color:#008CBA;
 background-color: #fff;
}
 .result_child img{
float:left;
max-width: 100px;
 }
.result_followers_data{
    display: block;
    overflow: hidden;
    clear: both;
    background: #e7e7e7;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        var timer = null;
        jQuery('.loadmore').on('click',function() {

                var hiddenurl = jQuery('.hiddenurl').val();
                var id = jQuery(this).data( "id" );
                jQuery.ajax({
                    url: '/fetch_followers',
                    type: 'post',
                    data:   {
                        "_token": "{{ csrf_token() }}",
                        "val_text": hiddenurl
                    },
                    success: function(data) {
                        jQuery('.followers_data_'+id).html('');
                        jQuery('.followers_data_'+id).append(data);
                    }
                });

        });
    });
</script>