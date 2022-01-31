<?php

return [

    'sexes' => [
        '0' => 'رجل',
        '1' => 'مرأة',
    ],

    'gender' => [
        '0' => 'ذكر',
        '1' => 'انثى',
    ],
 'separate_section' => [
        '0' => 'لا',
        '1' => 'نعم',
    ],
    'divisions_gender' => [
        '0' => 'رجال',
        '1' => 'نساء',
        '2' => 'متاح للكل',
    ],

    'payment_type2' => [
        '1' => 'إلكتروني',
        '2' => 'رفع صورة الإيصال',
        '0' => ' غير ذلك',
    ],

    'sections_level' => [
        '1'   => 'المستوى الأول',
        '2'   => 'المستوى الثاني',
        '3'   => 'المستوى الثالث',
        '4'   => 'المستوى الرابع',
        '5'   => 'المستوى الخامس',
        '6'   => 'المستوى السادس',
        '7'  => 'المستوى السابع',
        '8'  => 'المستوى الثامن',
        '9'  => 'المستوى التاسع',
        '10'  => 'المستوى العاشر',
        '11' => 'المستوى الحادي عشر',
        '12' => 'المستوى الثاني عشر',
        '13' => 'المستوى الثالث عشر',
        '14'  => 'المستوى الرابع عشر',
        '15' => 'المستوى الخامس عشر',
        '16' => 'المستوى السادس عشر',
        '17' => 'المستوى السابع عشر',
        '18'  => 'المستوى الثامن عشر',
        '19' => 'المستوى التاسع عشر',
        '20' => 'المستوى العشرون',
    ],

    'months' => [
        '1' => 'الشهر الأول',
        '2' => 'الشهر الثاني',
        '3' => 'الشهر الثالث',
    ],

    'semesters' => [
        '1' => 'الفصل الأول',
        '2' => 'الفصل الثاني',
    ],

    'division_times_semester' => [
        '' => '',
        '1' => 'الفصل الأول',
        '2' => 'الفصل الثاني',
    ],

    'divisions_type' => [
        '0' => 'حلقة هاتفية',
        '1' => 'دورة تدريبية',
    ],

    'registrations_status' => [
        '0' => 'تسجيل',
        '1' => 'انتظام',
        '2' => 'انسحاب / الغاء',
        '3' => 'متخرجة',
            '5' => 'خاتمة',
        '4' => 'راسبة',
        
    ],

    'boolean' => [
        '0' => 'لا',
        '1' => 'نعم',
    ],

    'roles' => [
        '20' => 'ادارة',
        '10' => 'مشرفة',
        '5' => 'معلمة',
    ],

    'status' => [
        '1' => 'نشط',
        '0' => 'غير نشط',
    ],
    'need_teacher' => [
        '1' => 'يحتاج معلمين',
        '0' => ' لا يحتاج معلمين',
    ],
    'advertisements_status' => [
        '0' => 'غير نشط',
        '1' => 'نشط في الموقع',
        '2' => 'نشط في الموقع والطالبة',
        '3' => 'نشط للطالبة',
    ],

    'jobs_status' => [
        '0' => 'تدقيق',
        '1' => 'مقابلة شخصية',
        '2' => 'قبول',
        '3' => 'رفض / الغاء',
    ],
    'register_type' => [
        0 => 'شهري',
        1 => 'صيفي',
        2 => 'سنوي',
    ],
    'payment_type' => [
        0 => 'إلكتروني',
        1 => 'غير إلكتروني',
          3 => 'إلكتروني وغير إلكتروني',
    ],
    'registeration_status' => [
        0 => 'ايقاف التسجيل',
        1 => 'السماح بالتسجيل',
    ],

    'users_photo' => [
        'public' => '/files/users_photo/',
        'folder' => public_path() . '/files/users_photo/',

        'image' => [
            'width'  => 600,
            'height' => null,
        ]
    ],

    'classrooms_pdf_file' => [
        'public' => '/files/classrooms_pdf_file/',
        'folder' => public_path() . '/files/classrooms_pdf_file/',

        'image' => [
            'width'  => null,
            'height' => null,
        ]
    ],
'receipt_image' => [
        'public' => '/files/receipt_image/',
        'folder' => public_path() . '/files/receipt_image/',

        'image' => [
            'width'  => null,
            'height' => null,
        ]
    ],

    'classrooms_code' => [
        0 => 'ايقاف رصد الدرجات',
        1 => 'السماح برصد الدرجات',
    ],

    'division_times_pdf_file' => [
        'public' => '/files/division_times_pdf_file/',
        'folder' => public_path() . '/files/division_times_pdf_file/',

        'image' => [
            'width'  => null,
            'height' => null,
        ]
    ],

    'sections_pdf_file' => [
        'public' => '/files/sections_pdf_file/',
        'folder' => public_path() . '/files/sections_pdf_file/',

        'image' => [
            'width'  => null,
            'height' => null,
        ]
    ],
    'settings_file' => [
        'public' => '/files/settings_file/',
        'folder' => public_path() . '/files/settings_file/',

        'image' => [
            'width'  => null,
            'height' => null,
        ]
    ],
    
    'level_sections_pdf_file' => [
        'public' => '/files/level_sections_pdf_file/',
        'folder' => public_path() . '/files/level_sections_pdf_file/',

        'image' => [
            'width'  => null,
            'height' => null,
        ]
    ],
    'advertissements_photo' => [
        'public' => '/files/advertissements_photo/',
        'folder' => public_path() . '/files/advertissements_photo/',

        'image' => [
            'width'  => 400,
            'height' => 400,
        ]
    ],

    'configurations_logo' => [
        'public' => '/files/configurations_logo/',
        'folder' => public_path() . '/files/configurations_logo/',

        'image' => [
            'width'  => 600,
            'height' => null,
        ]
    ],

    'divisions_photo' => [
        'public' => '/files/divisions_photo/',
        'folder' => public_path() . '/files/divisions_photo/',

        'image' => [
            'width'  => 400,
            'height' => 400,
        ]
    ],

    /*
    |------------------------------------------------------------------------------------
    | ENV of APP
    |------------------------------------------------------------------------------------
    */
    'APP_ADMIN' => env('APP_ADMIN', 'admin'),
    'APP_TOKEN' => env('APP_TOKEN', 'admin123456'),
];
