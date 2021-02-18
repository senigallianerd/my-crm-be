module.exports = function(sequelize, DataTypes) {
	var Policy = sequelize.define('Policy', {
		type:  DataTypes.STRING,
		fileName:  DataTypes.STRING,
        customerId: DataTypes.INTEGER,
        expirationDate: DataTypes.DATE
	});
	return Policy;
}
