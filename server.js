const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const PORT = process.env.PORT || 3000;
const db = require('./models');
const apiRoutes = require('./app/routes/apiRoutes.js');
const expressJwt = require('express-jwt');


//data parsing part
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true}));
app.use(bodyParser.text());
app.use(bodyParser.json({ type: "application/vmd.api+json" }));
app.use(expressJwt({secret: 'secret-jwt'}).unless({path: ['/api/auth']}));

// CORS
function setupCORS(req, res, next) {
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,OPTIONS');
    res.header('Access-Control-Allow-Headers', 'X-Requested-With, Content-type,Accept,X-Access-Token,X-Key,Authorization');
	res.header('Access-Control-Allow-Origin', '*');
	next();
}
app.all('/*', setupCORS);

//static directory
app.use(express.static('public'));

apiRoutes(app,db);

db.sequelize.sync().then(function(){

app.listen(PORT, function() {
	console.log(`Listening on port ${PORT}`);
	});
});



