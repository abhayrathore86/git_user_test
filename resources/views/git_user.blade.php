<?php
if(isset($user_data)){
    $user_cont = sizeof($user_data);
    $user_data_json = json_encode($user_data);
}
else{
    ?>
    <div class='main_wrapper'>
        <div class='label_search'>Search for Git User</div>
        <form method="post">
            <div><input type="text" name="dev" id="test_btn" onkeydown="return (event.keyCode != 13)">
            {{ csrf_field() }}</div>
        </form>
        <div id="result_git_data"></div>
    </div>
    <?php
}
?>
<style>
.result_git_data {
    display: block;
    overflow: hidden;
    background: #dddd;
}
.main_wrapper{
    display: block;
    overflow: hidden;
    text-align: center;
}

.main_wrapper .label_search {
    font-size: 38px;
    display: block;
    overflow: hidden;
    padding: 20px 0;
}
.main_wrapper form #test_btn {
    width: 50%;
    height: 30px;
    font-size: 20px;
    line-height: 20px;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        var timer = null;
        jQuery('#test_btn').on('keyup',function(e) {
            var text_val = jQuery(this).val();
            if(e.which == 13){
                e.stopPropagation();
                return false;
            }
            clearTimeout(timer);
            timer = setTimeout(call_search, 1000)
            function call_search() {
                jQuery.ajax({
                    url: '/ajax_call',
                    type: 'post',
                    data:   {
                        "_token": "{{ csrf_token() }}",
                        "val_text": text_val
                    },
                    success: function(data) {
                        jQuery('#result_git_data').html('');
                        jQuery('#result_git_data').append(data);
                    }
                });
            }
        });
    });
</script>