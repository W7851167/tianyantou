<link href=" https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher("{{env("PUSHER_KEY")}}");
    console.log(pusher);
    var channel = pusher.subscribe('laravel-broadcast-channel');
    console.log(channel);
    channel.bind('test-event', function(data) {
        console.log(data);
        console.log(data.text);
    });
</script>