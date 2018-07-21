<script>
    export default {
        name: 'form-task',
        data() {
            return {
                customers:[],
                vendors:[],
                customername: '',
                vendor_id: [],
                errors: null
            }
        },
        mounted (){
            window.addEventListener('load', () => {
                 if (window.location.hash && window.location.hash == '#_=_') {
                    history.replaceState 
                    ? history.replaceState(null, null, window.location.href.split('#')[0])
                    : window.location.hash = '';
                }
            })
            this.getCustomer()
            this.getVendor()
        },
        methods:{
            
            getCustomer (){
            axios.get('/customer')
            .then(response => this.customers = response.data)
            .catch(error => console.log(error))
            },
            getVendor (){
            axios.get('/vendor')
            .then(response => this.vendors = response.data)
            .catch(error => console.log(error))
            },
            sendForm(e){
                let formData = {
                    customerName: this.customername,
                    vendor_id: this.vendor_id
                };
                axios.post('/saveCustomer',formData)
                .then(function (response) {
                        
                        if(response.data.status == '1'){
                            $('.alert-success').css('display','block');
                            $('.alert-success').html('<strong>Success</strong> '+response.data.msg);
                        }
                        else if(response.data.status == '2'){
                            $('.alert-danger').css('display','block');
                            $('.alert-danger').html('<strong>Warning</strong> '+response.data.msg);
                        }
                        else{
                            $('.alert-danger').css('display','block');
                            $('.alert-danger').html('<strong>Danger</strong> '+response.data.msg);
                        }
                        window.setTimeout(function() {
                            $(".alert").css('display','none')
                            }, 2000);
                        //e.target.reset();
                     })
                     .catch(function (error) {
                        if (error.response && error.response.status === 400) {
                            this.errors.setMessages(error.response.data.messages);
                        }
                     }.bind(this));
            }
        }
    }
</script>

<template lang="html">
    <form @submit.prevent="sendForm">
    
    <div class="form-group col-sm-3">
    <label for="customer">Customer</label>
    <select name="customername" v-model="customername" id="customer" class="form-control">
        <option value="">Select Customer</option>
        <option v-for="customer in customers" :value="customer.id">{{ customer.name }}</option>
    </select>
    </div>

    <div class="form-group col-sm-3">
    <label for="vendor">Vendor</label>
    <select name="vendor_id[]" required id="vendor_id" v-model="vendor_id" class="form-control" multiple="multiple">
        <option value="">Select Vendor</option>
        <option v-for="vendor in vendors" :value="vendor.id">{{ vendor.name }}</option>
    </select>
    </div>
    
    <div class="form-group col-sm-3">    
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
    </form>                
</template>
