<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-3xl text-80 font-light">Workspace</h1>

            <h2  class="font-light">No workspace Created. You won't be able to use Private review feature of AskPls.</h2>

            <h2 v-for="topics in topic">a</h2>
            
            
        </div>
    </card>
</template>

<script>
export default {
    props: [
        'card',   


        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],
    data() {
                return {

                id:"", 
                inpId: "", 
                topic: "",
                topics: [],

                } 
            },

    mounted() {
        axios.get('/workspace/get' )
                    .then(response => {
    
                        this.topics = response.data; 

                    });
    },
}
</script>
