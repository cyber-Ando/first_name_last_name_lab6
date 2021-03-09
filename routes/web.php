<?php

use Illuminate\Support\Facades\Route;
use App\Student;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function () {
    DB::insert('insert into students(name, date_of_birth, GPA, advisor) values(?,?,?,?)',
    ['Arnur', '23-10-2001', 3, 'Marzhan']);
});


Route::get('/select', function () {
    $results=DB::select('select * from students where id=?',[1]);
    foreach($results as $students) {
        echo "name is:".$students->name;
        echo "<br>";
        echo "date is:".$students->date_of_birth;
        echo "<br>";
        echo "GPA is:".$students->GPA;
        echo "<br>";
        echo "advisor is:".$students->advisor;
    }
});


Route::get('/update', function () {
    $updated=DB::update('update students set name="JoJo" where id=?',[3]);
    return $updated;
});


Route::get('/delete', function () {
    $deleted=DB::delete('delete from students where id=?',[2]);
    return $deleted;
});


Route::get('/read', function() {
    $students=Student::all();
    foreach($students as $student) {
        echo "name is:".$student->name;
        echo "<br>";
        echo "date is:".$student->date_of_birth;
        echo "<br>";
        echo "GPA is:".$student->GPA;
        echo "<br>";
        echo "advisor is:".$student->advisor;
    }
});

Route::get('/find',function() {
    $students=Student::find(3);
    return $students->name;
});

Route::get('/find',function() {
    $students=Student::where('id',4)->first();
    return $students;
});

Route::get('/insert',function() {
    $student = new Student;
    $student->name='Kabuto';
    $student->date_of_birth='20-10-1998';
    $student->GPA=3;
    $student->advisor='Marzhan';
});

Route::get('/basicupdate',function() {
    $student = Student::find(3);
    $student->name='Naruto';
    $student->date_of_birth='23-10-2003';
    $student->GPA=4;
    $student->advisor='Marzhan';
    $student->save();
});


Route::get('/delete',function() {
   $student = Student::find(1);
   $student -> delete();
});



