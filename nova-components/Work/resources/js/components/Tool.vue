<template>
    <div>
        <heading class="mb-6">Workspace Management</heading>

        <card class=" flex flex-col items-center justify-center" style="min-height: 200px">            

            <h2 class="text-black text-2xl text-90 font-light mb-6">
                Create Workspace
            </h2>
            <form id="widget-subscribe-form" action="/register" role="form" method="get" class="nobottommargin"  >

                <input @keyup="find" v-model="inpWorkspace" type="text"  id="workspace" name="workspace" 
                     style="width:500px; " class=" shadow appearance-none border rounded w-full py-4 px-8 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                     placeholder="Enter workspace name..min 3 chars.. max 50 chars"  >
               
            </form>
            </br>
            <table class="table"  v-if="showresult">
              <thead>
                <tr v-if="inpWorkspace.length > 2"> 
                  <th scope="col"><h4>Workspace Name</h4></th>
                  <th scope="col">&nbsp;</th> 
                </tr>
              </thead>
              <tbody v-if="workspaceLists.length  > 0">
                <tr v-for="workspaceList in workspaceLists"> 
                  <td>{{ workspaceList.workspace }}</td> 
                  <td><a @click.prevent="join(workspaceList.workspace , workspaceList.id )" :href="'/workspace/join/' + workspaceList.id + '/' + workspaceList.workspace" class="btn btn-default btn-primary">Join</a></td> 
                </tr>  
              </tbody>
              <tbody v-else>
                <tr v-if="inpWorkspace.length > 2"> 
                  <td>{{ inpWorkspace }}</td>
                  <td><a class="btn btn-default btn-primary" @click="createworkspace" :href="'/workspace/create?name=' + inpWorkspace">Create</a></td>
                </tr>  
              </tbody>
            </table>

            </card>

            </br>

            <card class=" flex flex-col items-center justify-center" style="min-height: 300px">

            <h2 v-if="topics.length < 1"  class="font-light">No workspace Created. You won't be able to use Private review feature of AskPls.</h2>

            <div v-if="topics.length > 0" >
                <div > 

                    <table  class="table w-full">
                        <thead>
                            <tr>
                                <th class="text-left">Workspace</th>
                                <th class="text-left">URL</th>
                                <th class="text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="topic in topics" >
                                <td>{{ topic.workspace }}</td>
                                <td>{{ topic.url }}</td> 
                                <td><a class="btn btn-default btn-primary " href="/join">Use</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </card>
    </div>
</template>

<script>
export default {

    data: () => {
        return {

            id:"", 
            inpId: "", 
            topic: "",
            topics: [],
            inpWorkspace  : "", 
            workspaceLists : [],
            workspaceList : "",
            workspacejoined : "",
            joinstatus : "", 
            disableaddbutton: false, 
            showresult : false,
            workspaceid : "",

            } 
        },
    mounted() {
        axios.get('/workspace/get' )
            .then(response => {

                this.topics = response.data; 

            });
    },

    methods: {

        find:function(){ 

            if( this.inpWorkspace.length > 2 ){

                this.showresult = true;
                axios.get('/workspace/find' ,{

                    params: {

                        workspace: this.inpWorkspace,

                        }

                    })
                .then(response => {

                    this.workspaceLists = response.data;
                    
                });

            }                    

        },
        createworkspace:function(event){

            event.preventDefault();

            var c = confirm("Sure to Create?");   

            if( c == true){  

                this.showresult = true;
                axios.get('/workspace/created' ,{

                    params: {

                        workspace: this.inpWorkspace, 

                        }

                    })
                .then(response => {

                    this.workspaceLists = response.data;
                    
                });
            }

        },
        join:function(workspace ,id){ 

            var c = confirm("Sure to Join?");   

            if( c == true){  

                this.showresult = true;
                axios.get('/workspace/joined' ,{

                    params: {

                        workspace: workspace,
                        id:  id, 

                        }

                    })
                .then(response => {

                    this.workspacejoined = response.data;

                    if( this.workspacejoined === 1){

                        this.joinstatus = 1;

                    }else{

                        this.joinstatus = 0;

                    }
                    
                });
            }

        },
                    
    }
}
</script>

<style>
/* Scoped Styles */
</style>
