<?php

return [

    /*
    |--------------------------------------------------------------------------
    | FMP Custom Config
    |--------------------------------------------------------------------------

    */
    'logo' => 'assets/img/fmp-logo.png',
    'title_img' => 'assets/img/title-img.png',
    'paginate_number' => 10,
    'str_limit' => 50,
    'profile_str_limit' => 1,
    'create_message' => 'New Todo created successfully.',
    'status' => [
        '1' => 'Finished',
        '5' => 'Unfinished',
        'Finished' => '1',
        'Unfinished' => '5',
    ],
    'status_class' => [
        '0' => '',
        '1' => 'bg-success text-white',
        '5' => '',
    ],
    'status_icon' => [
        '0' => '',
        '1' => 'images/finish.png',
        '5' => 'images/unfinish.png',
    ],
    'messages' => [
        '0' => 'Todo Not Found.',
        '1' => '',
        '5' => '',
    ],

];
