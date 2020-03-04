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


const makeEventModal = function({
  connection,
  forceSync = false,
}) {
  Event.init(eventFields, {
    sequelize: connection, 
    modelName: 'events',
    timestamps: true,
  });

  if(forceSync) {
    Event.sync({ alter: true });
  }

  return Event;
}

module.exports = makeEventModal;


