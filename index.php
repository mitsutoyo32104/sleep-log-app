<?php
// EntryPoint
require_once './config.php';

// Libraries
require_once BASE_DIR . 'libs/helper.php';

// Models
require_once BASE_DIR . 'models/user.model.php';

// Repositories
require_once BASE_DIR . 'repositories/database.php';
require_once BASE_DIR . 'repositories/user.repository.php';

session_start();

// Header
require_once BASE_DIR . 'partials/header.php';

// Routing
require_once BASE_DIR . 'route.php';

// Footer
require_once BASE_DIR . 'partials/footer.php';

