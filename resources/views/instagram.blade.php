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

    <script async src="https://www.instagram.com/embed.js"></script> 
 
    <style>
     span.twitter-typeahead .tt-menu {
          cursor: pointer;
        }

        .dropdown-menu, span.twitter-typeahead .tt-menu {
          position: absolute;
          top: 100%;
          left: 0;
          z-index: 1000;
          display: none;
          float: left;
          min-width: 160px;
          padding: 5px 0;
          margin: 2px 0 0;
          font-size: 1rem;
          color: #373a3c;
          text-align: left;
          list-style: none;
          background-color: #fff;
          background-clip: padding-box;
          border: 1px solid rgba(0, 0, 0, 0.15);
          border-radius: 0.25rem; }

        span.twitter-typeahead .tt-suggestion {
          display: block;
          width: 100%;
          padding: 3px 20px;
          clear: both;
          font-weight: normal;
          line-height: 1.5;
          color: #373a3c;
          text-align: inherit;
          white-space: nowrap;
          background: none;
          border: 0; }
        span.twitter-typeahead .tt-suggestion:focus, .dropdown-item:hover, span.twitter-typeahead .tt-suggestion:hover {
            color: #2b2d2f;
            text-decoration: none;
            background-color: #f5f5f5; }
        span.twitter-typeahead .active.tt-suggestion, span.twitter-typeahead .tt-suggestion.tt-cursor, span.twitter-typeahead .active.tt-suggestion:focus, span.twitter-typeahead .tt-suggestion.tt-cursor:focus, span.twitter-typeahead .active.tt-suggestion:hover, span.twitter-typeahead .tt-suggestion.tt-cursor:hover {
            color: #fff;
            text-decoration: none;
            background-color: #0275d8;
            outline: 0; }
        span.twitter-typeahead .disabled.tt-suggestion, span.twitter-typeahead .disabled.tt-suggestion:focus, span.twitter-typeahead .disabled.tt-suggestion:hover {
            color: #818a91; }
        span.twitter-typeahead .disabled.tt-suggestion:focus, span.twitter-typeahead .disabled.tt-suggestion:hover {
            text-decoration: none;
            cursor: not-allowed;
            background-color: transparent;
            background-image: none;
            filter: "progid:DXImageTransform.Microsoft.gradient(enabled = false)"; }
        span.twitter-typeahead {
          width: 100%; }
          .input-group span.twitter-typeahead {
            display: block !important; }
            .input-group span.twitter-typeahead .tt-menu {
              top: 2.375rem !important; }
    </style>

    @include('analytics')
 
    <title>Anonymous Review </title>

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
                        <form id="widget-subscribe-form"  target="#"  class="nobottommargin col-md-9 offset-md-2" 
                            style="margin-top:-60px; " >
                            <div class="input-group divcenter"   >

                                <input type="text" id="workspace" class="form-control form-control-lg not-dark search-input" placeholder="Enter Topics..." style="border: 0; box-shadow: none; overflow: hidden;"  >

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

                                     
                                </ul>
                              </div>
                            </nav>  
                                 
                        </div> 

                        <div class="col-lg-10 " > 

                            

                    <div class="col_full nobottommargin clearfix"> 

                        <div class="masonry-thumbs grid-6"  >

                            @foreach ($topics as $topic)  

                                <blockquote class="instagram-media" data-instgrm-permalink="{{ $topic->instagram }}" data-instgrm-version="9" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style="   display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> </div></blockquote> 

                                <div class="divider"><i class="icon-circle"></i></div>

                            @endforeach
                                
                        </div>
                        
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

    <script src="https://askpls.com/typeahead.bundle.js"></script>

    <script>
        jQuery(document).ready(function($) { 
            
            var engine = new Bloodhound({
                remote: {
                    url: '/st/filtered?&topics=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            var enginecity = new Bloodhound({
                remote: {
                    url: '/cities/get?city=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            

            $(".search-input").typeahead({
                hint: true,
                highlight: false,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                displayKey: "topic_name",

                name: 'usersList',
            
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown" style="margin-top:-20px; width:1000px"><div class="list-group-item">No Data Found</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown style="margin-top:-20px; color:black;">'
                    ],
                    suggestion: function (data) {
 
                        v0 = data.topic_name;
                        v1 = data.created_at;
                        v2 = data.name;
                        v3 = data.category;
                        v4 = data.comments;


                        url = data.url + '/' + data.topic_name.replace(/ /g,'_'); 

                        if( data.topic_name == null){
                             v0 = "";
                        }else{
                            v0 =   v0  ;
                        }

                        if( data.created_at == null){
                             v1 = "";
                        }else{
                            v1 = " | " + v1;
                        }

                        if( data.name == null){
                             v2 = "";
                        }else{
                            v2 = " | " + v2;

                        }
                        if( data.category == null){
                             v3 = "";
                        }else{
                            v3 = " | " + v3;

                        }
                        if( (data.comments == null) || (data.comments == 0)){
                            v4 = "";
                        }else{
                            v4 = " | " + v4 + " Reviews";

                        }

                        return `
                                <a href="/t/` +   url + `" class="list-group-item list-group-item-action flex-column align-items-start ">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1 text-primary" > ` + v0 + `</h5>
                                      
                                    </div>  
                                    <small class="text-secondary">` + v1 + v2  +  v3  +   v4 +`</small>
                                  </a>
                                  <br>
                                  <br>

                                 `                     
              }
                }
            });

            $(".search-input-city").typeahead({
                hint: true,
                highlight: false,
                minLength: 1
            }, {
                source: enginecity.ttAdapter(),

                displayKey: "name",

                name: 'usersList',
            
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown" style="margin-top:-20px; width:1000px"><div class="list-group-item">No Data Found</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown style="margin-top:-20px; color:black;">'
                    ],
                    suggestion: function (data) {
                        
                        v0 = data.name;

                        return `
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                    <div class="d-flex w-100 justify-content-between">
                                      <h5 class="mb-1 text-primary" > ` + v0 + `</h5>
                                      
                                    </div>  
                                    
                                  </a>
                                  <br>
                                  <br>

                                 `                     
              }
                }
            }); 
        });
 

    </script>
 

   <script>
    function onChangeCity() { 

      var selectedcity = document.getElementById("searchcity").value; 

      if(selectedcity != ""){

        document.getElementById("searchcategory").disabled = false;
      }
      if(selectedcity == ""){

        document.getElementById("searchcategory").disabled = true;
      }

      var enginecategory = new Bloodhound({
                remote: {
                    url: '/t/d/categories?&city=' + selectedcity + '&search=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

          $(".search-input-category").typeahead({
                    hint: true,
                    highlight: false,
                    minLength: 1
                }, {
                    source: enginecategory.ttAdapter(),

                    displayKey: "name",

                    name: 'usersList',
                
                    templates: {
                        empty: [
                            '<div class="list-group search-results-dropdown" style="margin-top:-20px; width:1000px"><div class="list-group-item">No Data Found</div></div>'
                        ],
                        header: [
                            '<div class="list-group search-results-dropdown style="margin-top:-20px; color:black;">'
                        ],
                        suggestion: function (data) {

                        v0 = data.name;  
                        v0_changed = v0.replace(/ /g,'_');
                        v1 = data.locality;
                        v2 = data.profilepic; 
 

                        if( data.locality == null){
                             v1 = "";
                        } 

                        if( data.profilepic == null){
                             v2 = "<img src='/no-image.png'  width='40' class='mr-3'>";
                        }else{
                            v2 = "<img src='/storage/" + data.profilepic + "'  width='40' class='mr-3'>";

                        }
                       

                            return `
                                    <a href="/c/` +  data.url + `/` + v0_changed + `" class="list-group-item list-group-item-action flex-column align-items-start ">
                                        <div class="d-flex w-100 justify-content-between">
                                          <h5 class="mb-1 text-primary" > ` + v0 + `</h5>
                                          
                                        </div>  
                                         ` + v2 +`
                                        <small class="text-secondary">` + v1 +`</small>
                                        
                                      </a>
                                      <br>
                                      <br>

                                     `                     
                        }
                    }
                });
       
    }

    function onChangeCity2() { 

      var selectedcity2 = document.getElementById("searchcity").value; 


      var enginecategory_city2 = new Bloodhound({
                remote: {
                    url: '/t/d/categories?&city=' + selectedcity2 + '&search=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

          $(".search-input-category2").typeahead({
                    hint: true,
                    highlight: false,
                    minLength: 1
                }, {
                    source: enginecategory_city2.ttAdapter(),

                    displayKey: "name",

                    name: 'usersList',
                
                    templates: {
                        empty: [
                            '<div class="list-group search-results-dropdown" style="margin-top:-20px; width:1000px"><div class="list-group-item">No Data Found</div></div>'
                        ],
                        header: [
                            '<div class="list-group search-results-dropdown style="margin-top:-20px; color:black;">'
                        ],
                        suggestion: function (data) {

                        v0 = data.name;  
                        v0_changed = v0.replace(/ /g,'_');
                        v1 = data.locality;
                        v2 = data.profilepic; 
 

                        if( data.locality == null){
                             v1 = "";
                        } 

                        if( data.profilepic == null){
                      //       v2 = "<img src='/no-image.png'  width='40' class='mr-3'>";
                            v2 = "";
                        }else{
                            v2 = "<img src='/storage/" + data.profilepic + "'  width='40' class='mr-3'>";

                        }
                       

                            return `
                                    <a href="/c/` +  data.url + `/` + v0_changed + `" class="list-group-item list-group-item-action flex-column align-items-start ">
                                        <div class="d-flex w-100 justify-content-between">
                                          <h5 class="mb-1 text-primary" > ` + v0 + `</h5>
                                          
                                        </div>  
                                         ` + v2 +`
                                        <small class="text-secondary">` + v1 +`</small>
                                        
                                      </a>
                                      <br>
                                      <br>

                                     `                     
                        }
                    }
                });
       
    }
    </script>

    <script>
    jQuery(document).ready(function($) {  


      var enginecategory2 = new Bloodhound({
                remote: {
                    url: '/t/d/categories?&search=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

          $(".search-input-category2").typeahead({
                    hint: true,
                    highlight: false,
                    minLength: 1
                }, {
                    source: enginecategory2.ttAdapter(),

                    displayKey: "name",

                    name: 'usersList',
                
                    templates: {
                        empty: [
                            '<div class="list-group search-results-dropdown" style="margin-top:-20px; width:1000px"><div class="list-group-item">No Data Found</div></div>'
                        ],
                        header: [
                            '<div class="list-group search-results-dropdown style="margin-top:-20px; color:black;">'
                        ],
                        suggestion: function (data) {

                        v0 = data.name;  
                        v0_changed = v0.replace(/ /g,'_');

                        v1 = data.locality;
                        v2 = data.profilepic; 
 

                        if( data.locality == null){
                             v1 = "";
                        } 

                        if( data.profilepic == null){
                             v2 = "<img src='/no-image.png'  width='40' class='mr-3'>";
                        }else{
                            v2 = "<img src='/storage/" + data.profilepic + "'  width='40' class='mr-3'>";

                        }
                       

                            return `
                                    <a href="/c/` +  data.url + `/` + v0_changed + `" class="list-group-item list-group-item-action flex-column align-items-start ">
                                        <div class="d-flex w-100 justify-content-between">
                                          <h5 class="mb-1 text-primary" > ` + v0 + `</h5>
                                          
                                        </div>  
                                         ` + v2 +`
                                        <small class="text-secondary">` + v1 +`</small>
                                        
                                      </a>
                                      <br>
                                      <br>

                                     `                     
                        }
                    }
                });
       
    })
    </script>

</body>
</html>