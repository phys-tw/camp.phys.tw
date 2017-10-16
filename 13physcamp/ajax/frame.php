<form enctype="multipart/form-data" action="upload.php" method="post">
<input name="ID" type="hidden" value="<?=$_GET['ID']?>" />
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<input type="file" name="uploadimg" />
<input type="submit" value="上傳" />
</form>
