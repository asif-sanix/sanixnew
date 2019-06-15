
<!DOCTYPE html>
<html class=" ">
    <head>
        <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 4.1
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Happy Grahak : forgot password Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="{{asset('admin-asset/images/favicon.png')}}" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="{{asset('admin-asset/images/apple-touch-icon-57-precomposed.png')}}">	<!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('admin-asset/images/apple-touch-icon-114-precomposed.png')}}">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('admin-asset/images/apple-touch-icon-72-precomposed.png')}}">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('admin-asset/images/apple-touch-icon-144-precomposed.png')}}">    <!-- For iPad Retina display -->




        <!-- CORE CSS FRAMEWORK - START -->
        <link href="{{asset('admin-asset/plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{asset('admin-asset/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-asset/plugins/bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-asset/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-asset/css/animate.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-asset/plugins/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="{{asset('admin-asset/plugins/icheck/skins/square/orange.css')}}" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="{{asset('admin-asset/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin-asset/css/responsive.css')}}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">


        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">
                <h1><a href="#" title="Login Page" tabindex="-1">Happy Grahak</a></h1>

                <form name="loginform" id="loginform" action="{{ route('admin.login.post') }}" method="post">
                {{csrf_field()}}
                    <p>
                        <label for="user_login">email<br />
                 <input type="text" name="email" class="input" value="{{old('email')}}" size="20" /></label>
                        <b class="text-danger">{{$errors->first('email')}}</b>
                    </p>
               
                    <p class="forgetmenot">
                        <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" value="1" class="skin-square-orange"> Remember me</label>
                    </p>



                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
                    </p>
                </form>

                <p id="nav">
                    <a class="pull-left" href="#" title="Password Lost and Found">Forgot password?</a>
                    <a class="pull-right" href="ui-register.html" title="Sign Up">Sign Up</a>
                </p>


            </div>
        </div>





        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="{{asset('admin/js/jquery-1.11.2.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('admin/js/jquery.easing.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('admin/plugins/pace/pace.min.js')}}" type="text/javascript"></script>  
        <script src="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}" type="text/javascript"></script> 
        <script src="{{asset('admin/plugins/viewport/viewportchecker.js')}}" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="{{asset('admin/plugins/icheck/icheck.min.js')}}" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="{{asset('admin/js/scripts.js')}}" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="{{asset('admin/plugins/sparkline-chart/jquery.sparkline.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('admin/js/chart-sparkline.js')}}" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

    </body>
</html>



