            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('6b4bcc1600b0ac16372f', {
            });

            var channel = pusher.subscribe('feed');


            channel.bind("App\\Events\\OrderReceived",  function(data) { 
            	console.log(data);
            });