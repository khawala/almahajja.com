<?php return array (
  'app' => 
  array (
    'name' => 'المحجة البيضاء',
    'env' => 'local',
    'debug' => true,
    'url' => 'https://almahajja.com/',
    'timezone' => 'Asia/Riyadh',
    'locale' => 'ar',
    'fallback_locale' => 'ar',
    'key' => 'base64:Iu5CbilZKFYm9LIuESv5Ty1wLj/IgKwss1pcqL+lazE=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'RealRashid\\SweetAlert\\SweetAlertServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\AuthServiceProvider',
      25 => 'App\\Providers\\EventServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
      27 => 'Collective\\Html\\HtmlServiceProvider',
      28 => 'Barryvdh\\Debugbar\\ServiceProvider',
      29 => 'Intervention\\Image\\ImageServiceProvider',
      30 => 'App\\Providers\\MacroServiceProvider',
      31 => 'Teepluss\\Restable\\RestableServiceProvider',
      32 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
      'Debugbar' => 'Barryvdh\\Debugbar\\Facade',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'Restable' => 'Teepluss\\Restable\\Facades\\Restable',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'Alert' => 'RealRashid\\SweetAlert\\Facades\\Alert',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
        'table' => 'users',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/home/bzlw9ifkqppo/public_html/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'laravel',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'almahajja',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'almahajja',
        'username' => 'almahajja',
        'password' => ')lK7u;-zoLx;',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'almahajja',
        'username' => 'almahajja',
        'password' => ')lK7u;-zoLx;',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => NULL,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
    ),
    'storage' => 
    array (
      'enabled' => true,
      'driver' => 'file',
      'path' => '/home/bzlw9ifkqppo/public_html/storage/debugbar',
      'connection' => NULL,
      'provider' => '',
    ),
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'error_handler' => false,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => true,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => true,
      'laravel' => false,
      'events' => false,
      'default_request' => false,
      'symfony_request' => true,
      'mail' => true,
      'logs' => false,
      'files' => false,
      'config' => false,
      'auth' => false,
      'gate' => false,
      'session' => true,
    ),
    'options' => 
    array (
      'auth' => 
      array (
        'show_name' => false,
      ),
      'db' => 
      array (
        'with_params' => true,
        'timeline' => false,
        'backtrace' => false,
        'explain' => 
        array (
          'enabled' => false,
          'types' => 
          array (
            0 => 'SELECT',
          ),
        ),
        'hints' => true,
      ),
      'mail' => 
      array (
        'full_log' => false,
      ),
      'views' => 
      array (
        'data' => false,
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_domain' => NULL,
    'theme' => 'auto',
  ),
  'entrust' => 
  array (
    'role' => 'App\\Role',
    'roles_table' => 'roles',
    'permission' => 'App\\Permission',
    'permissions_table' => 'permissions',
    'permission_role_table' => 'permission_role',
    'role_user_table' => 'role_user',
    'user_foreign_key' => 'user_id',
    'role_foreign_key' => 'role_id',
  ),
  'excel' => 
  array (
    'cache' => 
    array (
      'enable' => true,
      'driver' => 'memory',
      'settings' => 
      array (
        'memoryCacheSize' => '32MB',
        'cacheTime' => 600,
      ),
      'memcache' => 
      array (
        'host' => 'localhost',
        'port' => 11211,
      ),
      'dir' => '/home/bzlw9ifkqppo/public_html/storage/cache',
    ),
    'properties' => 
    array (
      'creator' => 'Maatwebsite',
      'lastModifiedBy' => 'Maatwebsite',
      'title' => 'Spreadsheet',
      'description' => 'Default spreadsheet export',
      'subject' => 'Spreadsheet export',
      'keywords' => 'maatwebsite, excel, export',
      'category' => 'Excel',
      'manager' => 'Maatwebsite',
      'company' => 'Maatwebsite',
    ),
    'sheets' => 
    array (
      'pageSetup' => 
      array (
        'orientation' => 'portrait',
        'paperSize' => '9',
        'scale' => '100',
        'fitToPage' => false,
        'fitToHeight' => true,
        'fitToWidth' => true,
        'columnsToRepeatAtLeft' => 
        array (
          0 => '',
          1 => '',
        ),
        'rowsToRepeatAtTop' => 
        array (
          0 => 0,
          1 => 0,
        ),
        'horizontalCentered' => false,
        'verticalCentered' => false,
        'printArea' => NULL,
        'firstPageNumber' => NULL,
      ),
    ),
    'creator' => 'Maatwebsite',
    'csv' => 
    array (
      'delimiter' => ',',
      'enclosure' => '"',
      'line_ending' => '
',
      'use_bom' => false,
    ),
    'export' => 
    array (
      'autosize' => true,
      'autosize-method' => 'approx',
      'generate_heading_by_indices' => true,
      'merged_cell_alignment' => 'left',
      'calculate' => false,
      'includeCharts' => false,
      'sheets' => 
      array (
        'page_margin' => false,
        'nullValue' => NULL,
        'startCell' => 'A1',
        'strictNullComparison' => false,
      ),
      'store' => 
      array (
        'path' => '/home/bzlw9ifkqppo/public_html/storage/exports',
        'returnInfo' => false,
      ),
      'pdf' => 
      array (
        'driver' => 'DomPDF',
        'drivers' => 
        array (
          'DomPDF' => 
          array (
            'path' => '/home/bzlw9ifkqppo/public_html/vendor/dompdf/dompdf/',
          ),
          'tcPDF' => 
          array (
            'path' => '/home/bzlw9ifkqppo/public_html/vendor/tecnick.com/tcpdf/',
          ),
          'mPDF' => 
          array (
            'path' => '/home/bzlw9ifkqppo/public_html/vendor/mpdf/mpdf/',
          ),
        ),
      ),
    ),
    'filters' => 
    array (
      'registered' => 
      array (
        'chunk' => 'Maatwebsite\\Excel\\Filters\\ChunkReadFilter',
      ),
      'enabled' => 
      array (
      ),
    ),
    'import' => 
    array (
      'heading' => 'slugged',
      'startRow' => 1,
      'separator' => '_',
      'slug_whitelist' => '._',
      'includeCharts' => false,
      'to_ascii' => true,
      'encoding' => 
      array (
        'input' => 'UTF-8',
        'output' => 'UTF-8',
      ),
      'calculate' => true,
      'ignoreEmpty' => false,
      'force_sheets_collection' => false,
      'dates' => 
      array (
        'enabled' => true,
        'format' => false,
        'columns' => 
        array (
        ),
      ),
      'sheets' => 
      array (
        'test' => 
        array (
          'firstname' => 'A2',
        ),
      ),
    ),
    'views' => 
    array (
      'styles' => 
      array (
        'th' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 12,
          ),
        ),
        'strong' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 12,
          ),
        ),
        'b' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 12,
          ),
        ),
        'i' => 
        array (
          'font' => 
          array (
            'italic' => true,
            'size' => 12,
          ),
        ),
        'h1' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 24,
          ),
        ),
        'h2' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 18,
          ),
        ),
        'h3' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 13.5,
          ),
        ),
        'h4' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 12,
          ),
        ),
        'h5' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 10,
          ),
        ),
        'h6' => 
        array (
          'font' => 
          array (
            'bold' => true,
            'size' => 7.5,
          ),
        ),
        'a' => 
        array (
          'font' => 
          array (
            'underline' => true,
            'color' => 
            array (
              'argb' => 'FF0000FF',
            ),
          ),
        ),
        'hr' => 
        array (
          'borders' => 
          array (
            'bottom' => 
            array (
              'style' => 'thin',
              'color' => 
              array (
                0 => 'FF000000',
              ),
            ),
          ),
        ),
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/home/bzlw9ifkqppo/public_html/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/home/bzlw9ifkqppo/public_html/storage/app/public',
        'url' => 'https://almahajja.com//storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
      ),
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/home/bzlw9ifkqppo/public_html/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/home/bzlw9ifkqppo/public_html/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 7,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'p3plzcpnl489434.prod.phx3.secureserver.net',
    'port' => '465',
    'from' => 
    array (
      'address' => 'info@almahajja.com',
      'name' => 'المحجة البيضاء',
    ),
    'encryption' => 'ssl',
    'username' => 'info@almahajja.com',
    'password' => 'wCuLk!{6j!oo',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/home/bzlw9ifkqppo/public_html/resources/views/vendor/mail',
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'restable' => 
  array (
    'listing' => 
    array (
      'response' => ':response',
      'header' => 200,
    ),
    'show' => 
    array (
      'response' => ':response',
      'header' => 200,
    ),
    'created' => 
    array (
      'response' => ':response',
      'header' => 201,
    ),
    'updated' => 
    array (
      'response' => ':response',
      'header' => 200,
    ),
    'deleted' => 
    array (
      'response' => NULL,
      'header' => 204,
    ),
    'success' => 
    array (
      'response' => 
      array (
        'message' => ':response|OK',
      ),
      'header' => 200,
    ),
    'error_400' => 
    array (
      'response' => 
      array (
        'code' => 400,
        'message' => 'Bad Request',
        'description' => ':response|The request was invalid or cannot be otherwise served.',
      ),
      'header' => 400,
    ),
    'error_401' => 
    array (
      'response' => 
      array (
        'code' => 401,
        'message' => 'Unauthorized',
        'description' => ':response|Authentication credentials were missing or incorrect.',
      ),
      'header' => 401,
    ),
    'error_403' => 
    array (
      'response' => 
      array (
        'code' => 403,
        'message' => 'Forbidden',
        'description' => ':response|The request is understood, but it has been refused or access is not allowed.',
      ),
      'header' => 403,
    ),
    'error_404' => 
    array (
      'response' => 
      array (
        'code' => 404,
        'message' => 'Not found',
        'description' => ':response|The request was not found.',
      ),
      'header' => 404,
    ),
    'error_405' => 
    array (
      'response' => 
      array (
        'code' => 405,
        'message' => 'Method Not Allowed',
        'description' => ':response|Request method is not allowed.',
      ),
      'header' => 405,
    ),
    'error_406' => 
    array (
      'response' => 
      array (
        'code' => 406,
        'message' => 'Not Acceptable',
        'description' => ':response|Returned when an invalid format is specified in the request.',
      ),
      'header' => 406,
    ),
    'error_410' => 
    array (
      'response' => 
      array (
        'code' => 410,
        'message' => 'Gone',
        'description' => ':response|This resource is gone. Used to indicate that an API endpoint has been turned off.',
      ),
      'header' => 410,
    ),
    'error_422' => 
    array (
      'response' => 
      array (
        'code' => 422,
        'message' => 'Unprocessable Entity',
        'description' => 'Data is unable to be processed.',
        'errors' => ':response',
      ),
      'header' => 422,
    ),
    'error_429' => 
    array (
      'response' => 
      array (
        'code' => 429,
        'message' => 'Too Many Requests',
        'description' => ':response|Request cannot be served due to the application\'s rate limit having been exhausted for the resource.',
      ),
      'header' => 429,
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/home/bzlw9ifkqppo/public_html/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'almhj_albyda_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'sweetalert' => 
  array (
    'cdn' => NULL,
    'alwaysLoadJS' => false,
    'neverLoadJS' => false,
    'timer' => 5000,
    'width' => '32rem',
    'height_auto' => true,
    'padding' => '1.25rem',
    'animation' => 
    array (
      'enable' => false,
    ),
    'animatecss' => 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
    'show_confirm_button' => false,
    'show_close_button' => true,
    'toast_position' => 'top-end',
    'timer_progress_bar' => false,
    'middleware' => 
    array (
      'autoClose' => false,
      'toast_position' => 'top-end',
      'toast_close_button' => true,
      'timer' => 6000,
      'auto_display_error_messages' => false,
    ),
    'customClass' => 
    array (
      'container' => NULL,
      'popup' => NULL,
      'header' => NULL,
      'title' => NULL,
      'closeButton' => NULL,
      'icon' => NULL,
      'image' => NULL,
      'content' => NULL,
      'input' => NULL,
      'actions' => NULL,
      'confirmButton' => NULL,
      'cancelButton' => NULL,
      'footer' => NULL,
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'variables' => 
  array (
    'sexes' => 
    array (
      0 => 'رجل',
      1 => 'مرأة',
    ),
    'gender' => 
    array (
      0 => 'ذكر',
      1 => 'انثى',
    ),
    'separate_section' => 
    array (
      0 => 'لا',
      1 => 'نعم',
    ),
    'divisions_gender' => 
    array (
      0 => 'رجال',
      1 => 'نساء',
      2 => 'متاح للكل',
    ),
    'payment_type2' => 
    array (
      1 => 'إلكتروني',
      2 => 'رفع صورة الإيصال',
      0 => ' غير ذلك',
    ),
    'sections_level' => 
    array (
      1 => 'المستوى الأول',
      2 => 'المستوى الثاني',
      3 => 'المستوى الثالث',
      4 => 'المستوى الرابع',
      5 => 'المستوى الخامس',
      6 => 'المستوى السادس',
      7 => 'المستوى السابع',
      8 => 'المستوى الثامن',
      9 => 'المستوى التاسع',
      10 => 'المستوى العاشر',
      11 => 'المستوى الحادي عشر',
      12 => 'المستوى الثاني عشر',
      13 => 'المستوى الثالث عشر',
      14 => 'المستوى الرابع عشر',
      15 => 'المستوى الخامس عشر',
      16 => 'المستوى السادس عشر',
      17 => 'المستوى السابع عشر',
      18 => 'المستوى الثامن عشر',
      19 => 'المستوى التاسع عشر',
      20 => 'المستوى العشرون',
    ),
    'months' => 
    array (
      1 => 'الشهر الأول',
      2 => 'الشهر الثاني',
      3 => 'الشهر الثالث',
    ),
    'semesters' => 
    array (
      1 => 'الفصل الأول',
      2 => 'الفصل الثاني',
    ),
    'division_times_semester' => 
    array (
      '' => '',
      1 => 'الفصل الأول',
      2 => 'الفصل الثاني',
    ),
    'divisions_type' => 
    array (
      0 => 'حلقة هاتفية',
      1 => 'دورة تدريبية',
    ),
    'registrations_status' => 
    array (
      0 => 'تسجيل',
      1 => 'انتظام',
      2 => 'انسحاب / الغاء',
      3 => 'متخرجة',
      5 => 'خاتمة',
      4 => 'راسبة',
    ),
    'boolean' => 
    array (
      0 => 'لا',
      1 => 'نعم',
    ),
    'roles' => 
    array (
      20 => 'ادارة',
      10 => 'مشرفة',
      5 => 'معلمة',
    ),
    'status' => 
    array (
      1 => 'نشط',
      0 => 'غير نشط',
    ),
    'need_teacher' => 
    array (
      1 => 'يحتاج معلمين',
      0 => ' لا يحتاج معلمين',
    ),
    'advertisements_status' => 
    array (
      0 => 'غير نشط',
      1 => 'نشط في الموقع',
      2 => 'نشط في الموقع والطالبة',
      3 => 'نشط للطالبة',
    ),
    'jobs_status' => 
    array (
      0 => 'تدقيق',
      1 => 'مقابلة شخصية',
      2 => 'قبول',
      3 => 'رفض / الغاء',
    ),
    'register_type' => 
    array (
      0 => 'شهري',
      1 => 'صيفي',
      2 => 'سنوي',
    ),
    'payment_type' => 
    array (
      0 => 'إلكتروني',
      1 => 'غير إلكتروني',
      3 => 'إلكتروني وغير إلكتروني',
    ),
    'registeration_status' => 
    array (
      0 => 'ايقاف التسجيل',
      1 => 'السماح بالتسجيل',
    ),
    'users_photo' => 
    array (
      'public' => '/files/users_photo/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/users_photo/',
      'image' => 
      array (
        'width' => 600,
        'height' => NULL,
      ),
    ),
    'classrooms_pdf_file' => 
    array (
      'public' => '/files/classrooms_pdf_file/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/classrooms_pdf_file/',
      'image' => 
      array (
        'width' => NULL,
        'height' => NULL,
      ),
    ),
    'receipt_image' => 
    array (
      'public' => '/files/receipt_image/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/receipt_image/',
      'image' => 
      array (
        'width' => NULL,
        'height' => NULL,
      ),
    ),
    'classrooms_code' => 
    array (
      0 => 'ايقاف رصد الدرجات',
      1 => 'السماح برصد الدرجات',
    ),
    'division_times_pdf_file' => 
    array (
      'public' => '/files/division_times_pdf_file/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/division_times_pdf_file/',
      'image' => 
      array (
        'width' => NULL,
        'height' => NULL,
      ),
    ),
    'sections_pdf_file' => 
    array (
      'public' => '/files/sections_pdf_file/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/sections_pdf_file/',
      'image' => 
      array (
        'width' => NULL,
        'height' => NULL,
      ),
    ),
    'settings_file' => 
    array (
      'public' => '/files/settings_file/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/settings_file/',
      'image' => 
      array (
        'width' => NULL,
        'height' => NULL,
      ),
    ),
    'level_sections_pdf_file' => 
    array (
      'public' => '/files/level_sections_pdf_file/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/level_sections_pdf_file/',
      'image' => 
      array (
        'width' => NULL,
        'height' => NULL,
      ),
    ),
    'advertissements_photo' => 
    array (
      'public' => '/files/advertissements_photo/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/advertissements_photo/',
      'image' => 
      array (
        'width' => 400,
        'height' => 400,
      ),
    ),
    'configurations_logo' => 
    array (
      'public' => '/files/configurations_logo/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/configurations_logo/',
      'image' => 
      array (
        'width' => 600,
        'height' => NULL,
      ),
    ),
    'divisions_photo' => 
    array (
      'public' => '/files/divisions_photo/',
      'folder' => '/home/bzlw9ifkqppo/public_html/public/files/divisions_photo/',
      'image' => 
      array (
        'width' => 400,
        'height' => 400,
      ),
    ),
    'APP_ADMIN' => 'admin',
    'APP_TOKEN' => 'SOME_KEY_FOR_REST_API_ACCESS',
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/home/bzlw9ifkqppo/public_html/resources/views',
    ),
    'compiled' => '/home/bzlw9ifkqppo/public_html/storage/framework/views',
  ),
);
