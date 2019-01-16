<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#" lang="vi-vn">
<head>
<meta name="RATING" content="GENERAL" />

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo CGlobal::$website_title; ?></title>
<meta name="KEYWORDS" content="<?php echo CGlobal::$configs['web_keyword'];?>"/>
<meta name="DESCRIPTION" content="<?php echo CGlobal::$configs['web_des']; ?>"/>
<meta http-equiv="content-language" content="vi" />
<meta name="RESOURCE-TYPE" content="DOCUMENT" />
<meta name="DISTRIBUTION" content="GLOBAL" />
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#041e48">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#041e48">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#041e48">
<meta name="apple-mobile-web-app-capable" content="yes">
<?php
 if(CGlobal::$website_title=='') CGlobal::$website_title=CGlobal::$configs['web_name'];
 

 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }

?>
<link rel="alternate" href="<?php echo $pageURL;?>" hreflang="vi-vn" />
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo CGlobal::$website_title; ?>" />
<meta property="og:description" content="<?php echo CGlobal::$configs['web_des']; ?>" />
<meta property="og:url" content="<?php echo $pageURL;?>" />
<meta property="og:site_name" content="<?php echo CGlobal::$website_title; ?>" />
<meta property="og:image" content="<?php echo WEB_ROOT; ?>uploads/<?php echo CGlobal::$website_image; ?>" />
<meta http-equiv="audience" content="General" />
<link href="<?php echo $pageURL;?>" rel="alternate" media="only screen and (max-width: 640px)" />
<link href="<?php echo $pageURL;?>" rel="alternate" media="handheld" />
<meta name="news_keywords" content="<?php echo CGlobal::$configs['web_keyword'];?>" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@communication" />
<meta name="twitter:creator" content="@communication" />
<meta name="twitter:title" content="<?php echo CGlobal::$website_title; ?>" />
<meta name="twitter:description" content="<?php echo CGlobal::$configs['web_des']; ?>" />
<meta name="twitter:image:src" content="<?php echo WEB_ROOT; ?>uploads/<?php echo CGlobal::$website_image; ?>" />
<meta name="twitter:domain" content="<?php echo WEB_ROOT; ?>">  
<meta name="DC.Format" content="text/html">
<meta name="DC.Language" content="vi" >
<meta name="DC.Publisher" content="communicationn" >
<meta name= "DC.Creator" content = "communication">
<meta name="DC.Title" content="<?php echo CGlobal::$website_title; ?>" > 
<?php  if( isset($_GET['main']) && in_array($_GET['main'], CGlobal::$pg_noIndex)){?>
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW, NOARCHIVE, NOSNIPPET" />
<?php  }else{?>
<meta name="ROBOTS" content="<?php echo CGlobal::$robotContent; ?>" />
<meta name="Googlebot" content="<?php echo CGlobal::$gBContent; ?>" />
<?php  } ?>
<base href="<?php echo WEB_ROOT; ?>" />
<link rel="shortcut icon" href="<?php echo STATIC_URL; ?>favicon.ico?v=1.1" />
<?php  if(CGlobal::$is_adminpage){?>
<link href="<?php echo STATIC_URL; ?>style/styles_admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo STATIC_URL; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/Library_2001.js?v=<?php echo CGlobal::$js_ver; ?>"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/jquery-ui-1.8.11/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/jquery-ui-1.8.11/jquery-ui-1.8.11.custom.min.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo STATIC_URL; ?>js/hex_md5.js"></script>
 <link href="<?php echo STATIC_URL;?>style/styles_common.css" rel="stylesheet" type="text/css" />
<?php  } else{?>
      <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>www/assets/css/main.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>www/assets/dist/aos.css">
    <link rel="stylesheet" href="<?php echo STATIC_URL;?>www/assets/css/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.9/angular.min.js"></script>

<?php  }?>
<?php echo System::$extraHeaderCSS;?>

<script type="text/javascript">
var query_string = "?<?php echo urlencode($_SERVER['QUERY_STRING']);?>",
BASE_URL = "<?php echo WEB_ROOT; ?>",
WEB_DIR  = "<?php echo WEB_DIR; ?>",
TIME_NOW = <?php echo TIME_NOW; ?>;
</script>

<?php echo System::$extraHeader;?>
<?php echo System::$extraHeaderJS;?>
</head>
<body ng-app="" ng-class="{'header__menu-active' : toggle }">
