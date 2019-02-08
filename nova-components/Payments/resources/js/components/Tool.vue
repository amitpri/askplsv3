<template>
    <div>
        <heading class="mb-6">Payments</heading>
 

        <card class="flex flex-col items-center justify-center" style="min-height: 300px"> 

            <h1 class="text-black text-4xl text-90 font-light mb-6">
                Please click on the button below to make payments
            </h1>

             <form method="post" action="/orders">

                <p><button name="type" value="monthly" class="btn btn-default btn-primary">Pay ( Monthly Plan ) - 700Rs </button></p> <br>

                <p><button name="type" value="yearly" class="btn btn-default btn-primary">Pay ( Yearly Plan ) - 5000Rs </button></p> 

                <br>

            </form>
            <table  class="table w-full">
                <thead>
                    <tr>
                        <th class="text-left">Order Id</th>
                        <th class="text-left">Plan</th>
                        <th class="text-left">Amount</th> 
                        <th class="text-left">Status</th> 
                        <th class="text-left">Payment Date</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="payment in payments" >
                        <td>{{ payment.order_id }}</td>
                        <td>{{ payment.plan }}</td>
                        <td>{{ payment.price }}{{ payment.currency }}</td>  
                        <td>{{ payment.status }}</td>  
                        <td>{{ payment.created_at }}</td>  
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
                payment: "",
                payments: [],

                } 
            },
    mounted() {
        axios.get('/payment/default')
                    .then(response => {

                        this.payments = response.data;

                    }); 
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
