const express = require('express');
const app = new express();
const path = require('path')

app.set('appName','API GraphQL Clients for Edictus ');
app.set('port', process.env.PORT || 3000);

app.get('/', function(req, res){
    file = path.join(__dirname, '/src', 'fetch.html');
    console.log(file);
    res.sendFile(file);
});

app.listen(app.get('port'), () => {
    console.log('App:', app.get('appName'));
    console.log(`Server on port ${app.get('port')}`);
  });
  