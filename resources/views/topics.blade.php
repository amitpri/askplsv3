<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="AskPls" />

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Playfair+Display:700,700i,900" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />  
    <link rel="stylesheet" href="askpls.css" type="text/css" />

    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" /> 
 
    <link rel="stylesheet" href="askplsfonts.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/colors.php?color=1c85e8" type="text/css" />

    <script src="/vue/vue.min.js"></script>
    <script src="/axios/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/places.js@1.15.4"></script>

    @include('analytics')
 
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
 
    <div id="wrapper" class="clearfix">
 
        <header id="header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <div class="row justify-content-xl-between justify-content-lg-between clearfix">

                        <div class="col-lg-2 col-12 d-flex align-self-center"> 
                            <div id="logo">
                                <a href="/" class="standard-logo"><img src="images/logo.png" alt="AskPls"></a>
                                <a href="/" class="retina-logo"><img src="images/logo@2x.png" alt="AskPls"></a>
                            </div> 

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center"> 
                            <nav id="primary-menu" class="with-arrows fnone clearfix">
                                <ul> 
                                    <li><a href="/about"><div>About AskPls</div></a></li>
                                    <li><a href="/t"><div>Topics</div></a></li>  
                                    <li><a href="/faqs"><div>FAQs</div></a></li>
                                    <li><a href="/contact"><div>Contact</div></a></li>
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

                            <input   type="text" id="workspace" class="form-control form-control-lg not-dark" placeholder="Search Topics..." style="border: 0; box-shadow: none; overflow: hidden;" v-model="searchquery"  @keyup="filteredtopics" >
                            <a @click="filteredtopics"  href="" class="button " style="border-radius: 3px;">Search Topics</a>  
                             
                        </div>

                        <div class="input-group divcenter" v-if="vCatType < 1" >

                            <input   type="search" id="address-input" class="form-control form-control-lg not-dark" placeholder="Enter City..." style="border: 0; box-shadow: none; overflow: hidden; font-size:16px;" v-model="citylist"  @keyup="filteredcities" >

                            <input   type="text" id="workspace" class="form-control form-control-lg not-dark" :placeholder="vPlaceholders" style="border: 0; box-shadow: none; overflow: hidden; font-size:16px;" v-model="searchcategoryname"  @keyup="filteredcategoryname" >
                            <a @click="filteredtopics"  href="" class="button " style="border-radius: 3px;">@{{ vSearchName}}</a>  
                             
                        </div>

                        <div class="input-group divcenter" v-if="vCatType < 1" >

                           <div v-for="city in cities">
                               <li style=" list-style: none;">  
                                <a href="#" @click="event.preventDefault();setcity(city)">@{{city.name}}&nbsp;  </a></li> 
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
                                    <a @click="clearfilter" v-if="vCat1 > 0" href="" style="margin-bottom: 20px;">Clear Filters</a> 

                                  <li class="nav-item" v-for="category in categories">
                                    <a @click="categorysearch(category)" class="nav-link" href="#">@{{ category.category}}</a>
                                  </li> 
                                   
                                </ul>
                              </div>
                            </nav> 
                                 
                        </div>  
                        <div class="col-lg-10 " v-if="vCatTopics == 0">
                            <div v-show="showspinner" class="text-center"><img src="/ajax_loader.gif"></div>
                            <div  class="row" v-for="topic in topics" style="margin-bottom: 10px;padding-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger" v-cloak >
                                 
                                <div class="col-12 col-md-12"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/t/' + topic.url" style="">@{{ topic.topic_name }}</a></h4>
                                    </div>
                                    <div class="review-content"> 
                                        <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100">
                                        <img  v-if="topic.video" :src="'https://img.youtube.com/vi/' + topic.video + '/default.jpg'">

                                        <p  v-html="topic.details"></p>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> @{{ topic.created_at }}</li>
                                    <li><a href="#" :href="'/p/' + topic.user_code"><i class="icon-user"></i> @{{ topic.name }}</a></li>
                                    <li><i class="icon-folder-open"></i> <a @click="categorytopicsearch(topic)"   href="#">@{{ topic.category }}</a> </li>
                                    <li v-if="topic.comments > 0"><a :href="'/t/' + topic.url"><i class="icon-comments"></i> @{{ topic.comments }} Reviews</a></li> 
                                </ul>
                                </div>
                                
                            </div> 
                        </div> 

                        <div class="col-lg-10 " v-if="vCatTopics == 1">
                            <div  class="row" v-for="topic in topics" style="margin-bottom: 10px;padding-bottom: 10px; min-height: 120px; border: 1px solid #F2E7E5;border-radius: 5px;" class="border border-danger" v-cloak >
                                 
                                <div class="col-12 col-md-12" v-if="vCatName == 'Colleges'"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url" style="">@{{ topic.name }}  <h6> </h6></a></h4>
                                    </div>
                                    <div class="review-content"> 
                                        <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100"> 
 
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type}}</a> </li>
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city}}</a>  </li>
                                        <li><i class="icon-group"></i> <a href="" @click="event.preventDefault();setcountry(topic.country)">@{{ topic.country}}</a></li>
                                    
                                    </ul>
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Doctors'"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url" style="">@{{ topic.name }}</a></h4> 
                                    </div>
                                    <div class="review-content">  

                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100">  
                                    
 
                                    </div>
                                    <div v-if="topic.profilepic"  class="" style=" ">  
                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.qualification}}  |  @{{ topic.exp}} yrs exp. </p>  

                                    </div>
                                    <div v-else class="" style="margin-top: -20px;">  
                                        <p style="font-weight: 400; opacity: 0.8;   ">@{{ topic.qualification}}  |  @{{ topic.exp}} yrs exp. </p>  

                                    </div>
                                     <ul class="entry-meta clearfix">
                                      
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setspeciality(topic.speciality)">@{{ topic.speciality }}</a>  </li>
                                        <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)"> @{{ topic.locality }}</a></li>
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)"> @{{ topic.city }}</a></li> 
                                    
                                    </ul> 
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Companies'"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url" style="">@{{ topic.name }}</a></h4> 
                                    </div>
                                    <div class="review-content">  

                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100">  
                                    
                                    </div> 
                                     <ul class="entry-meta clearfix">
                                      
                                        <li v-if="topic.type"> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>   </li>
                                        <li v-if="topic.city"><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li>
                                        <li v-if="topic.country"> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcountry(topic.country)">@{{ topic.country }}</a> </li> 
                                    
                                    </ul> 
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Fitness Centers'"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url" style="">@{{ topic.name }}</a></h4> 
                                    </div>
                                    <div class="review-content">  

                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100">  
                                    
 
                                    </div>
                                    <div v-if="topic.profilepic"  class="" style=" ">  
                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.address}}    </p>  

                                    </div>
                                    <div v-else class="" style="margin-top: -20px;">  
                                        <p style="font-weight: 400; opacity: 0.8;   ">@{{ topic.address}}   </p>  

                                    </div>
                                     <ul class="entry-meta clearfix">
                                      
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>   </li>
                                        <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                    
                                    </ul> 
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Hotels'"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url" style="">@{{ topic.name }}</a></h4> 
                                    </div>
                                    <div class="review-content">  

                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100">  
                                    
 
                                    </div>  
                                     <ul class="entry-meta clearfix">
                                      
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>  </li>
                                        <li v-if="topic.locality"><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                    
                                    </ul> 
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Lawyers'"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url" style="">@{{ topic.name }}</a></h4> 
                                    </div>
                                    <div class="review-content">  

                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100">  
                                    
 
                                    </div>
                                    <div v-if="topic.profilepic"  class="" style=" ">  
                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.address}}    </p>  

                                    </div>
                                    <div v-else class="" style="margin-top: -20px;">  
                                        <p style="font-weight: 400; opacity: 0.8;   ">@{{ topic.address}}   </p>  

                                    </div>
                                     <ul class="entry-meta clearfix">
                                      
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setspeciality(topic.specialty)">@{{ topic.specialty }}</a>  </li>
                                        <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                    
                                    </ul> 
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Restaurants'"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url" style="">@{{ topic.name }}</a></h4> 
                                    </div>
                                    <div class="review-content">  

                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100">  
                                    
 
                                    </div>
                                    <div v-if="topic.profilepic"  class="" style=" ">  
                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.address}}   </p>  

                                    </div>
                                    <div v-else class="" style="margin-top: -20px;">  
                                        <p style="font-weight: 400; opacity: 0.8;   ">@{{ topic.address}}   </p>  

                                    </div>
                                     <ul class="entry-meta clearfix">
                                      
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>   </li>
                                        <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                    
                                    </ul> 
                                </div>

                                <div class="col-12 col-md-12" v-if="vCatName == 'Schools'"  >
                                    <div class="review-title">
                                        <h4><a target="_blank" :href="'/c/' +  vCatName  + '/'+ topic.url" style="">@{{ topic.name }}</a></h4> 
                                    </div>
                                    <div class="review-content">  

                                      <img  v-if="topic.profilepic" :src="'/storage/' + topic.profilepic"  width="100">  
                                    
 
                                    </div>
                                    <div v-if="topic.profilepic"  class="" style=" ">  
                                        <p style="font-weight: 400; opacity: 0.8;  " >@{{ topic.address}}    </p>  

                                    </div>
                                    <div v-else class="" style="margin-top: -20px;">  
                                        <p style="font-weight: 400; opacity: 0.8;   ">@{{ topic.address}}   </p>  

                                    </div>
                                     <ul class="entry-meta clearfix">
                                      
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();settype(topic.type)">@{{ topic.type }}</a>  </li>
                                        <li><i class="icon-calendar3"></i><a href="" @click="event.preventDefault();setlocality(topic.locality)">@{{ topic.locality }}</a> </li>
                                        <li> <i class="icon-user"></i><a href="" @click="event.preventDefault();setcity2(topic.city)">@{{ topic.city }}</a> </li> 
                                    
                                    </ul> 
                                </div>
                                
                            </div> 
                        </div> 

                    </div>

                </div>

            </div>

            <div v-if="vCatTopics == 0"><div   v-if="showLoadMore > 0"  class="center"><button class="btn btn-primary" @click="morerows">Load More Topics</button></div></div>

            <div v-if="vCatTopics > 0"><div   v-if="showLoadMoreCategory > 0"  class="center"><button class="btn btn-primary" @click="morerowscategory">Load More</button></div></div>

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
 
    <script src="../../js/jquery.js"></script>
    <script src="../../js/plugins.js"></script> 
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
            },
            mounted:function(){ 

                axios.get('/t/default')
                .then(response => {

                    if( response.data.length < 10){

                        this.showLoadMore = 0;

                    }else{

                        this.showLoadMore = 1;

                    }

                    this.topics = response.data; 

                }); 

                axios.get('/categories/default')
                .then(response => {

                    this.categories = response.data; 

                }); 

            },
            methods:{

                filteredtopics:function(){

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
                settype:function(type){ 

                    this.type = type; 

                    axios.get('/t/d/categories' ,{

                            params: {
 
                                type: this.vCatName,
                                city: this.citylist,
                                searchtype: this.type,

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
                setspeciality:function(speciality){ 

                    this.speciality = speciality; 

                    axios.get('/t/d/categories' ,{

                            params: {
 
                                type: this.vCatName,
                                city: this.citylist,
                                speciality: this.speciality,

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
                setlocality:function(locality){

                    this.locality = locality;

                    axios.get('/t/d/categories' ,{

                            params: {

                                categoryid : this.inpcategoryid, 
                                type: this.vCatName,
                                city: this.citylist,
                                locality: this.locality,

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
                setcountry:function(country){

                    this.country = country;

                    axios.get('/t/d/categories' ,{

                            params: {
 
                                type: this.vCatName, 
                                country: this.country,

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
                filteredcategoryname:function(){
 

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

                    this.showspinner = true;

                    this.vCat1 = 1; 

                    this.inpcategoryid = this.categories[rowcategory].id;

                    this.vCatName = this.categories[rowcategory].category; 

                    this.vCatType = this.categories[rowcategory].status; 

                    this.vCatId = this.inpcategoryid;

                    
                    if(this.vCatName == 'Colleges'){
                        this.vPlaceholders = "Enter College or Institute name..";
                        this.vSearchName = "Search Colleges";
                    }
                    if(this.vCatName == 'Companies'){
                        this.vPlaceholders = "Enter Company name..";
                        this.vSearchName = "Search Companies";
                    } 
                    if(this.vCatName == 'Doctors'){
                        this.vPlaceholders = "Enter Doctor or Hospital name";
                        this.vSearchName = "Search Doctors / Hospitals";
                    }
                    if(this.vCatName == 'Fitness Centers'){
                        this.vPlaceholders = "Enter Fitness Center name..";
                        this.vSearchName = "Search Fitness Center";
                    }
                    if(this.vCatName == 'Hotels'){
                        this.vPlaceholders = "Enter Hotel name..";
                        this.vSearchName = "Search Hotels";
                    }
                    if(this.vCatName == 'Lawyers'){
                        this.vPlaceholders = "Enter Lawyer name..";
                        this.vSearchName = "Search Lawyers";
                    }
                    if(this.vCatName == 'Restaurants'){
                        this.vPlaceholders = "Enter Restaurant name..";
                        this.vSearchName = "Search Restaurants";
                    }

                    if(this.vCatName == 'Schools'){
                        this.vPlaceholders = "Enter School name..";
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
                clearfilter:function(event){
                    event.preventDefault();
                    this.vCat1 = 0;
                    this.vCatTopics = 0;
                    this.vCatType = 1;

                    this.showspinner = true;


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