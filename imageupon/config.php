<?php

define('SITE_NAME','ImageUpon');
define('SITE_ADV','Free Images Upload');
define('SITE_DIR','http://www.example.com/freeimageupload/'); // with '/' at the end.
define('UPLOAD_DIR','upload/'); // with '/' at the end. ! Make it can be read and write!
define('MAX_SIZE','1000000'); // bytes

$valid_suffix = array('.png','.gif','.jpg');//Allow file

$message = array(
'message' => 'Upload your image',
'submit' => 'Upload',
'terms' => 'Terms',
'upload_histroy' => 'Uploaded Histroy',
'error1' => 'Your file size exceeded the limit',
'error2' => 'Your file size exceeded the limit',
'error3' => 'Only part of your file uploaded',
'error4' => 'You did not upload file',
'error_valid' => 'Did not supported your file suffix',
'error_uploaded' => 'Did not uploaded your file',
'error_nofile' => 'You don\'t have any uploaded file.(Must be Cookies support!)',
'info' => '<strong>'.SITE_NAME.'</strong> is a free images upload site. We support the extension PNG/GIF/JPG image files.You can upload 5 files one hour.But you cannot upload the images about Adult , Arms , any Unlawful topic. We will store it Just about 1 mouth or more.You must read and accpet our <a href="#terms">Terms</a> before you upload your image.
',
'terms_list' => 'The following types of files may not be uploaded under any circumstances: 
<ul>
<li>Files that are pedophiliac. This includes, but is not limited to, persons under the age of 18 either posing as "models" or taking part in otherwise sexually implicit or explicit situations.
</li><li>Files that are illegal and/or are in violation of any United States laws pertaining to digital content usage.
</li><li>Files that are pornographic. This includes but is not limited to files depicting genitalia nudity or sexual situations.
</li><li>Files that infringe on the copyrights of any entity. This includes, but is not limited to, copyrighted photographs, as well as files for which user lacks usage and/or distribution permissions.
</li><li>Files that are not of the allowed filetypes. This includes archived non-image files.
</li><li>Files whose intended use or purpose is:
</li><li>To harass individual or multiple persons.
</li><li>To show evidence of the black-hat hacking of systems to which user does not have authorized access.
</li><li>The promotion of products or services through direct advertisements for the purpose of commercial profit, without first attaining the permission of . This includes, but is not limited to, email spam and banner advertisements.</li>
</ul>',
);



define('IMAGEUPON_VERSION','0.1');
define('IMAGEUPON_LANGUAGE','English');
define('IMAGEUPON_LICENSE','Put your license id here if had');//Only for I count the ImageUpon users.
?>