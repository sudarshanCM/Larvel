<template>
<div>
<h2>HI</h2>
</div>

</template>


<script>
export default{
name:"admin",
mounted()
{
    this.listen();
console.log('Component mounted1');
},

data:{
cards:{}
},

props:[],

methods:{
    listen(){
    //        var pusher = new Pusher('88b46fc61e089709e692', {
    //   cluster: 'mt1',
    //   forceTLS: true
    // });
        //   Pusher.logToConsole = true;
        console.log("IN");
        // console.log(window.Echo.options);
    //     var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {
    //   console.log("IN1");
    // });
        Echo.channel('chat')
            .listen('.ShoutOut',(card)=>{
            console.log("IN1");
            this.cards.unshift(card);
            alert("s",cards);
        })
    }
}

}
</script>
