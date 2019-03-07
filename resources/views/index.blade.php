<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AskPls" />

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/style.css" type="text/css" />  
    <link rel="stylesheet" href="/askpls.css" type="text/css" />

    <link rel="stylesheet" href="/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/css/animate.css" type="text/css" /> 
 
    <link rel="stylesheet" href="/askplsfonts.css" type="text/css" />

    <link rel="stylesheet" href="/css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/css/colors.php?color=1c85e8" type="text/css" /> 

    <script async src="embed.js"></script> 

    <script src="https://cdn.jsdelivr.net/npm/places.js@1.15.4"></script>
 

    @include('analytics')
 
    <title>AskPls | Anonymous Review Platform</title>

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
                                <a href="/" class="standard-logo"><img src="/images/logo.png" alt="AskPls"></a>
                                <a href="/" class="retina-logo"><img src="/images/logo@2x.png" alt="AskPls"></a>
                            </div> 

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center"> 
                            <nav id="primary-menu" class="with-arrows fnone clearfix">
                                <ul> 
                                    <li><a href="/t"><div>Home</div></a></li> 
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
        <section  id="topicsdetails">

            <div class="content-wrap clearfix">

                <div class="container">
                    

                   <div class="row clearfix" style="margin-top:-50px; "  > 
                    
                        <div class="col-lg-12 "  >

                            <div class="container clearfix">

                                <div  class="clearfix center divcenter" style="max-width: 800px;">
                                    <div class="emphasis-title">
                                        <h4 class="font-secondary" style="color: black; font-size: 36px; font-weight: 900; text-shadow: 0 7px 10px rgba(0,0,0,0.07), 0 4px 4px rgba(0,0,0,0.2);">Private Anonymous Reviews Platform </h4>
                                        <p style="font-weight: 300; opacity: .7; color: black; text-shadow: 0 -4px 20px rgba(0, 0, 0, .25);">Get genuine Anonymous Feedback from people you care</p>
                                    </div> 
                                  
                                </div>

                            </div> 

                            <div class="container clearfix" style="border: 2px bold red;">

                               

                                <div class="colnobottommargin"  style="background-color: #FFF;border: 2px solid #EEE;margin-bottom: 10px;border-radius: 5px;">

                                     <div class="heading-block nobottomborder center divcenter mb-0 clearfix" style="max-width: 550px"> 
                                        <h4 class="nott ls0 mb-3">Pictures Reviews - <a href="/youtube">All</a></h4> 
                                    </div> 

                                    <ul class="clients-grid grid-5 nobottommargin clearfix">

                                        @foreach ($topics_images as $topic_images) 

                                            <li><a href=" " data-animate="fadeIn"><img src="/storage/{{$topic_images->image}}" width="100px" max-height="100px;" alt=""></a></li> 

                                        @endforeach

                                        
                                    </ul>

                                </div> 

                            </div>

                            <div class="container clearfix">

                                <div class="colnobottommargin" style="background-color: #FFF;border: 2px solid #EEE; margin-bottom: 10px;border-radius: 5px;"> 
                                    <div class="heading-block nobottomborder center divcenter mb-0 clearfix" style="max-width: 550px"> 
                                        <h4 class="nott ls0 mb-3">Youtube Videos Reviews- <a href="/youtube">All</a></h4> 
                                    </div> 

                                    <ul class="clients-grid grid-5 nobottommargin clearfix">

                                    @foreach ($topics_youtube as $topic_youtube) 

                                            <li><a href="" data-animate="fadeIn"><img src="https://img.youtube.com/vi/{{ $topic_youtube->video}}/default.jpg" alt="Clients"></a></li> 

                                    @endforeach
                                    </ul>

                                </div> 

                            </div>

                            <div class="container clearfix">

                                <div class="col_full nobottommargin" style="background-color: #FFF;border: 2px solid #EEE;border-radius: 5px;">

                                    <div class="heading-block nobottomborder center divcenter mb-0 clearfix" style="max-width: 550px"> 
                                        <h4 class="nott ls0 mb-3">Instagram Pictures Reviews - <a href="/instagram">All</a></h4> 
                                    </div>  

                                    <div class="container">
                                      <div class="row">

                                        @foreach ($topics_insta as $topic_insta)

                                            <div class="col-sm" style=""> 

                                                <blockquote class="instagram-media" data-instgrm-permalink="{{ $topic_insta->instagram}}" data-instgrm-version="9" style=" background:#FFF; padding:0; width:19.375%; width:-webkit-calc(20% - 2px); width:calc(5% - 2px); max-width: 100px;"> </blockquote> 
                                                <button type="button" class="btn btn-outline-primary btn-sm  " style="margin-bottom: 20px;">Add Anonymous Comments</button>
                                            </div> 


                                        @endforeach

                                      </div>
                                    </div> 

                                </div> 

                            </div>

                            <br>

                            <div class="section nobg mt-4 mb-0 pb-0">
                                <div class="container">
                                    <div class="heading-block nobottomborder center divcenter mb-0 clearfix" style="max-width: 550px"> 
                                        <h3 class="nott ls0 mb-3">Professional Categories</h3>
                                        <p>Anonymous reviews for professional categories</p>
                                    </div>
                                    <div class="row justify-content-between align-items-center clearfix">

                                        <div class="col-lg-4 col-sm-6">

                                            <div class="feature-box fbox-right noborder">
                                                
                                                <h3 class="nott ls0"><a href="/g/schools">Schools Reviews</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, dolore, voluptates!</p>
                                            </div>

                                            <div class="feature-box fbox-right noborder mt-5">
                                                 
                                                <h3 class="nott ls0"><a href="/g/colleges">Colleges Reviews</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, provident.</p>
                                            </div>

                                            <div class="feature-box fbox-right noborder mt-5">
                                                 
                                                <h3 class="nott ls0"><a href="/g/companies">Companies Reviews</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, ipsa!</p>
                                            </div>

                                        </div>

                                        <div class="col-lg-3 col-7 offset-3 offset-sm-0 d-sm-none d-lg-block center my-5">
                                            <img src="images/askplsmobile.jpeg" alt="iphone" class="rounded  parallax" data-bottom-top="transform: translateY(-30px)" data-top-bottom="transform: translateY(30px)">
                                        </div>

                                        <div class="col-lg-4 col-sm-6">

                                            <div class="feature-box noborder">
                                                
                                                <h3 class="nott ls0"><a href="/g/doctors">Doctors Reviews</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, dolore, voluptates!</p>
                                            </div>

                                            <div class="feature-box noborder mt-5">
                                                 
                                                <h3 class="nott ls0"><a href="/g/hotels">Hotels Reviews</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, ipsa!</p>
                                            </div>

                                            <div class="feature-box noborder mt-5">
                                                
                                                <h3 class="nott ls0"><a href="/g/restaurants">Restaurants Reviews</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, provident.</p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="section nobg mt-4 mb-0 pb-0">
                                <div class="container">
                                    <div class="heading-block nobottomborder center divcenter mb-0 clearfix" style="max-width: 550px"> 
                                        <h3 class="nott ls0 mb-3">Personal Topics</h3>
                                        <p>Anonymous reviews for professional categories</p>
                                    </div>
                                    <div class="row justify-content-between align-items-center clearfix">

                                        <div class="col-lg-6 col-sm-6">

                                            <div class="feature-box fbox-right noborder">
                                                
                                                <h3 class="nott ls0">Personal Topics</h3> 
                                                <p>How do I look in this Instagram picture?</p> 
                                                <p>ohh!! I love her so much. What to do? </p> 
                                            </div>

                                            <div class="feature-box fbox-right noborder mt-5">
                                                
                                                <h3 class="nott ls0">Political Topics</h3>
                                                <p>Rafael deal? really an issue?</p>
                                                <p>When will court complete hearing on Ram Temple</p> 
                                            </div>

                                        </div> 

                                        <div class="col-lg-6 col-sm-6">

                                            <div class="feature-box noborder">
                                               
                                                <h3 class="nott ls0">Current Affairs Topics</h3>
                                                <p>India and Pak conflict</p>
                                                <p>H1B policy</p> 
                                            </div> 



                                            <div class="feature-box  noborder mt-5">
                                              
                                                <h3 class="nott ls0">Movies Topics</h3>
                                                <p>Feedback for Manmarziyaan</p>
                                                <p>Amitabh new movie</p> 
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="section mt-5 footer-stick promo-section nobg" style="padding: 100px 0; overflow: visible">
                                <div class="container">
                                    <div class="heading-block nobottomborder center">
                                        <h5 class="uppercase ls1 mb-1">Grab your Free Trail and Explore the Options</h5>
                                        <h2 class="nott ls0">Try Keyword Search 30 Days Free With Canvas<span>SEO</span></h2>
                                        <a href="#" class="button button-large button-rounded nott ml-0 ls0 mt-4">Contact Us Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="section mt-5 mb-0" style="padding: 120px 0; background-image: url('demos/course/images/icon-pattern-bg.jpg'); background-size: auto; background-repeat: repeat">

                                <!-- Wave Shape
                                ============================================= -->
                                <div class="wave-top" style="position: absolute; top: 0; left: 0; width: 100%; background-image: url('images/shape-dividers/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x;"></div>

                                <div class="container">
                                    <div class="row">

                                        <div class="col-lg-8">
                                            <div class="row dark clearfix">

                                                <!-- Feature - 1
                                                ============================================= -->
                                                <div class="col-md-6">
                                                    <div class="feature-box media-box bottommargin">
                                                        
                                                        <div class="fbox-desc">
                                                            <h3 class="text-white">21,000 Online Courses</h3>
                                                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi rem, facilis nobis voluptatum est voluptatem accusamus molestiae eaque perspiciatis mollitia.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Feature - 2
                                                ============================================= -->
                                                <div class="col-md-6">
                                                    <div class="feature-box media-box bottommargin">
                                                        
                                                        <div class="fbox-desc">
                                                            <h3 class="text-white">Lifetime Access</h3>
                                                            <p class="text-white">Porro repellat vero sapiente amet vitae quibusdam necessitatibus consectetur, labore totam. Accusamus perspiciatis asperiores labore esse.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Feature - 3
                                                ============================================= -->
                                                <div class="col-md-6">
                                                    <div class="feature-box media-box bottommargin">
                                                        
                                                        <div class="fbox-desc">
                                                            <h3 class="text-white">Expert Instructors</h3>
                                                            <p class="text-white">Quos, non, esse eligendi ab accusantium voluptatem. Maxime eligendi beatae, atque tempora ullam. Vitae delectus quia, consequuntur rerum quo.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Feature - 4
                                                ============================================= -->
                                                <div class="col-md-6">
                                                    <div class="feature-box media-box bottommargin">
                                                        
                                                        <div class="fbox-desc">
                                                            <h3 class="text-white">Different Languages</h3>
                                                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi rem, facilis nobis voluptatum est voluptatem accusamus molestiae eaque perspiciatis mollitia.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Registration Foem
                                        ============================================= -->
                                        <div class="col-lg-4">

                                            <div class="card shadow" data-animate="shake" style="opacity: 1 !important">
                                                <div class="card-body">
 
                                                    <h4 class="card-title ls-1 mt-4 t700 h5">Register Yourself and Post a Topic!</h4> 

                                                    <div class="form-widget">
                                                        <div class="form-result"></div>

                                                        <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/form.php" method="post">

                                                            <div class="form-process"></div>

                                                            <div class="col_full">
                                                                <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control border-form-control required" placeholder="Your Full Name:" />
                                                            </div>
                                                            <div class="col_full">
                                                                <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control border-form-control" placeholder="Your Email Address:" />
                                                            </div>

                                                            <div class="col_full">
                                                                <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control border-form-control required" placeholder="Your Phone Number:" />
                                                            </div>

                                                            <div class="col_full">
                                                                <button class="button button-rounded btn-block button-large bgcolor text-white nott ls0" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Register</button>
                                                                <br>
                                                                <small style="display: block; font-size: 12px; margin-top: 15px; color: #AAA;"></small>
                                                            </div>

                                                            <div class="clear"></div>

                                                            <div class="col_full hidden">
                                                                <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                                                            </div>

                                                            <input type="hidden" name="prefix" value="template-contactform-">

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Wave Shape
                                ============================================= -->
                                <div class="wave-bottom" style="position: absolute; top: auto; bottom: 0; left: 0; width: 100%; background-image: url('images/shape-dividers/wave-3.svg'); height: 12px; z-index: 2; background-repeat: repeat-x; transform: rotate(180deg);"></div>

                            </div>

                            <br><br>
                            <div id="posts" class="post-grid grid-container grid-2 clearfix" data-layout="fitRows">

                                @foreach ($topics as $topic)
                       
                                    <div class="entry clearfix">
                                       
                                        <div class="entry-title">
                                            <h2><a href="/t/{{ $topic->url }}/{{ str_replace(' ','_',$topic->topic_name) }}">{{ $topic->topic_name}}</a></h2>
                                        </div>
                                        <ul class="entry-meta clearfix">
                                            <li><i class="icon-calendar3"></i> {{ $topic->created_at }}</li>

                                            @if( $topic->comments > 0)
                                                <li><i class="icon-comments"></i> {{ $topic->comments }}</li>
                                            @endif
                                            <li><i class="icon-picture"></i>{{ $topic->category }}</li>

                                            <li><a target="_blank" href="/p/{{ $topic->user_code}}/{{ str_replace(' ','_',$topic->name) }}"><i class="icon-user"></i>{{ $topic->name }}</a></li>

                                        </ul> 
                                    </div> 

                                @endforeach

                            </div>  
                        </div>  

                    </div>

                </div>

            </div>
  

        </section> 
        <footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">          

            <div class="line nomargin"></div>

            <div class="center">

                <a target="_blank" href="/companies">Companies</a> | <a target="_blank" href="/doctors">Doctors</a> | <a target="_blank" href="/hotels">Hotels</a> | <a target="_blank" href="/restaurants">Restaurants</a> | <a target="_blank" href="/schools">Schools</a> | <a target="_blank" href="/colleges">Colleges</a> |  <a target="_blank" href="/lawyers">Lawyers</a> |  <a target="_blank" href="/fitnesscenters">Fitness Centers</a>
                <p><a href="/g"><b>Alternate AskPls View</b></a></p> 

            </div>
 
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
 
    <script src="../../js/jquery.js"></script>
    <script src="../../js/plugins.js"></script> 
    <script src="../../js/functions.js"></script>
 

</body>
</html>