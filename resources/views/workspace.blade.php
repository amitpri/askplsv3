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

    <!-- Home Demo Specific Stylesheet -->
    <link rel="stylesheet" href="demos/interior-design/interior-design.css" type="text/css" />

    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />  

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
                                <a href="/" class="standard-logo"><img src="images/logo.png" alt="Canvas Logo"></a>
                                <a href="/" class="retina-logo"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
                            </div><!-- #logo end -->

                        </div>

                        <div class="col-lg-8 col-12 d-xl-flex d-lg-flex justify-content-xl-center justify-content-lg-center">
                            <!-- Primary Navigation
                            ============================================= -->
                            <nav id="primary-menu" class="with-arrows fnone clearfix">

                                <ul> 
                                    <li><a href="/"><div>Home</div></a></li> 
                                    <li><a href="/topics"><div>Topics</div></a></li> 
                                    <li><a href="/about"><div>About AskPls</div></a></li> 
                                    <li><a href="/prices"><div>Prices</div></a></li> 
                                    <li><a href="/support"><div>Support</div></a></li>
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

        <!-- Slider
        ============================================= -->
        <section  class="slider-element clearfix" style="height: 500px; margin-top:60px;     ">
            <div id="workspace" class="vertical-middle">
                <div class="container clearfix">

                    <div class="clearfix center divcenter" style="max-width: 800px;">
                        <div class="emphasis-title">
                            <h1 class="font-secondary" style="color: black; font-size: 42px;    ">Create Workspace </h1>
                            <p style="font-weight: 300; opacity: .7; color: black;  ">Get genuine anonymous Feedback from your team and improve your productivity</p>
                        </div>
       
                        <form id="widget-subscribe-form" action="/register" role="form" method="get" class="nobottommargin"  >
                            <div class="input-group divcenter">
                                <input @keyup="find" v-model="inpWorkspace" type="text" id="workspace" name="workspace" class="form-control form-control-lg not-dark" placeholder="Enter workspace name.." style="border: 0; box-shadow: none; overflow: hidden;">
                                <button type="submit" class="button " style="border-radius: 3px;">Search</button>  
                                 
                            </div>
                        </form>

                        <br>

                        <table class="table"  v-if="showresult">
                          <thead>
                            <tr> 
                              <th scope="col">Workspace Name</th>
                              <th scope="col">&nbsp;</th> 
                            </tr>
                          </thead>
                          <tbody v-if="workspaceLists.length  > 0">
                            <tr v-for="workspaceList in workspaceLists"> 
                              <td>@{{ workspaceList.workspace }}</td>
                              <td><a :href="'/workspace/join/' + workspaceList.id + '/' + workspaceList.workspace">Join</a></td> 
                            </tr>  
                          </tbody>
                          <tbody v-else>
                            <tr> 
                              <td>@{{ inpWorkspace }}</td>
                              <td><a :href="'/workspace/create?name=' + inpWorkspace">Create</a></td>
                            </tr>  
                          </tbody>
                        </table>

            
                      
                    </div>

                </div>
            </div>

        </section>

        <!-- Content
        ============================================= -->
   

        <!-- Footer
        ============================================= -->
        <footer id="footer" class="topmargin noborder" style="background-color: #F5F5F5;">

          

            <div class="line nomargin"></div>

            <!-- Copyrights
            ============================================= -->
            <div id="copyrights" class="" style="background-color: #FFF">

                <div class="container clearfix">

                    <div class="col_full center nomargin">
                        <span>Copyrights &copy; 2018 All Rights Reserved by AskPls.</span>
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
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="js/functions.js"></script>
    <script>
        
        new Vue({
            el: '#workspace',
            data: {
                inpWorkspace  : "", 
                workspaceLists : [],
                workspaceList : "",
                 
                disableaddbutton: false, 
                showresult : false,
                
            }, 
            methods: {

                find:function(){

                    this.showresult = true;
                    axios.get('/workspace/find' ,{

                        params: {

                            workspace: this.inpWorkspace,

                            }

                        })
                    .then(response => {

                        this.workspaceLists = response.data;
                        
                    });

                },
                    
            }
        });

    </script>
</body>
</html>