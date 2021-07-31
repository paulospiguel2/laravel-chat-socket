const express = require("express");
const cors = require("cors");

const http = require("http");

const app = express();

app.use(cors());

const server = http.createServer(app);

const io = require("socket.io")(server, {
    cors: { origin: "*", methods: ["GET", "POST"] }
});

const clients = [];

app.use(
    express.urlencoded({
        extended: true
    })
);

io.on("connection", socket => {
    console.log("connetion");

    socket.on("disconnect", () => {
        console.log("disconnect");
    });
});

app.get("/", (req, res) => {
    res.send("<h1>Hello world</h1>");
});
/**
 * Initialize Server
 */
server.listen(3000, function() {
    console.log("Server is running 🚀");
});

/**
 * Página de Teste
 */
/* app.get("/", function (req, res) {
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
 */
// Recebe conexão dos usuários no servidor
/* io.on("connection", function (client) {
    // Adicionado clientes
    client.emit("welcome", {
        id: client.id,
    });
});
 */
