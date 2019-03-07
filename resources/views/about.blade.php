<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AskPls" /> 
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" /> 
    <link rel="stylesheet" href="askpls.css" type="text/css" />

    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
 
    <link rel="stylesheet" href="askplsfonts.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/colors.php?color=1c85e8" type="text/css" />

    @include('analytics')
 
    <title>AskPls | Public Topics | Anonymous reviews</title>

</head>

<body class="stretched side-push-panel">

    <div id="side-panel">

        <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

        <div class="side-panel-wrap">

            <div class="widget clearfix">

                <h4 class="t400">Login</h4>

                
                <div class="line line-sm"></div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col_full"> 
                        <label for="email" class="t400">{{ __('E-Mail Address') }}</label> 
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col_full">
                        <label for="login-form-password" class="t400">Password:</label>  
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col_full nobottommargin">
                        <button class="button button-rounded t400 nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                        <br>   <br> 
                        <a href="/register" class=" ">Register</a> |       <a href="/password/reset" class=" ">Forgot Password?</a>
                    </div>

                </form>


            </div>

        </div>

    </div>
 
    <div id="wrapper" class="clearfix">

        <header id="header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <div class="row justify-content-xl-between justify-content-lg-between clearfix">

                        <div class="col-lg-2 col-12 d-flex align-self-center"> 
                            <div id="logo">
                                <a href="/" class="standard-logo"><img src="images/logo.png" alt="Canvas Logo"></a>
                                <a href="/" class="retina-logo"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
                            </div> 

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center"> 
                            <nav id="primary-menu" class="with-arrows fnone clearfix">

                                <ul> 
                                    <li><a href="/"><div>Home</div></a></li> 
                                    <li><a href="/topics"><div>Topics</div></a></li> 
                                    <li><a href="/about"><div>About AskPls</div></a></li> 
                                    <li><a href="/prices"><div>Prices</div></a></li> 
                                    <li><a href="/support"><div>Support</div></a></li>
                                </ul>
                            </nav> 
                        </div>

                        @if (Route::has('login'))
                            @if (Auth::check())
                                <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin">
                                    
                                    <div id="side-panel-trigger"  > 
                                        
                                        <a href="/portal" class="d-none d-lg-block">Portal <i class="icon-line-arrow-right"></i></a>
                                    </div> 
                                </div> 
                            @else
                                <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin">
                                     
                                    <div id="side-panel-trigger" class="side-panel-trigger">
                                        <a href="#" class="d-block d-lg-none"><i class="icon-line-lock"></i></a>
                                        
                                        <a href="#" class="d-none d-lg-block">Sign In <i class="icon-line-arrow-right"></i></a>
                                    </div> 
                                </div>                           
                            @endif
                        @endif

                        
                        <a href="#" class="d-block d-lg-none mobile-side-panel side-panel-trigger"><i class="icon-line-arrow-right"></i></a>
                    </div>
                </div>

            </div>

        </header>  
        <section id="slider" class="slider-element clearfix" style="height: 500px; margin-top:-50px;     background-size: cover;">
            <div class="vertical-middle">
                <div class="container clearfix">

                    <div class="clearfix center divcenter" style="max-width: 800px;">
                        <div class="emphasis-title">
                            <h1 class="font-secondary" style="color: black; font-size: 76px; font-weight: 900; text-shadow: 0 7px 10px rgba(0,0,0,0.07), 0 4px 4px rgba(0,0,0,0.2);">Anonymous Reviews </h1>
                            <p style="font-weight: 300; opacity: .7; color: black; text-shadow: 0 -4px 20px rgba(0, 0, 0, .25);">Get genuine anonymous Feedback from your team and improve your productivity</p>
                        </div>
       
                        <form id="widget-subscribe-form" action="/register" role="form" method="get" class="nobottommargin" data-animate="fadeInUp">
                            <div class="input-group divcenter">
                                <input type="email" id="emailid" name="emailid" class="form-control form-control-lg not-dark" placeholder="Enter your Email Address.." style="border: 0; box-shadow: none; overflow: hidden;">
                                <button type="submit" class="button " style="border-radius: 3px;">Get Started</button>  
                                 
                            </div>
                        </form>
                      
                    </div>

                </div>
            </div>

        </section>
 
        <section id="content" style="margin-top:-50px;">

            <div class="content-wrap notoppadding clearfix">
 
                <div class="container topmargin-lg bottommargin-lg clearfix">

                    <div class="divcenter" style="max-width: 960px">
 
                        <div class="tabs tabs-alt tabs-responsive tabs-justify clearfix" id="tab">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tabs-1"><i class="icon-line2-key"></i>Anonymous Reviews</a></li>
                                <li><a href="#tabs-2"><i class="icon-line2-social-dropbox"></i>Private Reviews</a></li>
                                <li><a href="#tabs-3"><i class="icon-line2-drop"></i>Public Reviews</a></li>
                                <li><a href="#tabs-4"><i class="icon-line2-pointer"></i>Solutions</a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-1" style="margin-top:-20px;">
                                    <div class="story-box description-left clearfix">
                                        <div class="story-box-image">
                                            <img src="/images/1.jpg" alt="story-image">
                                        </div>
                                        <div class="story-box-info">
                                            <h3 class="story-title">You don't need to worry about revealing your identities</h3>
                                            <div class="story-box-content">
                                                <p>The core focus is on getting genuine reviews of anything without revealing your identities. Reviewer details are never shared with anyone.</p>
                                                <a href="/register" class="t300  noleftmargin button-rounded">Register to see</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content clearfix" id="tabs-2" style="margin-top:-20px;">
                                    <div class="story-box clearfix">
                                        <div class="story-box-image">
                                            <img src="/images/2.jpg" alt="story-image">
                                        </div>
                                        <div class="story-box-info">
                                            <h3 class="story-title">Private Reviews</h3>
                                            <div class="story-box-content">
                                                <p>You can get reviews from everyone you asked privately from your workplace</p>
                                                <a href="/login" class="t300  noleftmargin button-rounded">Login</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content clearfix" id="tabs-3" style="margin-top:-20px;">
                                    <div class="story-box description-left clearfix">
                                        <div class="story-box-image">
                                            <img src="/images/3.jpg" alt="story-image">
                                        </div>
                                        <div class="story-box-info">
                                            <h3 class="story-title">Public Reviews</h3>
                                            <div class="story-box-content">
                                                <p>You can get the reviews from anyone on the public domain, without them asking for registering on the website.</p>
                                                <a href="/login" class="t300  noleftmargin button-rounded">Login</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content clearfix" id="tabs-4" style="margin-top:-20px;">
                                    <div class="story-box clearfix">
                                        <div class="story-box-image">
                                            <img src="/images/4.jpg" alt="story-image">
                                        </div>
                                        <div class="story-box-info">
                                            <h3 class="story-title">Custom based Solutions</h3>
                                            <div class="story-box-content">
                                                <p>Its time for appraisals, its product review time, HR policies.. No worries, we got you covered for all the custom built solutions for the needs.</p>
                                                <a href="/contact" class="t300  noleftmargin button-rounded">Contact us</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div> 

                <div class="container clearfix">

                    <div class="emphasis-title center divcenter" style="max-width: 800px">
                        <h2 class="font-secondary nott t700">1000 of companies using and satisfied...</h2>
                    </div>

                    <div class="col_one_third nobottommargin">
                        <div class="feature-box fbox-small fbox-center fbox-plain fbox-large nobottomborder">
                            <div class="fbox-icon">
                                <i class="icon-line2-home"></i>
                            </div>
                            <h3 class="ls0 t400 nott" style="font-size: 20px;">Simple Pricing</h3>
                            <p style="font-size: 16px;">Simple pricing based on users.</p>
                        </div>
                    </div>
                    <div class="col_one_third nobottommargin">
                        <div class="feature-box fbox-small fbox-center fbox-plain fbox-large nobottomborder">
                            <div class="fbox-icon">
                                <i class="icon-line2-compass"></i>
                            </div>
                            <h3 class="ls0 t400 nott" style="font-size: 20px;">Secured Reviews</h3>
                            <p style="font-size: 16px;">Choose to use your own mail server and keep it complete secure within your premises</p>
                        </div>
                    </div>
                    <div class="col_one_third nobottommargin col_last">
                        <div class="feature-box fbox-small fbox-center fbox-plain fbox-large nobottomborder">
                            <div class="fbox-icon">
                                <i class="icon-line2-directions"></i>
                            </div>
                            <h3 class="ls0 t400 nott" style="font-size: 20px;">Cloud or In-premise Setup</h3>
                            <p style="font-size: 16px;">Choose to get the setup installed at cloud or your in-premise</p>
                        </div>
                    </div>
                </div>

            </div>

        </section> 
        <footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">

            <div class="line nomargin"></div> 
            <div id="copyrights" class="" style="background-color: #FFF">

                <div class="container clearfix">

                    <div class="col_full center nomargin">
                        <span>Copyrights &copy; 2019 All Rights Reserved by AskPls.</span>
                    </div>

                </div>

            </div> 

        </footer> 

    </div> 
 
    <div id="gotoTop" class="icon-angle-up"></div>
 
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
 
    <script src="js/functions.js"></script>

</body>
</html>