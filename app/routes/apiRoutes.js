module.exports = function (app, db) {

	app.get('/api/user-list', function(req, res) {
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



}
