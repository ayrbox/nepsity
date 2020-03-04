// just sync database for now
const { Sequelize } = require('sequelize');
const makeEventModel = require('./models/event');

const user = 'nepsity';
const password = 'nepsitysecret';
const host = 'localhost';
const database = 'nepsitydb';

const sequelize = new Sequelize(database, user, password, {
    host,
    dialect: 'postgres',
    logging: false,
    port: 5439,
});

sequelize.authenticate().then(function(){ 
  console.log('Connection to database is successful.');
  
}).catch(function(err) {
  console.log('[ERROR]: Unable to connect to database', err);
});

const Event = makeEventModel({
  connection: sequelize,
  forceSync: true
});

console.log('Model', Event);
console.log('Initialised. Please check database');



