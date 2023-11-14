// Import the express library
import express from 'express';
import { ping } from './pingEtsy.mjs';

// Create a new express application
const app = express();

// Send a "Hello World!" response to a default get request
app.get('/', (req, res) => {
    res.send('Hello, world!')
})

app.get('/ping', async (req, res) => {
    const data  = await ping();
    console.log('ici', data)
    res.send(data);
})



// Start the server on port 3003
const port = 3003
app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`)
})