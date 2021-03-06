<?php
/**
 * @file
 * Tests array declarations.
 */

$array = [
  'data' => 'my-data',
  'animal' => 'squirrel',
  'inline' => [],
  'inline3' => ['one', 'two', 'three'],
  'inline_long_ok' => ['one', 'two', 'three', 'four', 'five'],
  'inline_long_nok' => ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'],
  'nested' => [
  ],
  'nested2' => [
    'a'
  ],
  'nested3' => [
    'a' => 'a',
    'b' => [
      'c'
    ]
  ]
];

$array = array(
  'data' => 'my-data',
  'animal' => 'squirrel',
  'inline' => array(),
  'inline3' => array('one', 'two', 'three'),
  'inline_long_ok' => array('one', 'two', 'three', 'four', 'five'),
  'inline_long_nok' => array('one', 'two', 'three', 'four', 'five', 'six', 'seven'),
  'nested' => array(
  ),
  'nested2' => array(
    'a'
  ),
  'nested3' => array(
    'a' => 'a',
    'b' => array(
      'c'
    ),
  )
);
