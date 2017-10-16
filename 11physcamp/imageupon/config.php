<?php

define('SITE_NAME','2011 NTU Physcamp');
define('SITE_ADV','檔案上傳系統');
define('SITE_DIR','http://www.phys.tw/physcamp/11physcamp/imageupon/'); // with '/' at the end.
define('UPLOAD_DIR','upload/'); // with '/' at the end. ! Make it can be read and write!
define('MAX_SIZE','1000000'); // bytes

$valid_suffix = array('.png','.gif','.jpg');//Allow file

$message = array(
'message' => '上傳你的照片',
'submit' => '開始上傳',
'terms' => '上傳規定',
'upload_histroy' => 'Uploaded Histroy',
'error1' => 'Your file size exceeded the limit',
'error2' => 'Your file size exceeded the limit',
'error3' => 'Only part of your file uploaded',
'error4' => 'You did not upload file',
'error_valid' => 'Did not supported your file suffix',
'error_uploaded' => 'Did not uploaded your file',
'error_nofile' => 'You don\'t have any uploaded file.(Must be Cookies support!)',
'terms_list' => '請詳讀以下關於上傳照片的規定後再開始上傳</br>
，以順利完成報名： 
<ul>
<li>請上傳一張有你的照片讓我們能更快的認識你</li>
<li>填完報名資料後要來上傳照片才算報名成功喔!!</li>
<li>並請將檔名設成以下的格式：<strong>中文姓名_身分證字號</strong></li>
<li>檔案大小請不要超過1M否則會上傳失敗喔!!</li>
<li>我們只接受副檔名為.gif .jpg .png的圖檔，記得不要搞錯了喔^^</li>
<li>上傳完相片才算報名成功喔!!
</ul>',
);



define('IMAGEUPON_VERSION','0.1');
define('IMAGEUPON_LANGUAGE','English');
define('IMAGEUPON_LICENSE','Put your license id here if had');//Only for I count the ImageUpon users.
?>