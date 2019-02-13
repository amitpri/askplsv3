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

    <meta name="google-site-verification" content="Egyom1onwFofLzu_ksa-hQECAvqCv86w4hIDLB7t-6Y" />

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
                    <form id="widget-subscribe-form"  target="#"  class="nobottommargin col-md-9 offset-md-2" style="margin-top:-60px; " >
                        <div class="input-group divcenter" v-if="vCatType > 0" >

                            <input   type="text" id="workspace" class="form-control form-control-lg not-dark" placeholder="Enter Topics..." style="border: 0; box-shadow: none; overflow: hidden;" v-model="searchquery"  @keyup="filteredtopics" >

                            <div class="col-md-4 col-lg-3">
                                <a @click="filteredtopics"  href="" class="button   btn-block" style="border-radius: 3px;">Search Topics</a>  
                            </div>
                             
                        </div> 

                    </form>  

                   <div class="row clearfix" style="margin-top:30px; "  >

                        <div class="col-md-2"> 
 
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                       
                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" >
                                <span class="navbar-toggler-icon"></span>
                              </button>

                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav flex-column"> 
                                    <a @click="clearfilter" v-if="vCat1 > 0" href="" style="margin-bottom: 20px;" v-cloak>Clear Filters</a> 

                               @foreach ($categories as $category)
 
                                   <li class="nav-item" >
                                    <a href="/g/category?type={{ $category->category}}" class="nav-link" href="#">{{ $category->category}}</a>
                                  </li>  

                                @endforeach  
 
                                   
                                </ul>
                              </div>
                            </nav>  
                                 
                        </div> 

                        <div class="col-lg-10 " > 

                            @if( $categorytype == '')

                                    @foreach ($topics as $topic)          

                                        <div  class="row"  style="margin-bottom: 10px;padding-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger"  >
                                             
                                            <div class="col-12 col-md-12"  >
                                                <div class="review-title">
                                                    <h4><a target="_blank" href="/t/{{ $topic->url}}" style="">{{ $topic->topic_name }}</a></h4>
                                                </div>
                                                <div class="review-content"> 
                                                    @isset($topic->profilepic)
                                                        <img  src="/storage/{{ $topic->profilepic }}"  width="100">
                                                    @endisset

                                                    @isset($topic->video)
                                                        <img  src="https://img.youtube.com/vi/{{ $topic->video }}/default.jpg"  width="100">
                                                    @endisset 
                                                   
                                                    <p>{!!html_entity_decode($topic->details)!!}</p>

                                                </div>
                                                <ul class="entry-meta clearfix">
                                                <li><i class="icon-calendar3"></i> {{ $topic->created_at }}</li>
                                                <li><a href="#" :href="'/p/' + topic.user_code"><i class="icon-user"></i> {{ $topic->name }}</a></li>
                                                <li><i class="icon-folder-open"></i> <a @click="categorytopicsearch(topic)"   href="#">{{ $topic->category }}</a> </li>
                                                <li v-if="topic.comments > 0"><a :href="'/t/' + topic.url"><i class="icon-comments"></i> {{ $topic->comments }} Reviews</a></li> 
                                            </ul>
                                            </div>
                                            
                                        </div>  

                                    @endforeach
     

                            @elseif ( $categorytype == 'colleges' )
     
                                    @foreach ($topics as $topic)

                                        <div  class="row"  style="margin-bottom: 10px;padding-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger"  >

                                            <div class="media" style="padding-top: 10px;"> 

                                                @isset($topic->profilepic)
                                                    <img  src="/storage/{{ $topic->profilepic }}"  width="100">
                                                @else
                                                    <img src="/no-image.png"  width="100" class="mr-3"> 
                                                @endisset 

                                                @isset($topic->video)
                                                        <img  src="https://img.youtube.com/vi/{{ $topic->video }}/default.jpg"  width="100">
                                                @endisset  

                                              <div class="media-body" style="margin-left: 20px;">
                                                <h4 class="mt-0"><a target="_blank" href="/c/{{$categorytype}}/{{$topic->url }}" style="">{{ $topic->name }}</a></h4> 
                                                <ul class="entry-meta clearfix">
                                                    <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();settype(topic.type)">{{ $topic->type}}</a> </li>
                                                    <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city, v)">{{ $topic->city}}</a>  </li>
                                                    <li><i class="icon-group"></i> <a href="" @click="event.preventDefault();setcountry(topic.country)">{{ $topic->country}}</a></li>
                                                
                                                </ul>
                                              </div>
                                            </div>  

                                        </div>

                                    @endforeach
                                         
                            @elseif ( $categorytype == 'companies' )
     
                                    @foreach ($topics as $topic)

                                        <div  class="row"  style="margin-bottom: 10px;padding-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger"  >

                                            <div class="media" style="padding-top: 10px;"> 

                                                @isset($topic->profilepic)
                                                    <img  src="/storage/{{ $topic->profilepic }}"  width="100">
                                                @else
                                                    <img src="/no-image.png"  width="100" class="mr-3"> 
                                                @endisset 

                                                @isset($topic->video)
                                                        <img  src="https://img.youtube.com/vi/{{ $topic->video }}/default.jpg"  width="100">
                                                @endisset   

                                              <div class="media-body" style="margin-left: 20px;">
                                                <h4 class="mt-0"><a target="_blank" href="/c/{{$categorytype}}/{{$topic->url }}" style="">{{ $topic->name }}</a></h4> 
                                                <ul class="entry-meta clearfix">
                                                    <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();settype(topic.type)">{{ $topic->type}}</a> </li>
                                                    <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city, v)">{{ $topic->city}}</a>  </li>
                                                    <li><i class="icon-group"></i> <a href="" @click="event.preventDefault();setcountry(topic.country)">{{ $topic->country}}</a></li>
                                                
                                                </ul>
                                              </div>
                                            </div>  

                                        </div>

                                    @endforeach
                                         
                            @endif 



                                    <div  class="row" style="float: right;"> {{ $topics->links() }}</div>


                        </div>

                    </div>

                </div> 

            </div>
            


        </section> 
        <footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">          

            <div class="line nomargin"></div>

            <div class="center">

                <a target="_blank" href="/companies">Companies</a> | <a target="_blank" href="/doctors">Doctors</a> | <a target="_blank" href="/hotels">Hotels</a> | <a target="_blank" href="/restaurants">Restaurants</a> | <a target="_blank" href="/schools">Schools</a> | <a target="_blank" href="/colleges">Colleges</a> |  <a target="_blank" href="/lawyers">Lawyers</a> |  <a target="_blank" href="/fitnesscenters">Fitness Centers</a>

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