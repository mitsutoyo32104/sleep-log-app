<?php
/**
 * index.php = EntryPoint
 */
require_once './env.php';

require_once './config.php';

session_start();

// Libraries
require_once BASE_DIR . 'libs/helper.php';
require_once BASE_DIR . 'libs/Auth.php';

// Models
require_once BASE_DIR . 'models/SessionModel.php';
require_once BASE_DIR . 'libs/Message.php';
require_once BASE_DIR . 'models/UserModel.php';

// Repositories
require_once BASE_DIR . 'repositories/Database.php';
require_once BASE_DIR . 'repositories/UserRepository.php';

// Header
require_once BASE_DIR . 'partials/header.php';

// Routing
require_once BASE_DIR . 'route.php';

// Footer
require_once BASE_DIR . 'partials/footer.php';

