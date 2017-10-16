
<?php if($login == false) { ?>
<form method="post" action="login.php">
<table class="tbody" cellspacing="1" align="center" cellpadding="0">
    <tr>
        <td class="thead">
            &nbsp; <img src="images/tb_title.gif" align="absmiddle"> &nbsp;管理員登入
        </td>
    </tr>
    <tr>
        <td class="middle">
            <table border="0" cellpadding="0" cellspacing="0" align="center">
            <tr height="30"><td>
            用戶：<input type="text" name="username" size="15"> &nbsp;&nbsp;
            密碼：<input type="password" name="password" size="15">
            <input type="submit" value=" 登入 ">
            </td></tr>
            </table>
        </td>
    </tr>
</table>
</form>
<?php } else { ?>

<form method="post" action="admin.php">
<table class="tbody" cellspacing="1" align="center" cellpadding="0">
    <tr>
        <td class="thead">
            &nbsp; <img src="images/tb_title.gif" align="absmiddle"> &nbsp;管理員&#36873;&#39033;
        </td>
    </tr>
    <tr>
        <td class="middle">

        <table border="0" cellpadding="0" cellspacing="0" align="center">
        <tr height="30"><td>
        <input type="hidden" name="send" value="doit">
        <input type="button" value="統計系統歸零" onclick="if (window.confirm('注意 ! 這將刪除所有的統計數據 !  \n\n除非您確定想歸零, 否則不要使用 !')){document.forms[0].submit();}">
        <input type="button"value="退出登入" onclick="document.forms[0].action='logout.php'; document.forms[0].submit();">
        </td></tr>
        </table>

        </td>
    </tr>
</table>
</form>

<?php } ?>