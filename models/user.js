module.exports = function(sequelize, DataTypes) {
	var Users = sequelize.define('Users', {
		name:  DataTypes.STRING,
		surname:  DataTypes.STRING,
		age: DataTypes.INTEGER,
	});
	return Users;
}
