<?php
// Members Routes
// app()->view('/members', 'pages/members');   // IGNORE Simple page
// app()->get('/members', 'MembersController@show'); // IGNORE JSON response
app()->get('/members', 'MembersController@display'); //