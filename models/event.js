const { Model, DataTypes } = require('sequelize');

class Event extends Model {}
const eventFields = {
  id: { type: DataTypes.INTEGER, autoIncrement: true, primaryKey: true },
  host: { type: DataTypes.INTEGER, allowNull: false },
  title: { type: DataTypes.STRING, allowNull: false },
  description: { type: DataTypes.STRING },
  attendee: { type: DataTypes.INTEGER, allowNull: false },
  type: { type: DataTypes.STRING, allowNull: false, defaultValue: 'FREE' },
  duration: { type: DataTypes.RANGE(DataTypes.DATE), allowNull: false },
};

const initializeEventModel = function(sequelizeInstance) {
  Event.init(eventFields, {
    sequelizeInstance, 
    modelName: 'events',
    timestamps: true,
  });
}

module.exports = {
  init: initializeEventModel,
};
