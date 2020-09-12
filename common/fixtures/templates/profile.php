<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
  'user_id' => 1,
  'gender' => 'Mr',
  'first_name' => $faker->firstName,
  'last_name' => $faker->lastName,
  'country_id' => 1,
  'city_id' => 1,
  'birth_date' => $faker->dateTime()->format('Y-m-d H:i:s'),
  'phone' => $faker->phoneNumber,
];

//php yii fixture/generate profile--count=1

//php yii fixture/load Profile