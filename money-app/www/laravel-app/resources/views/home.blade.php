<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>Hello World</title>
</head>
<body>
<h1> Hello World</h1>
</body>
</html>

<?php
use Illuminate\Support\Facades\DB;
 
$users = DB::select('select * from users');
 
foreach ($users as $user) {
    echo $user->first_name;
}