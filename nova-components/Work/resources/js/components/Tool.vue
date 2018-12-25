<template>
    <div>
        <heading class="mb-6">Workspace Management</heading>

        <card class=" flex flex-col items-center justify-center" style="min-height: 300px">
            

            <h1 class="text-black text-4xl text-90 font-light mb-6">
                Create Workspace
            </h1>
            <form id="widget-subscribe-form" action="/register" role="form" method="get" class="nobottommargin"  >
                <div class="input-group divcenter">
                    <input @keyup="find" v-model="inpWorkspace" type="text" id="workspace" name="workspace" 
                        class=" shadow appearance-none border rounded w-full py-4 px-8 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter workspace name.."  >                          
                </div>
            </form>
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
                  <td><a @click="join" :href="'/workspace/join/' + workspaceList.id + '/' + workspaceList.workspace">Join</a></td> 
                </tr>  
              </tbody>
              <tbody v-else>
                <tr> 
                  <td>@{{ inpWorkspace }}</td>
                  <td><a @click="createworkspace" :href="'/workspace/create?name=' + inpWorkspace">Create</a></td>
                </tr>  
              </tbody>
            </table>

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
                createworkspace:function(event){

                    event.preventDefault();

                    var c = confirm("Sure to Create?");   

                    if( c == true){  

                        this.showresult = true;
                        axios.get('/workspace/created' ,{

                            params: {

                                workspace: this.inpWorkspace,
                                company: this.inpCompany,
                                city: this.inpCity,

                                }

                            })
                        .then(response => {

                            this.workspaceLists = response.data;
                            
                        });
                    }

                },
                join:function(event){

                    event.preventDefault();

                    var c = confirm("Sure to Join?");   

                    if( c == true){  

                        this.showresult = true;
                        axios.get('/workspace/joined' ,{

                            params: {

                                workspace: this.inpWorkspace,
                                id: this.inpId,
                                code: this.inpCode,

                                }

                            })
                        .then(response => {

                            workspacejoined = response.data;

                            if( workspacejoined === 1){

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
