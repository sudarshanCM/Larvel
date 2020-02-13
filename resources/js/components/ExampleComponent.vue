<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form v-on:submit.prevent="handleSubmit">
                        <input type="text" v-model="message">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log("mounted");
            window.Echo.private('chat').listen('.Shoutout',(event)=>{
                console.log('event',event);
                alert(event.message);
            })
        },
        data(){
            return {
                message:''
            }
        },
        methods:{
            handleSubmit(){
                let postData = {'message':'data'};
                window.axios.post('/api/shoutout',postData).then(response=>console.log('response',response)); 
            }
        }
    }
</script>
