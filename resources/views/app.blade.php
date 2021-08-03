<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <title>Chat Laravel</title>

</head>
<body>

<section class="w-2/4 space-y-8 m-auto">
    <h1 class="text-5xl mt-5 text-indigo-600 text-center">Chat POC Laravel Socket.io</h1>

    <div class="h-96 border-2"></div>

    <div class="w-full grid grid-cols-4 justify-center">
        <input type="text" class="border h-8 p-1 w-full col-span-3" placeholder="Type any to send">
        <button type="button" class="col-span-1 bg-indigo-700 text-white p-1 px-2 rounded-sm hover:bg-indigo-800">Send</button>
    </div>
</section>

<!-- @php
$host = explode(":", request()->getHttpHost())
@endphp

<script src="{{request()->getScheme()}}://{{$host[0]}}:3000/socket.io/socket.io.js"></script>
 -->
<script src="https://cdn.socket.io/3.1.3/socket.io.min.js"></script>

<script>
    (() => {
        console.log("🔰 inicialized websocket(socket.io)]");
        let host_address = `${window.location.protocol}//${window.location.hostname}`;
        let socket_port = "3000";
        let socket = io(`${host_address}:${socket_port}`);

        console.log("[host]", host_address);
        console.log("[check 1]", socket.connected);

        socket.on("connection", () => {
            console.log("[check 2]", socket.connected);
            socket.emit("user_connected", 123456);
        });

        socket.on("connect", function() {
            console.log("Connected!");
        });
    })();
</script>

</body>
</html>
