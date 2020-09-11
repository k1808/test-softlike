<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
  'name' => $faker->word,
  'price' => $faker->numberBetween($min = 100, $max = 9000),
];

//php yii fixture/generate product --count=5

//php yii fixture/load Product