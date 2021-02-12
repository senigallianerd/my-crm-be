var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var PORT = process.env.PORT || 3000;
var db = require('./models');
var apiRoutes = require('./app/routes/apiRoutes.js');


//data parsing part
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true}));
app.use(bodyParser.text());
app.use(bodyParser.json({ type: "application/vmd.api+json" }));

// CORS
function setupCORS(req, res, next) {
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,OPTIONS');
    res.header('Access-Control-Allow-Headers', 'X-Requested-With, Content-type,Accept,X-Access-Token,X-Key');
	res.header('Access-Control-Allow-Origin', '*');
	next();
}
app.all('/*', setupCORS);

//static directory
app.use(express.static('public'));

apiRoutes(app,db);

db.sequelize.sync().then(function(){

app.listen(3000, function() {
	console.log(`Listening on port ${PORT}`);
	});
});



