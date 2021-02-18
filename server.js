const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const PORT = process.env.PORT || 3000;
const db = require('./models');
const apiRoutes = require('./app/routes/apiRoutes.js');
const expressJwt = require('express-jwt');
const jwtSecret = process.env.JWT || 'secret-jwt';
const cors = require('cors')

//data parsing part
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true}));
app.use(bodyParser.text());
app.use(bodyParser.json({ type: "application/vmd.api+json" }));
app.use(expressJwt({secret: jwtSecret}).unless({path: ['/api/auth','/api/upload','/api/file-list']}));
app.use(bodyParser.urlencoded({
  extended: false
}));

// CORS
app.use(cors({
	origin: function(origin, callback){
	  return callback(null, true);
	},
	optionsSuccessStatus: 200,
	credentials: true
  }));

//static directory
app.use(express.static('public'));

apiRoutes(app,db);

db.sequelize.sync().then(function(){

app.listen(PORT, function() {
	console.log(`Listening on port ${PORT}`);
	});
});



