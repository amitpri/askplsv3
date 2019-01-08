<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />

    <!-- Home Demo Specific Stylesheet -->
    <link rel="stylesheet" href="demos/interior-design/interior-design.css" type="text/css" />

    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!-- Reader's Blog Demo Specific Fonts -->
    <link rel="stylesheet" href="demos/interior-design/css/fonts.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/colors.php?color=1c85e8" type="text/css" />

    <script src="/vue/vue.min.js"></script>
        <script src="/axios/axios.min.js"></script>

    <!-- Document Title
    ============================================= -->
    <title>AskPls | Anonymous Review System</title>

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

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
        ============================================= -->
        <header id="header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <div class="row justify-content-xl-between justify-content-lg-between clearfix">

                        <div class="col-lg-2 col-12 d-flex align-self-center">
                            <!-- Logo
                            ============================================= -->
                            <div id="logo">
                                <a href="/" class="standard-logo"><img src="images/logo.png" alt="AskPls"></a>
                                <a href="/" class="retina-logo"><img src="images/logo@2x.png" alt="AskPls"></a>
                            </div><!-- #logo end -->

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center">
                            <!-- Primary Navigation
                            ============================================= -->
                            <nav id="primary-menu" class="with-arrows fnone clearfix">
                                <ul> 
                                    <li><a href="/about"><div>About AskPls</div></a></li>
                                    <li><a href="/topics"><div>Topics</div></a></li>  
                                    <li><a href="/faqs"><div>FAQs</div></a></li>
                                    <li><a href="/contact"><div>Contact</div></a></li>
                                </ul>
                            </nav><!-- #primary-menu end -->
                        </div>

                        @if (Route::has('login'))
                            @if (Auth::check())
                                <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin">
                                    <!-- Top Search
                                    ============================================= -->
                                    <div id="side-panel-trigger"  > 
                                        
                                        <a href="/portal" class="d-none d-lg-block">Portal <i class="icon-line-arrow-right"></i></a>
                                    </div><!-- #top-search end -->
                                </div> 
                            @else
                                <div class="col-lg-2 d-none d-lg-inline-flex d-xl-inline-flex justify-content-end nomargin">
                                    <!-- Top Search
                                    ============================================= -->
                                    <div id="side-panel-trigger" class="side-panel-trigger">
                                        <a href="#" class="d-block d-lg-none"><i class="icon-line-lock"></i></a>
                                        
                                        <a href="#" class="d-none d-lg-block">Sign In <i class="icon-line-arrow-right"></i></a>
                                    </div><!-- #top-search end -->
                                </div>                           
                            @endif
                        @endif
                        
                        <a href="#" class="d-block d-lg-none mobile-side-panel side-panel-trigger"><i class="icon-line-arrow-right"></i></a>
                    </div>
                </div>

            </div>

        </header><!-- #header end -->

        <!-- Page Title
        ============================================= -->
 

        <!-- Content
        ============================================= -->
        <section  id="topicsdetails">

            <div class="content-wrap clearfix">

                <div class="container">
                    <form id="widget-subscribe-form"   class="nobottommargin col-md-9 offset-md-2" style="margin-top:-60px; " >
                        <div class="input-group divcenter">
                            <input   type="text" id="workspace" name="workspace" class="form-control form-control-lg not-dark" placeholder="Search Topics..." style="border: 0; box-shadow: none; overflow: hidden;" v-model="searchquery"  @keyup="filteredtopics" >
                            <button type="submit" class="button " style="border-radius: 3px;">Search</button>  
                             
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
                                    <a @click="clearfilter" v-if="vCat1 > 0" href="" style="margin-bottom: 20px;">Clear Filters</a> 

                                  <li class="nav-item" v-for="category in categories">
                                    <a @click="categorysearch(category)" class="nav-link" href="#">@{{ category.category}}</a>
                                  </li> 
                                   
                                </ul>
                              </div>
                            </nav> 
                                 
                        </div>  
                        <div class="col-lg-10 ">
                            <div class="row" v-for="topic in topics" style="margin-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger" v-cloak >
                                <div class="col-12 col-md-3">
                                    <div class="review-company">
                                            <h6 style="font-weight: normal;"><a  class="nav-link" target="_blank" :href="'/viewprofile/' + topic.user_code">@{{ topic.name }}</a></h6> 
                                    </div>
                                    <div class="review-id">
                                            <h6 style="font-weight: normal;"><a class="nav-link" @click="categorytopicsearch(topic)"  href="#" >@{{ topic.category }}</a></h6></div>
                                    
                                    <div class="review-date">
                                        @{{ topic.updated_at }}<br> 
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/topics/' + topic.url" style="">@{{ topic.topic_name }}</a></h4>
                                    </div>
                                    <div class="review-content"> 
                                        <img  v-if="topic.image" :src="'/storage/' + topic.image"  max-width="640">
                                        <img  v-if="topic.video" :src="'https://img.youtube.com/vi/' + topic.video + '/default.jpg'">
                                        <h6 v-html="topic.details">  </h6>
                                    </div>
                                </div>
                            </div> 
                        </div> 

                    </div>

                </div>

            </div>

            <div class="center"><button class="btn btn-primary" @click="morerows">Load More</button></div>

        </section><!-- #content end -->

 
        <!-- Footer
        ============================================= -->
        <footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">          

            <div class="line nomargin"></div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights" class="" style="background-color: #FFF">

                <div class="container clearfix">

                    <div class="col_full center nomargin">
                        <span>Copyrights &copy; 2019 All Rights Reserved by AskPls.</span>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
    ============================================= -->
    <script src="../../js/jquery.js"></script>
    <script src="../../js/plugins.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="../../js/functions.js"></script>

    <script>
    
        const topicsdetails = new Vue({

            el : '#topicsdetails',
            data : {
                id:"", 
                inpId: "", 
                topic: "",
                topics: [],
                inpKey:"", 
                searchquery : "",
                row_count : 0,
                category : "",
                categories: [], 
                inpCategoryId : "",
                vCat1 : "", 
                vCatId : "",
            },
            mounted:function(){ 

                axios.get('/topics/default')
                .then(response => {

                    this.topics = response.data; 

                }); 

                axios.get('/categories/default')
                .then(response => {

                    this.categories = response.data; 

                }); 

            },
            methods:{

                filteredtopics:function(){

                    
                    if( this.vCat1 == 1){

                        axios.get('/showtopics/filtered' ,{

                                params: {

                                    topics : this.searchquery, 
                                    categoryid : this.vCatId,

                                    }

                                })
                            .then(response => {this.topics = response.data}); 

                    }else{

                        axios.get('/showtopics/filtered' ,{

                                params: {

                                    topics : this.searchquery, 
                                    categoryid : 0,

                                    }

                                })
                            .then(response => {this.topics = response.data});   
                    }

             
         
                },
                categorysearch:function(row){

                    var rowcategory = this.categories.indexOf(row);

                    this.vCat1 = 1; 

                    this.inpcategoryid = this.categories[rowcategory].id;

                    this.vCatId = this.inpcategoryid;

                    axios.get('/topics/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 

                                }

                            })
                        .then(response => {this.topics = response.data});

 

                },
                categorytopicsearch:function(row){ 

                    var rowtopics = this.topics.indexOf(row); 

                    this.vCat1 = 1;

                    this.inpcategoryid = this.topics[rowtopics].category_id; 

                    this.vCatId = this.inpcategoryid;

                    axios.get('/topics/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 

                                }

                            })
                        .then(response => {this.topics = response.data});

                },
                clearfilter:function(event){
                    event.preventDefault();
                    this.vCat1 = 0;

                    axios.get('/showtopics/filtered' ,{

                                params: {

                                    topics : this.searchquery, 
                                    categoryid : 0,

                                    }

                                })
                            .then(response => {this.topics = response.data});   
                },
                morerows:function(){

                    this.row_count = this.row_count + 10;

                    axios.get('/showtopics/getmore' ,{

                            params: {
                              row_count: this.row_count,
                            }

                        }).then(response => {

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
                                        image : response.data[i].image, 
                                        video : response.data[i].video, 

                                    });
                            }                       

                        });
     

                    
                    
                }
            }

        })


    </script>

</body>
</html>