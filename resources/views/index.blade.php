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

    <script src="/vue/vue.min.js"></script>
    <script src="/axios/axios.min.js"></script>

    <script async src="embed.js"></script> 

    <script src="https://cdn.jsdelivr.net/npm/places.js@1.15.4"></script>
    <style>
        [v-cloak] {
          display: none;
        }
    </style>

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
                    
                        <div class="col-lg-12 " v-if="vCatTopics == 0">

                            <div class="container clearfix"  v-cloak>

                                <div v-show="topmessage" class="clearfix center divcenter" style="max-width: 800px;">
                                    <div class="emphasis-title">
                                        <h4 class="font-secondary" style="color: black; font-size: 36px; font-weight: 900; text-shadow: 0 7px 10px rgba(0,0,0,0.07), 0 4px 4px rgba(0,0,0,0.2);">Private Anonymous Reviews Platform </h4>
                                        <p style="font-weight: 300; opacity: .7; color: black; text-shadow: 0 -4px 20px rgba(0, 0, 0, .25);">Get genuine Anonymous Feedback from people you care</p>
                                    </div> 
                                  
                                </div>

                            </div>
                            <br>
                            <div v-show="showspinner" class="text-center"><img src="/ajax_loader.gif"></div>
 

                            <div class="container clearfix">

                                <div class="colnobottommargin">

                                    <h4>Pictures Reviews - <a href="/youtube">All</a></h4> 

                                    <ul class="clients-grid grid-5 nobottommargin clearfix">

                                        @foreach ($topics_images as $topic_images) 

                                            <li><a href="http://logofury.com/logo/enzo.html" data-animate="fadeIn"><img src="/storage/{{$topic_images->image}}" alt=""></a></li> 

                                        @endforeach

                                        
                                    </ul>

                                </div> 

                            </div>

                            <div class="container clearfix">

                                <div class="colnobottommargin">

                                    <h4>Youtube Videos Reviews - <a href="/youtube">All</a></h4> 

                                    @foreach ($topics_youtube as $topic_youtube) 

                                            <li><a href="http://logofury.com/logo/enzo.html" data-animate="fadeIn"><img src="https://img.youtube.com/vi/{{ $topic_youtube->video}}/default.jpg" alt="Clients"></a></li> 

                                        @endforeach

                                </div> 

                            </div>

                            <div class="container clearfix">

                                <div class="col_full nobottommargin">

                                    <h4>Instagram Pictures Reviews - <a href="/instagram">All</a></h4> 

                                    <div class="container">
                                      <div class="row">

                                        @foreach ($topics_insta as $topic_insta)

                                            <div class="col-sm" style=""> 

                                                <blockquote class="instagram-media" data-instgrm-permalink="{{ $topic_insta->instagram}}" data-instgrm-version="9" style=" background:#FFF; padding:0; width:19.375%; width:-webkit-calc(20% - 2px); width:calc(5% - 2px); max-width: 100px;"> </blockquote> 
                                                <button type="button" class="btn btn-primary btn-sm  " style="margin-bottom: 20px;">Add Anonymous Comments</button>
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
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                            <div class="feature-box fbox-right noborder mt-5">
                                                
                                                <h3 class="nott ls0">Political Topics</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </div> 

                                        <div class="col-lg-6 col-sm-6">

                                            <div class="feature-box noborder">
                                               
                                                <h3 class="nott ls0">Current Affairs Topics</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div> 



                                            <div class="feature-box  noborder mt-5">
                                              
                                                <h3 class="nott ls0">Movies Topics</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
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

                            <br>

                            <div  class="row" v-for="topic in topics" style="margin-bottom: 10px;padding-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger" v-cloak >
                                 
                                <div class="col-12 col-md-12"  >
                                     
                                    <ul class="entry-meta clearfix"> 
                                    <li><a target="_blank" href="#" :href="'/p/' + topic.user_code + '/' + topic.name.replace(/ /g,'_')"><i class="icon-user"></i> @{{ topic.name }}</a></li> 
                                </ul>
                                </div>
                                
                            </div> 
                        </div> 

                        <div class="col-lg-10 " v-if="vCatTopics == 1">

                            <div class="row"  style="margin-bottom: 4px;padding-bottom: 4px;   border: 1px solid #F2E7E5; " class="border border-danger">

                                @empty($categorytype)

                                    <p ><b>Search criteria <a href="" @click="clearfilter">Clear All</a> :</b></p>
                                    <br>
                                @endempty 

                                    @if(empty($categorytype))

                                    <ul><li style="list-style: none;">&nbsp;</li>
                                  
                                        <li v-if="vCatTopics" style="list-style: none;" v-cloak> <b>Category :</b> @{{ vCatName}}   </li>
                                        <li v-if="vlocality" style="list-style: none;" v-cloak><b> Locality :</b> @{{ vlocality}} 
                                            <a href="" @click="event.preventDefault();clear('locality')">clear</a></li>
                                        <li v-if="vcity" style="list-style: none;" v-cloak><b> City :</b> @{{ vcity}} 
                                            <a href=""  @click="event.preventDefault();clear('city')">clear</a></li>
                                        <li v-if="vcountry" style="list-style: none;" v-cloak> <b>Country :</b> @{{ vcountry}} 
                                            <a href=""  @click="event.preventDefault();clear('country')">clear</a></li>
                                        <li v-if="vtype" style="list-style: none;" v-cloak><b> Type :</b> @{{ vtype}} 
                                            <a href=""  @click="event.preventDefault();clear('type')">clear</a></li>
                                        <li v-if="vspeciality" style="list-style: none;" v-cloak> <b>Speciality :</b> @{{ vspeciality}} 
                                            <a href=""  @click="event.preventDefault();clear('speciality')">clear</a></li>
                                        </ul>
                                    @else
                                    <div style="margin-left: 100px;" >
                                        
                                        <ul>
                                            <h4 class="center" >Displaying @{{ categorytypename }}</h4> 
                                            <li v-if="vlocality" style="list-style: none;padding-left: 20px;"><b> Locality :</b> @{{ vlocality}} 
                                                <a href="" @click="event.preventDefault();clear('locality')">clear</a>
                                            </li>
                                            <li v-if="vcity" style="list-style: none;padding-left: 20px;"><b> City :</b> @{{ vcity}} 
                                                <a href=""  @click="event.preventDefault();clear('city')">clear</a>
                                            </li>
                                            <li v-if="vcountry" style="list-style: none;padding-left: 20px;"> <b>Country :</b> @{{ vcountry}} 
                                                <a href=""  @click="event.preventDefault();clear('country')">clear</a>
                                            </li>
                                            <li v-if="vtype" style="list-style: none;padding-left: 20px;;"><b> Type :</b> @{{ vtype}} 
                                                <a href=""  @click="event.preventDefault();clear('type')">clear</a>
                                            </li>
                                            <li v-if="vspeciality" style="list-style: none;padding-left: 20px;"> <b>Speciality :</b> @{{ vspeciality}} 
                                                <a href=""  @click="event.preventDefault();clear('speciality')">clear</a>
                                            </li>
                                            </ul>

                                    </div>
                                    @endif
                                
                            </div>

                            <div  class="row" v-for="topic in topics" style="margin-bottom: 10px;padding-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger" v-cloak >
                                 
                                <div class="col-12 col-md-12" v-if="vCatName == 'Colleges' || vCatName == 'colleges'"  >

                                    <div class="media" style="padding-top: 10px;"> 
                                      
                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100" class="mr-3"> 
                                      <img  v-else src="/no-image.png"  width="100" class="mr-3"> 

                                      <div class="media-body" style="margin-left: 20px;">
                                        <h4 class="mt-0"><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url  + '/' + topic.name.replace(/ /g,'_')" style="">@{{ topic.name }}</a></h4> 
                                        <ul class="entry-meta clearfix">
                                            <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type}}</a> </li>
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city, v)">@{{ topic.city}}</a>  </li> 
                                        
                                        </ul>
                                      </div>
                                    </div>  
                                    
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Doctors' || vCatName == 'doctors'"  >

                                    <div class="media" style="padding-top: 10px;"> 
                                      
                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100" class="mr-3 img-fluid"> 
                                      <img  v-else src="/no-image.png"  width="100" class="mr-3 img-fluid"> 

                                      <div class="media-body" style="margin-left: 20px;">
                                        <h4 class="mt-0"><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url + '/' + topic.name.replace(/ /g,'_')" style="">@{{ topic.name }}</a></h4> 

                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.qualification}}  |  @{{ topic.exp}} yrs exp. </p>  

                                        <ul class="entry-meta clearfix">
                                      
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setspeciality(topic.speciality)">@{{ topic.speciality }}</a>  </li>
                                            <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)"> @{{ topic.locality }}</a></li>
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)"> @{{ topic.city }}</a></li> 
                                        
                                        </ul> 
                                      </div>
                                    </div>  
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Companies' || vCatName == 'companies'"  >

                                    <div class="media" style="padding-top: 10px;"> 
                                      
                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100" class="mr-3 img-fluid rounded"> 
                                      <img  v-else src="/no-image.png"  width="100" class="mr-3 img-fluid rounded"> 

                                      <div class="media-body" style="margin-left: 20px;">
                                        <h4 class="mt-0"><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url + '/' + topic.name.replace(/ /g,'_')" style="">@{{ topic.name }}</a></h4> 
                                        <ul class="entry-meta clearfix">
                                       
                                            <li v-if="topic.city"><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                        
                                        </ul> 
                                      </div>
                                    </div>  
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Fitness Centers' || vCatName == 'fitnesscenters'"  >

                                    <div class="media" style="padding-top: 10px;"> 
                                      
                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100" class="mr-3"> 
                                      <img  v-else src="/no-image.png"  width="100" class="mr-3"> 

                                      <div class="media-body" style="margin-left: 20px;">
                                        <h4 class="mt-0"><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url + '/' + topic.name.replace(/ /g,'_')" style="">@{{ topic.name }}</a></h4> 
                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.address}}    </p>  

                                        <ul class="entry-meta clearfix">
                                      
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>   </li>
                                            <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                        
                                        </ul> 
                                      </div>
                                    </div>   
                                     
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Hotels' || vCatName == 'hotels'"  >

                                    <div class="media" style="padding-top: 10px;"> 
                                      
                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100" class="mr-3"> 
                                      <img  v-else src="/no-image.png"  width="100" class="mr-3"> 

                                      <div class="media-body" style="margin-left: 20px;">
                                        <h4 class="mt-0"><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url + '/' + topic.name.replace(/ /g,'_')" style="">@{{ topic.name }}</a></h4> 
                                        <ul class="entry-meta clearfix">
                                      
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>  </li>
                                            <li v-if="topic.locality"><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                        
                                        </ul> 
                                      </div>
                                    </div>  

                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Lawyers' || vCatName == 'lawyers'"  >

                                    <div class="media" style="padding-top: 10px;"> 
                                      
                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100" class="mr-3"> 
                                      <img  v-else src="/no-image.png"  width="100" class="mr-3"> 

                                      <div class="media-body" style="margin-left: 20px;">
                                        <h4 class="mt-0"><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url + '/' + topic.name.replace(/ /g,'_')" style="">@{{ topic.name }}</a></h4> 

                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.address}}    </p>  

                                        <ul class="entry-meta clearfix">
                                      
                                            <li> <i class="icon-user"></i>
                                                    <a v-for="speciality1  in ( topic.speciality.split(',') )"   href="" @click="event.preventDefault();setspeciality( speciality1.replace(']','').replace('[',''))">
                                                        @{{ speciality1.replace('[','').replace(']','') }}
                                                    </a>  
                                            </li>
                                            <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                        </ul>
                                        
                                      </div>
                                    </div>  
  
                                     
                                    </ul> 
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Restaurants' || vCatName == 'restaurants'"  >
                                    

                                    <div class="media" style="padding-top: 10px;"> 
                                      
                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100" class="mr-3"> 
                                      <img  v-else src="/no-image.png"  width="100" class="mr-3"> 

                                      <div class="media-body" style="margin-left: 20px;">
                                        <h4 class="mt-0"><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url + '/' + topic.name.replace(/ /g,'_')" style="">@{{ topic.name }}</a></h4> 

                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.address}}   </p>   

                                        <ul class="entry-meta clearfix">
                                      
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>   </li>
                                            <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                        
                                        </ul> 
                                        
                                      </div>
                                    </div> 


                                     
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Schools' || vCatName == 'schools'"  >

                                    <div class="media" style="padding-top: 10px;"> 
                                      
                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100" class="mr-3"> 
                                      <img  v-else src="/no-image.png"  width="100" class="mr-3"> 

                                      <div class="media-body" style="margin-left: 20px;">
                                        <h4 class="mt-0"><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url + '/' + topic.name.replace(/ /g,'_')" style="">@{{ topic.name }}</a></h4> 

                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.address}}   </p>   

                                        <ul class="entry-meta clearfix">
                                      
                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>  </li>

                                            <li v-if="topic.locality"><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>

                                            <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                        
                                        </ul> 
                                        
                                      </div>
                                    </div> 

                                     
                                </div>
                                
                            </div> 
                        </div> 

                    </div>

                </div>

            </div>

            <div v-if="vCatTopics == 0"><div   v-if="showLoadMore > 0"  class="center"><button class="btn btn-primary" @click="morerows">Load More Topics</button></div></div>

            <div v-if="vCatTopics > 0"><div   v-if="showLoadMoreCategory > 0"  class="center"><button class="btn btn-primary" @click="morerowscategory(vtype,vspeciality,vlocality,vcity,vcountry)">Load More</button></div></div>

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
 

    <script>
    
        const topicsdetails = new Vue({

            el : '#topicsdetails',
            data : {
                categorytype: "",
                searchcategoryid: "" ,
                id:"", 
                inpId: "", 
                topic: "",
                topics: [],
                inpKey:"", 
                searchquery : "",
                row_count : 0,
                row_count_category : 0,
                category : "",
                categories: [], 
                city: "",
                cities: [],
                inpCategoryId : "",
                vCat1 : "", 
                vCatId : "",
                showLoadMore : 0,
                showLoadMoreCategory : 0,
                citylist: "",
                vCatName: "",
                vCatTopics: 0,
                vCatType: 1,
                showspinner : false,
                vPlaceholders: "",
                vSearchName: "",
                searchcategoryname : "",
                vlocality : "",
                vtype: "",
                vspeciality: "",
                vcity: "",
                vcountry: "", 
                categorytypename: "",
                topmessage: true,

            },
            mounted:function(){ 
 

                if( this.categorytype == ""){

                    this.categorytype = 0;

                    axios.get('/t/default')
                        .then(response => {

                            if( response.data.length < 10){

                                this.showLoadMore = 0;

                            }else{

                                this.showLoadMore = 1;

                            }

                            this.topics = response.data; 

                        });  

                }else{

                    $categorytype = this.categorytype;

                    if( $categorytype == 'colleges' ||  $categorytype == 'companies' || $categorytype == 'doctors' || $categorytype == 'fitnesscenters' || $categorytype == 'hotels' || $categorytype == 'lawyers' || $categorytype == 'schools') {
        
                            if( $categorytype == 'colleges'){
                                this.vPlaceholders = "Colleges / Institutes...";
                                this.vSearchName = "Search Colleges";
                                this.categorytypename = 'Colleges';
                            }
                            if( $categorytype == 'companies'){
                                this.vPlaceholders = "Companies..";
                                this.vSearchName = "Search Companies";
                                this.categorytypename = 'Companies';
                            } 
                            if( $categorytype == 'doctors'){
                                this.vPlaceholders = "Doctors / Hospitals...";
                                this.vSearchName = "Search Doctors / Hospitals";
                                this.categorytypename = 'Doctors';
                            }
                            if( $categorytype == 'fitnesscenters'){
                                this.vPlaceholders = "Fitness Centers...";
                                this.vSearchName = "Search Fitness Center";
                                this.categorytypename = 'Fitness Centers'; 
                            }
                            if( $categorytype == 'hotels'){
                                this.vPlaceholders = "Hotels...";
                                this.vSearchName = "Search Hotels";
                                this.categorytypename = 'Hotels'; 
                            }
                            if( $categorytype == 'lawyers'){
                                this.vPlaceholders = "Lawyers...";
                                this.vSearchName = "Search Lawyers";
                                this.categorytypename = 'Lawyers';
                            }
                            if( $categorytype == 'restaurants'){
                                this.vPlaceholders = "Restaurants...";
                                this.vSearchName = "Search Restaurants";
                                this.categorytypename = 'Restaurants';
                            }

                            if( $categorytype == 'schools'){
                                this.vPlaceholders = "Schools...";
                                this.vSearchName = "Search Schools";
                                this.categorytypename = 'Schools'; 
                            }

                            this.vCatName = $categorytype; 

                                axios.get('/t/d/categories' ,{

                            params: {
 
                                type: $categorytype, 

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.vCatType = 0;

                            this.topics = response.data

                        });
                    }else{

                        axios.get('/t/categories' ,{

                            params: {

                                categoryid : this.searchcategoryid, 

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMore = 0;

                                }else{

                                    this.showLoadMore = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 0;

                            this.topics = response.data

                        });

                    }

                }

                 

            },
            methods:{

                filteredtopics:function(event){


                    event.preventDefault();
                    this.showspinner = true;

                    if( this.vCat1 == 1){

                        axios.get('/st/filtered' ,{

                                params: {

                                    topics : this.searchquery, 
                                    categoryid : this.vCatId,

                                    }

                                })
                            .then(response => {

                                if( response.data.length < 10){

                                    this.showLoadMore = 0;

                                }else{

                                    this.showLoadMore = 1;
                                    
                                }

                                this.showspinner = false;

                                this.topics = response.data}); 

                    }else{

                        axios.get('/st/filtered' ,{

                                params: {

                                    topics : this.searchquery, 
                                    categoryid : 0,

                                    }

                                })
                            .then(response => {

                                if( response.data.length < 10){

                                    this.showLoadMore = 0;

                                }else{

                                    this.showLoadMore = 1;
                                    
                                }

                                this.showspinner = false;

                                this.topics = response.data});   
                    }

             
         
                },
                filteredcities:function(){ 

                    this.showspinner = true;
                    axios.get('/cities/get' ,{

                            params: {

                                city : this.citylist,  

                                }

                            })
                        .then(response => { 

                            this.showspinner = false;
                            this.cities = response.data

                        }); 
 
         
                },
                setcity:function(city){

                    var rowcity= this.cities.indexOf(city);
                    this.cityname = this.cities[rowcity].name;

                    this.citylist = this.cityname; 

                    axios.get('/t/d/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 
                                type: this.vCatName,
                                city: this.citylist,

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.topics = response.data

                        });

                },
                setcity2:function(cityname){ 

                    axios.get('/t/d/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 
                                type: this.vCatName,
                                city: cityname,
                                searchtype: this.vtype,
                                speciality: this.vspeciality,
                                country: this.vcountry,
                                locality: this.vlocality,


                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.vcity = cityname;

                            this.topics = response.data

                        });

                },
                settype:function(type){ 

                    this.type = type; 

                    axios.get('/t/d/categories' ,{

                            params: {
 
                                type: this.vCatName,
                                city: this.citylist,
                                searchtype: this.type, 
                                speciality: this.vspeciality,
                                country: this.vcountry,
                                locality: this.vlocality,

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.vtype = type;

                            this.topics = response.data;


                        });

                },
                setspeciality:function(speciality){ 

                    this.speciality = speciality.replace('/"/g',''); 

                    axios.get('/t/d/categories' ,{

                            params: {
 
                                type: this.vCatName,
                                city: this.citylist,
                                speciality: this.speciality,


                                searchtype: this.vtype, 
                                country: this.vcountry,
                                locality: this.vlocality,

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.vspeciality = speciality;

                            this.topics = response.data

                        });

                },
                setlocality:function(locality){

                    this.locality = locality;

                    axios.get('/t/d/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 
                                type: this.vCatName,
                                city: this.citylist,
                                locality: this.locality,


                                searchtype: this.vtype,
                                speciality: this.vspeciality,
                                country: this.vcountry, 

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.vlocality = locality;

                            this.topics = response.data

                        });

                },
                setcountry:function(country){

                    this.country = country;

                    axios.get('/t/d/categories' ,{

                            params: {
 
                                type: this.vCatName, 
                                country: this.country,


                                searchtype: this.vtype,
                                speciality: this.vspeciality, 
                                locality: this.vlocality,

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.vcountry = country;

                            this.topics = response.data

                        });

                },
                filteredcategoryname:function(){
 
                    event.preventDefault();
                    this.showspinner = true;
                    
                    axios.get('/t/d/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 
                                type: this.vCatName,
                                city: this.citylist,
                                search: this.searchcategoryname,

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.topics = response.data

                        });
                },
                categorysearch:function(row){ 


                    var rowcategory = this.categories.indexOf(row);

                    this.topmessage = false;

                    
                    this.citylist = "";
                    this.cities = [];

                    this.showspinner = true; 

                    this.vCat1 = 1; 

                    this.inpcategoryid = row["id"];

                    this.vCatName = row["category"]; 

                    this.vCatType = row["status"]; 

                    this.vCatId = this.inpcategoryid;

                    $newurl = '/category/' + this.vCatName;

                    window.history.pushState('obj', this.vCatName, $newurl.toLowerCase());

                    if(this.vCatName == 'Colleges'){
                        this.vPlaceholders = "Colleges / Institutes...";
                        this.vSearchName = "Search Colleges";
                    }
                    if(this.vCatName == 'Companies'){
                        this.vPlaceholders = "Companies..";
                        this.vSearchName = "Search Companies";
                    } 
                    if(this.vCatName == 'Doctors'){
                        this.vPlaceholders = "Doctors / Hospitals...";
                        this.vSearchName = "Search Doctors";
                    }
                    if(this.vCatName == 'Fitness Centers'){
                        this.vPlaceholders = "Fitness Centers...";
                        this.vSearchName = "Search Fitness Center";
                    }
                    if(this.vCatName == 'Hotels'){
                        this.vPlaceholders = "Hotels...";
                        this.vSearchName = "Search Hotels";
                    }
                    if(this.vCatName == 'Lawyers'){
                        this.vPlaceholders = "Lawyers...";
                        this.vSearchName = "Search Lawyers";
                    }
                    if(this.vCatName == 'Restaurants'){
                        this.vPlaceholders = "Restaurants...";
                        this.vSearchName = "Search Restaurants";
                    }

                    if(this.vCatName == 'Schools'){
                        this.vPlaceholders = "School...";
                        this.vSearchName = "Search Schools";
                    }

                    // vCatType = 0 means specialized categories like doc, hotels 

                    if(this.vCatType < 1){

                        axios.get('/t/d/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 
                                type: this.vCatName,

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1;

                            this.topics = response.data

                        });
                    }else{

                        axios.get('/t/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMore = 0;

                                }else{

                                    this.showLoadMore = 1;
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 0;

                            this.topics = response.data

                        });
                    }

                },
                categorytopicsearch:function(row){ 

                    var rowtopics = this.topics.indexOf(row); 

                    this.vCat1 = 1;

                    this.inpcategoryid = this.topics[rowtopics].category_id; 

                    this.vCatId = this.inpcategoryid;

                    this.showspinner = true;

                    axios.get('/t/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMore = 0;

                                }else{

                                    this.showLoadMore = 1;
                                    
                                }

                            this.showspinner = false;

                            this.topics = response.data;
                        });

                },
                clear:function($type){

                    if( $type == "locality"){
                        this.vlocality = "";
                    }
                    if( $type == "city"){
                        this.vcity = "";
                    }
                    if( $type == "country"){
                        this.vcountry = "";
                    }
                    if( $type == "category"){
                        this.vCatTopics = "";
                    }
                    if( $type == "speciality"){
                        this.vspeciality = "";
                    }
                    if( $type == "type"){
                        this.vtype ="";
                    }

                    axios.get('/t/d/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 
                                type: this.vCatName,
                                city: this.citylist,
                                locality: this.vlocality,
                                searchtype: this.vtype,
                                speciality: this.vspeciality,
                                country: this.vcountry, 

                                }

                            })
                        .then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMoreCategory = 0;

                                }else{

                                    this.showLoadMoreCategory = 1;
                                    
                                    
                                }

                            this.showspinner = false;

                            this.vCatTopics = 1; 
                            this.topics = response.data

                        });
                },
                clearfilter:function(event){
                    event.preventDefault();
                    this.vCat1 = 0;
                    this.vCatTopics = 0;
                    this.vCatType = 1;
                    this.citylist = "";
                    this.cities = [];

                    this.showspinner = true;

                    window.history.pushState('obj', '','/');

                    axios.get('/st/filtered' ,{

                                params: {

                                    topics : this.searchquery, 
                                    categoryid : 0,

                                    }

                                })
                            .then(response => {

                                if( response.data.length < 10){

                                    this.showLoadMore = 0;

                                }else{

                                    this.showLoadMore = 1;
                                    
                                }

                            this.showspinner = false;

                            this.topics = response.data;});   
                },
                morerows:function(){

                    this.row_count = this.row_count + 10;

                    axios.get('/st/getmore' ,{

                            params: {
                              row_count: this.row_count,
                            }

                        }).then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMore = 0;

                                }else{

                                    this.showLoadMore = 1;
                                    
                                }

                            for (var i = 0;  i <= response.data.length - 1; i++ ) {

                                this.topics.push({

                                        id : response.data[i].id, 
                                        user_code : response.data[i].user_code, 
                                        url : response.data[i].url, 
                                        user_id : response.data[i].user_id, 
                                        topic_name : response.data[i].topic_name, 
                                        details : response.data[i].details, 
                                        category : response.data[i].category, 
                                        category_id : response.data[i].category_id, 
                                        name : response.data[i].name, 
                                        profilepic : response.data[i].profilepic, 
                                        video : response.data[i].video, 
                                        created_at : response.data[i].created_at, 
                                        comments : response.data[i].comments,

                                    });
                            }                       

                        });
                     
                },
                morerowscategory:function(){ 

                    this.row_count_category = this.row_count_category + 10;


                    axios.get('/st/d/getmore' ,{

                            params: {
                              row_count_category: this.row_count_category,
                              type: this.vCatName, 
                              city: this.citylist,
                              search: this.searchcategoryname,
                              locality: this.vlocality,
                              speciality : this.vspeciality,
                              country: this.vcountry,

                            }

                        }).then(response => {

                            if( response.data.length < 10){

                                    this.showLoadMore = 0;

                                }else{

                                    this.showLoadMore = 1;
                                    
                                }

                            for (var i = 0;  i <= response.data.length - 1; i++ ) {

                                this.topics.push({

                                        id : response.data[i].id,  
                                        url : response.data[i].url,  
                                        name : response.data[i].name, 
                                        speciality : response.data[i].speciality, 
                                        address : response.data[i].address, 
                                        type : response.data[i].type, 
                                        locality : response.data[i].locality, 
                                        city : response.data[i].city,  
                                        country : response.data[i].country, 
                                        qualification : response.data[i].qualification, 
                                        created_at : response.data[i].created_at, 
                                        exp : response.data[i].exp,

                                    });
                            }                       

                        });
     

                    
                    
                }
            }

        })


    </script>

</body>
</html>