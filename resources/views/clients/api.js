'use strict';

const DishItem = require('../../src/models/dishitem');
const Restaurant = require('../models/restaurant');

module.exports = {
  up: async (queryInterface, Sequelize) => {
    // Clear the table before inserting
    DishItem.destroy({
      where: {},
      truncate: true,
    });

    // Seed the table
    const malabar = await Restaurant.findOne(
      { where: { name: "Malabar South Indian Restaurant" } },
      { raw: true }
    );
    const bikanervala = await Restaurant.findOne(
      { where: { name: "Bikanervala Bay Avenue - Indian Buffet Restaurant Dubai" } },
      { raw: true }
    );
    const tulum = await Restaurant.findOne(
      { where: { name: "Tulum Restaurant" } },
      { raw: true }
    );
    const curry = await Restaurant.findOne(
      { where: { name: "Curry Box Business Bay" } },
      { raw: true }
    );
    const capri = await Restaurant.findOne(
      { where: { name: "Capri Italian Grill" } },
      { raw: true }
    );
    const pizzaExpress = await Restaurant.findOne(
      { where: { name: "PizzaExpress Live" } },
      { raw: true }
    );
    const malabar = await Restaurant.findOne(
      { where: { name: "My Square" } },
      { raw: true }
    );
    const malabar = await Restaurant.findOne(
      { where: { name: "My Square" } },
      { raw: true }
    );
    const malabar = await Restaurant.findOne(
      { where: { name: "My Square" } },
      { raw: true }
    );
    const malabar = await Restaurant.findOne(
      { where: { name: "My Square" } },
      { raw: true }
    );
    
    return queryInterface.bulkInsert("DishItems", [
      //Restaurent - 1      
      {
        name: "Indian Meals",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Pizza",
        category: "Main Course",
        restaurantId: malabar.id,
        description: "Pizza",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Sushi",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Japanese Food",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Zhejiang",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Chinese Dish",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name: "Butter Chicken",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Burger",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chicken Mandi",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Chicken Mandi",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      //Restaurant 2    
      {
        name: "Chicken Burger",
        category: "Starter",
        restaurantId: bikanervala.id,
        description: "Chicken Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Noodles",
        category: "Starter",
        restaurantId: bikanervala.id,
        description: "Noodles",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Indian Non Veg Meals",
        category: "Indian Meals",
        restaurantId: bikanervala.id,
        description: "Indian Non Veg Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chinese Lunch",
        category: "Indian Meals",
        restaurantId: bikanervala.id,
        description: "Chinese Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Pasta",
        category: "Indian Meals",
        restaurantId: bikanervala.id,
        description: "Pasta",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Thai Lunch",
        category: "Indian Meals",
        restaurantId: bikanervala.id,
        description: "Thai Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      //Restaurent - 3      
      {
        name: "Indian Cuisine",
        category: "Indian Meals",
        restaurantId: tulum.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Veg Pizza",
        category: "Delecious vegetarian pizza",
        restaurantId: tulum.id,
        description: "Pizza",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Sushi Rolls",
        category: "Starter",
        restaurantId: tulum.id,
        description: "Japanese Food",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Fresh Zhejiang",
        category: "Starter",
        restaurantId: tulum.id,
        description: "Chinese Dish",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name: "Indian Butter Chicken",
        category: "Starter",
        restaurantId: tulum.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Veggie Burger",
        category: "Starter",
        restaurantId: tulum.id,
        description: "Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      //Restaurant 4    
      {
        name: "Beef Burger",
        category: "Starter",
        restaurantId: curry.id,
        description: "Chicken Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Egg Noodles",
        category: "Starter",
        restaurantId: curry.id,
        description: "Noodles",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Mutton Chops",
        category: "Indian Meals",
        restaurantId: curry.id,
        description: "Indian Non Veg Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Egg fried rice",
        category: "Indian Meals",
        restaurantId: curry.id,
        description: "Chinese Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Pasta Soup",
        category: "Indian Meals",
        restaurantId: curry.id,
        description: "Pasta",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Prawn chops",
        category: "Indian Meals",
        restaurantId: curry.id,
        description: "Thai Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      //Restaurent - 5      
      {
        name: "Hyderabadi Biryani",
        category: "Indian Meals",
        restaurantId: capri.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Peppy Paneer Pizza",
        category: "Main Course",
        restaurantId: capri.id,
        description: "Pizza",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Ramen noodles",
        category: "Noodles",
        restaurantId: capri.id,
        description: "Japanese Food",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Thandoori Chicken",
        category: "Indian Meals",
        restaurantId: capri.id,
        description: "Chinese Dish",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name: "Baked Fish",
        category: "Indian Meals",
        restaurantId: capri.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Black Bean Burgers",
        category: "Starter",
        restaurantId: capri.id,
        description: "Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      //Restaurant 6    
      {
        name: "Bison Burger",
        category: "Starter",
        restaurantId: pizzaExpress.id,
        description: "Chicken Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Pan Fried Noodles",
        category: "Starter",
        restaurantId: pizzaExpress.id,
        description: "Noodles",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chicken Buttor Masala",
        category: "Indian Meals",
        restaurantId: pizzaExpress.id,
        description: "Indian Non Veg Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chinese Pan cake",
        category: "Indian Meals",
        restaurantId: pizzaExpress.id,
        description: "Chinese Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Stuffed Pasta",
        category: "Indian Meals",
        restaurantId: pizzaExpress.id,
        description: "Pasta",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chicken Fried Rise",
        category: "Indian Meals",
        restaurantId: pizzaExpress.id,
        description: "Thai Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      //Restaurent - 7      
      {
        name: "Chicken Kuruma",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Double Cheese Pizza",
        category: "Main Course",
        restaurantId: malabar.id,
        description: "Pizza",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Onigiri",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Japanese Food",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chinees chilli Fish",
        category: "Chinees Meals",
        restaurantId: malabar.id,
        description: "Chinese Dish",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name: "Butter Chicken",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Elk Burgers",
        category: "Burger",
        restaurantId: malabar.id,
        description: "Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      //Restaurant 8    
      {
        name: "Mushroom Burger",
        category: "Burger",
        restaurantId: malabar.id,
        description: "Chicken Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Mushrooms Noodles",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Noodles",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chicken Sausage",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Indian Non Veg Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Breakfast", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Vegetable Chowmein",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Chinese Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["BreakFast", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chicken sandwich",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Grilled Chicken",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Thai Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      //Restaurent - 9      
      {
        name: "Mutton Korma",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_rel_1_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/1/r_th_1_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Brick Oven Pizza",
        category: "Main Course",
        restaurantId: malabar.id,
        description: "Pizza",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_rel_2_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/2/r_th_2_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Miso Soup",
        category: "Japanees",
        restaurantId: malabar.id,
        description: "Japanese Food",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_rel_3_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/3/r_th_3_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Sour Sweet chicken",
        category: "Chinees",
        restaurantId: malabar.id,
        description: "Chinese Dish",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },
      {
        name: "Classic French Toast",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Indian Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_rel_4_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/4/r_th_4_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },

      {
        name: "Onion Smashed Burger",
        category: "Burger",
        restaurantId: malabar.id,
        description: "Onion Burger",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_rel_5_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/5/r_th_5_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      //Restaurant 10
      {
        name: "Tandoori Lamb Chops",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Tandoori Lamb masala",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_rel_7_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/7/r_th_7_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Mediterranean Noodles",
        category: "Starter",
        restaurantId: malabar.id,
        description: "Noodles",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["Japanese", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_rel_6_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/6/r_th_6_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Keema Samosa",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Indian Non Veg Meals",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_rel_8_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/8/r_th_8_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Boneless Chilly Chicken",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Chinese Lunch",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_rel_9_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/9/r_th_9_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Malabar Biriyani",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Malabar Biriyani",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_rel_10_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/10/r_th_10_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date(),
      },
      {
        name: "Chicken Ghee Roast",
        category: "Indian Meals",
        restaurantId: malabar.id,
        description: "Chicken Ghee Roast",
        ingredients: JSON.stringify({}),
        location: JSON.stringify({}),
        tags: JSON.stringify({
          cuisine: ["South Indian", "Arabic"],
          mealType: ["Lunch", "Dinner"],
        }),
        graphics: JSON.stringify({
          heroImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbImage:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
          heroVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_rel_11_1.jpg",
          heroThumbVideo:
            "https://its-nomnom-images.s3.eu-west-1.amazonaws.com/dishes/11/r_th_11_1.jpg",
        }),
        createdAt: new Date(),
        updatedAt: new Date()
      },




    ]);
  },

  down: async (queryInterface, Sequelize) => {
    return queryInterface.bulkDelete('DishItems', null, {});
  }
};
