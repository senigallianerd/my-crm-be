const jwt = require('jsonwebtoken');
const jwtSecret = process.env.JWT || 'secret-jwt';
const multer = require('multer');
const fs = require('fs');

module.exports = function (app, db) {

	const USERS = [
		{ 'id': 1, 'username': 'admin', 'password':'password' }];

	app.get('/',(req,res) =>{
		res.send('Welcome to My CRM BE');
	})

	const storage = multer.diskStorage({
		destination: (req, file, cb) => {
			cb(null, 'uploads');
		},
		filename: function (req, file, cb) {
			cb(null, file.fieldname + '-' + Date.now())
		}
	});

	const upload = multer({ storage: storage });

	//Upload route
	app.post('/api/upload', upload.single('attachment'), (req, res, next) => {
		try {
			return res.status(201).json({
				message: 'File uploded successfully'
			});
		} catch (error) {
			console.error(error);
		}
	})

	app.post('/api/auth', function(req, res) {
		const body = req.body;
		const user = USERS.find(user => user.username == body.username);
		if(!user || body.password != user.password) 
			return res.sendStatus(401);
		const token = jwt.sign({userID: user.id}, jwtSecret, {expiresIn: '2h'});
		res.send({token});
	});	

	app.get('/api/user-list', function(req, res) {
		console.log('req',req)
		db.Users.findAll({}).then(function (result) {
			res.json(result);
		});
	});
	app.get('/api/get-user/:id', function(req, res) {
		db.Users.find({
			where: {
			   id: req.params.id
			}
		 }).then(function (result) {
			res.json(result);
		});
	});
	app.post('/api/create-user', function(req,res) {
		db.Users.create({
			name: req.body.name,
			surname: req.body.surname,
			age: req.body.age
		}).then(function (result) {
			res.json(result);
		})
	});
	app.post('/api/update-user/:id', function(req, res) {
		db.Users.update({
			name: req.body.name,
			surname: req.body.surname,
			age: req.body.age
		}, {
			where: {
				id: req.params.id
			}

		}).then(function(result){
			res.json(result);
		});
	});
	app.delete('/api/delete-user/:id', function(req,res) {
		db.Users.destroy({
			where: {
				id: req.params.id 
			}
		}).then(function(result){
			res.json(result);
		})
	});

	app.get('/api/file-list', function(req, res) {
		const result = { files: [] }
		fs.readdirSync('./uploads/').forEach(file => {
			console.log(file);
			result.files.push(file)
		  });
		  res.json(result);
	});

}
