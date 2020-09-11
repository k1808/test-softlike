<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
  'name' => $faker->city,
  'country_id'=>$faker->numberBetween($min = 0, $max = 18),
];

//php yii fixture/generate city --count=10

//php yii fixture/load City