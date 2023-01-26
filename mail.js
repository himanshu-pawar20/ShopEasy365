import http from "http";

const server = http.createServer((req, res)=>{
res.end('response from server');

});

server.listen(3309,"localhost",()=>{
    console.log('server running on this port http://localhost:3309');
});