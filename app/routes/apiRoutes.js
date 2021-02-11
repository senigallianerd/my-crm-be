module.exports = function (app, db) {

	app.get('/api/all', function(req, res) {
		db.Users.findAll({}).then(function (result) {
			res.json(result);
		});
	});
	app.post('/api/new', function(req,res) {
		db.Users.create({
			name: req.body.name,
			surname: req.body.surname,
			age: req.body.age
		}).then(function (result) {
			res.json(result);
		})
	});
	app.put('/api/update/:id', function(req, res) {
		db.Users.update({
			name: req.body.name
		}, {
			where: {
				id: req.params.id
			}

		}).then(function(result){
			res.json(result);
		});
	});
	app.delete('/api/delete/:id', function(req,res) {
		db.Users.destroy({
			where: {
				id: req.params.id 
			}
		}).then(function(result){
			res.json(result);
		})
	});



}
