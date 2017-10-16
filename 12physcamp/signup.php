<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<?php include 'include/head.php'; ?>
</head>
<body>
<?php include 'include/preBody.php'; ?>
<div id="main">
<div id="header">
<div id="header_logo">
<div id="logo">
<?php include 'include/logo.php';?>
</div>
<div id="menubar">
<?php include 'include/menubar.php';?>
</div>
</div>
</div>
<div id="site_content">
<div class="sidebar">
<?php include 'include/sidebar.php';?>
</div>
<div id="content">
<?php include 'include/preContent.php'; ?>
    <h1>線上報名系統</h1>
    <ul><li id="sign-up-bu"><a>我要報名</a></li><li id="look-up-bu"><a>查詢資料</a></li><li id="edit-bu"><a>修改資料</a></li><li><a>取消報名</a></li></ul>
    <div id="button-state" style="display:none;"></div>
    <div id="ajax-message" style="text-align:center; display:none; color:red; border:2px solid red; background-color:yellow; padding: 3px; width:200px; margin-left:auto;margin-right:auto;">&nbsp;</div>
    <br>
    <div id="ajax-data" style="display:none">
    
    </div>
</div>
</div>
<div id="footer">
<?php include 'include/footer.php';?>
</div>
</div>
<script>
$(function(){
    $('#sign-up-bu').click(function(){
        if ($('#button-state').html()!='')
            return -1;
        window.location.hash = "#sign-up";
        $.get('./ajax/ajax_get_data.php', {method:'edit', AutoNo:'0'},function(data,textStatus){
            showData(data);
        });
    });
    $('#look-up-bu').click(function(){
        if ($('#button-state').html()!='')
            return -1;
        window.location.hash = "#look-up";
        $.get('./ajax/ajax_auth.php', {method:'lookup'},function(data,textStatus){
            showData(data);
        });
    });
    $('#edit-bu').click(function(){
        if ($('#button-state').html()!='')
            return -1;
        window.location.hash = "#edit";
        $.get('./ajax/ajax_auth.php', {method:'edit'},function(data,textStatus){
            showData(data);
        });
    });
    checkHash();
});
function checkHash() {
    switch (window.location.hash) {
        case "#sign-up":
            $('#sign-up-bu').click();
            break;
        case "#look-up":
            $('#look-up-bu').click();
            break;
        case "#edit":
            $('#edit-bu').click();
            break;
        default:
            
            break;
    }
}
function showMessage(txt) {
    var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
    $body.animate({
        scrollTop: 0
    }, 500);
    $("#content").animate({
        scrollTop: 0
    }, 500);
    $('#ajax-message').html(txt).fadeIn(500);
    window.setTimeout("$('#ajax-message').fadeOut(500);", 5000);    
}
function showData(txt) {
    $('#ajax-data').hide().html(txt).fadeIn(500);
}
</script>
</body>
</html>
