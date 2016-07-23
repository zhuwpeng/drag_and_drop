<?php
include_once("db.php");
$db = new DB();
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="jquery-ui-1.12.0/jquery-ui.js"></script>
        <script type="text/javascript">
            $(document).ready(function()){
                $('.reorder_link').on('click', function()){
                    $("ul.reorder-photos-link").sortable({tolerance:'pointer'});
                    $('.reorder_link').html('save reordering');
                    $('#reorder-helper').slideDown('slow');
                    $('.image_link').attr("href", "javascript:void(0);");
                    $('.image_link').css("cursor", "move");
                    $("#save_reorder").click(function( e ){
                        if( !$("#save_reorder i").length )
                        {
                            $(this).html('').prepend('<img src="images/refresh-animated.gif"/>');
                            $("ul.reorder-photos-list").sortable('destroy');
                            $("#reorder-helper").html("Reordering Photos - This could take a moment. Please don't navigate away from this page.").removeClass('light_box').addClass('notice notice_error');
                            var h = [];
                            $("ul.reorder-photos-list li").each(function() { h.push($(this).attr('id').substr(9)); });
                            $.ajax({
                                type: "POST",
                                url: "order_update.php",
                                data: {ids: " " + h + ""},
                                success: function(html)
                                {
                                    window.location.reload();
                                }
                            });
                            return false;
                        }
                        e.preventDefault();
                    });
                });
            });
        </script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
