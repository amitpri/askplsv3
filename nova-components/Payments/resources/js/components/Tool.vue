<template>
    <div>
        <heading class="mb-6">Payments</heading>

        

        <card class="flex flex-col items-center justify-center" style="min-height: 300px"> 

            <h1 class="text-black text-4xl text-90 font-light mb-6">
                Please click on the button below to make payments
            </h1>

            <p><button @click="paymonthly" class="btn btn-default btn-primary">Pay ( Monthly )</button></p> <br>

            <p><button @click="payyearly" class="btn btn-default btn-primary">Pay ( Yearly )</button></p> 
 
        </card>
    </div>
</template>

<script>
export default {
    mounted() {
        //
    },
    methods: {

        paymonthly(){

            Nova.request().post('/nova-vendor/payments/paymonthly')
                .then(data =>{
                    alert("S");
                });
        },
        payyearly(){

            Nova.request().post('/nova-vendor/payments/payyearly')
                .then(data =>{
                    alert("P");
                });
        },

    }
}
</script>

<style>
/* Scoped Styles */
</style>
