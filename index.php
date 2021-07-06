<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$ob = new Randomizer\DBConnection();
$ob->connect();

$count_rows = $ob->getRowCount( "users" );
$count_tables = count( $ob->list_tables() );

for ( $i = 0; $i < $how_much; $i++ ) {
    $condition = array( 'id' => $i );
    $setvals = array( 'email' => 'iariyal@rakepoint.com', 'name' => 'gowno' );
    $ob->update( "users", $setvals, $condition );
}