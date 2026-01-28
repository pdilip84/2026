<?php
// Members Routes
// app()->view('/members', 'pages/members');   // IGNORE Simple page
// app()->get('/members', 'MembersController@show'); // IGNORE JSON response
app()->get('/members', 'MembersController@display'); //
app()->get('/members/show/{id}', 'MembersController@displayOne'); // 
app()->delete('/members/{id}', 'MembersController@delete'); //   
app()->get('members/edit/{id}', 'MembersController@edit'); //
app()->put('members/{id}', 'MembersController@update'); //