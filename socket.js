const express = require("express");
const socketio = require("socket.io");
const bodyParser = require("body-parser");
const http = require("http");
const app = express();

server = http.createServer(app);
const io = socketio(server);

const clients = [];

app.use(
    express.urlencoded({
        extended: true,
    })
);

/**
 * Initialize Server
 */
server.listen(3000, function () {
    console.log("Server running on port 3000");
});

/**
 * Página de Teste
 */
app.get("/", function (req, res) {
    res.send("Server is running...");
});

// Recebe requisição do Laravel
app.post("/like", function (req, res) {
    var params = req.body;
    var clients = io.sockets.clients().sockets;

    for (const key in clients) {
        if (key != params.id) clients[key].emit("like", params);
    }

    res.send();
});

// Recebe conexão dos usuários no servidor
io.on("connection", function (client) {
    // Adicionado clientes
    client.emit("welcome", {
        id: client.id,
    });
});
