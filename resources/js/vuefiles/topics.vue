 
const topicsdetails = new Vue({

    el : '#topicsdetails',
    data : {
        categorytype: "{!! $categorytype !!}",
        searchcategoryid: "{!! $searchcategoryid !!}" ,
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

            this.inpcategoryid = row["id"];

            this.vCatName = row["category"]; 

            this.vCatType = row["status"]; 

            this.vCatId = this.inpcategoryid;

            $newurl = '/cat/' + this.vCatName;

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

 