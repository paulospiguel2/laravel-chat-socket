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

    <script src="https://cdn.socket.io/3.1.3/socket.io.min.js"></script>
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



<script>
    (()=>{
        console.log("🔰 inicialized websocket(socket.io)]");
        let ip_address = "127.0.0.1";
        let socket_port = "3000";
        let socket = io(`${ip_address}:${socket_port}`);

        socket.on("connection",() => {
            alert("Connected");
            socket.emit("user_connected", 123456);
        });

    })()
</script>
</body>
</html>
