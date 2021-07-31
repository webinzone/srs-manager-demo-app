module.exports = (sequelize, Sequelize) => {
  const Employee = sequelize.define("employee", {
    first_name: {
      type: Sequelize.STRING
    },
    last_name: {
      type: Sequelize.STRING
    },
    phone: {
      type: Sequelize.STRING
    },
    email: {
      type: Sequelize.STRING
    },
    dob: {
      type: Sequelize.STRING
    },
    gender: {
      type: Sequelize.STRING
    },
    local_address_1: {
      type: Sequelize.STRING
    },
    local_address_2: {
      type: Sequelize.STRING
    },
    local_address_3: {
      type: Sequelize.STRING
    },
    local_country: {
      type: Sequelize.STRING
    },
    local_region: {
      type: Sequelize.STRING
    },
    local_city: {
      type: Sequelize.STRING
    },
    local_zip: {
      type: Sequelize.STRING
    },
    permanent_address_1: {
      type: Sequelize.STRING
    },
    permanent_address_2: {
      type: Sequelize.STRING
    },
    permanent_address_3: {
      type: Sequelize.STRING
    },
    permanent_country: {
      type: Sequelize.STRING
    },
    permanent_region: {
      type: Sequelize.STRING
    },
    permanent_city: {
      type: Sequelize.STRING
    },
    permanent_zip: {
      type: Sequelize.STRING
    },
    contact_address_1: {
      type: Sequelize.STRING
    },
    contact_address_2: {
      type: Sequelize.STRING
    },
    contact_address_3: {
      type: Sequelize.STRING
    },
    contact_country: {
      type: Sequelize.STRING
    },
    contact_region: {
      type: Sequelize.STRING
    },
    contact_city: {
      type: Sequelize.STRING
    },
    contact_zip: {
      type: Sequelize.STRING
    }
  });

  return Employee;
};



, 
    local_address_1: req.body.local_address_1,
    local_address_2: req.body.local_address_2,
    local_address_3: req.body.local_address_3, 
    local_country: req.body.local_address_3,
    local_region: req.body.local_region,
    local_city: req.body.local_city,
    local_zip: req.body.local_zip,
    permanent_address_1: req.body.permanent_address_1,
    permanent_address_2: req.body.permanent_address_2,
    permanent_address_3: req.body.permanent_address_3, 
    permanent_country: req.body.permanent_address_3,
    permanent_region: req.body.permanent_region,
    permanent_city: req.body.permanent_city,
    permanent_zip: req.body.permanent_zip,
    contact_address_1: req.body.contact_address_1,
    contact_address_2: req.body.contact_address_2,
    contact_address_3: req.body.contact_address_3, 
    contact_country: req.body.contact_address_3,
    contact_region: req.body.contact_region,
    contact_city: req.body.contact_city,
    contact_zip: req.body.contact_zip




