const { Sequelize, DataTypes } = require('sequelize');
const config = require('../config').db;

const sequelize = new Sequelize(config.database, config.username, config.password, {
  host: config.host,
  dialect: config.dialect
});

const User = sequelize.define('User', {
  username: {
    type: DataTypes.STRING,
    unique: true
  },
  password: {
    type: DataTypes.STRING
  },
  expiration_date: {
    type: DataTypes.DATE
  },
  max_connections: {
    type: DataTypes.INTEGER
  }
}, {
  tableName: 'users'
});

module.exports = User;
