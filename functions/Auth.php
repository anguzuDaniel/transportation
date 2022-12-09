<?php



/**
 * isLoggedIn
 *
 * @return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']
 */
function isLoggedIn()
{
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
}

/**
 * requireLogin
 * requires a user to login when using the application
 * @return void
 */
function requireLogin()
{
    if (!isLoggedIn()) {
        die('unathorized user');
    }
}

/**
 * login
 * logs in a user to the application
 * @return void
 */
function login()
{
    // helps to prevent session fixation attack | stops hackers from stealing session data
    session_regenerate_id(true);

    $_SESSION['is_logged_in'] = true;
}

/**
 * logout
 * logs out a user from the application
 * @return void
 */
function logout()
{
    $_SESSION = array();

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();
}
