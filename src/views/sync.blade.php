<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.1.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>同步登录中</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://ltbl.ttigame.com/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="http://ltbl.ttigame.com/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="http://ltbl.ttigame.com/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="http://ltbl.ttigame.com/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="http://ltbl.ttigame.com/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="http://ltbl.ttigame.com/assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="http://ltbl.ttigame.com/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="http://ltbl.ttigame.com/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="http://ltbl.ttigame.com/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="http://ltbl.ttigame.com/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="http://ltbl.ttigame.com/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<!-- <a href="index.html">
	<img src="http://ltbl.ttigame.com/assets/admin/layout2/img/logo-big.png" alt=""/>
	</a> -->
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
    <h3 class="form-title">正在同步登录,请稍后......</h3>
	<!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 <!-- 2014 &copy; Metronic - Admin Dashboard Template. -->
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="http://ltbl.ttigame.com/assets/global/plugins/respond.min.js"></script>
<script src="http://ltbl.ttigame.com/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="http://ltbl.ttigame.com/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="http://ltbl.ttigame.com/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ltbl.ttigame.com/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="http://ltbl.ttigame.com/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="http://ltbl.ttigame.com/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>
jQuery(document).ready(function() {     
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Login.init();
	Demo.init();

    // init background slide images
    $.backstretch([
        "http://ltbl.ttigame.com/assets/admin/pages/media/bg/1.jpg",
        "http://ltbl.ttigame.com/assets/admin/pages/media/bg/2.jpg",
        "http://ltbl.ttigame.com/assets/admin/pages/media/bg/3.jpg",
        "http://ltbl.ttigame.com/assets/admin/pages/media/bg/4.jpg"
    ], {
      fade: 1000,
      duration: 8000
    });

    function check() {
        $.ajax({
            url: '{{ URL::action('Admin\SsoController@checkSync') }}',
            dataType: 'json',
            success: function(data) {
                if (data.status == false) {
                    if (data.data.url) {
                        sync(data.data.url);
                    } else {
                        setTimeout(function() {
                            //执行跳转
                            location.href = '{{ Config::get('sso')['server']['syncSignin'] }}';
                        }, 1000);

                    }
                } else {
                    setTimeout(function() {
                        //执行跳转
                        location.href = '/admin';
                    }, 1000);

                }
            }
        });
    }

    // 获取同步信息
    function sync(link) {
        $.ajax({
            type: 'get',
            url: link + '?callback=?',
            dataType: 'jsonp',
            xhrFields: {
                withCredentials: true
            },
            success: function(data) {
                savesync(data.data);
            }
        });
    }


    // 保存同步信息
    function savesync(token) {
        $.ajax({
            type: 'post',
            url: '{{ URL::action('Admin\SsoController@handelSyncToken') }}',
            dataType: 'json',
            data: {
                'token': token
            },
            success: function(data) {
                check();
            }
        });
    }

    check();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>