<?php 
// Create or access a Session
session_start();

require_once '../library/connections.php';
require_once 'model.php';

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

function checkPassword($userPassword) {
    // Checks the password for a 7 character min, 1 capital letter, 1 number, 1 special character
    $pattern = '/^(?=.*[[:digit:]])(?=.*[a-z])([^\s]){7,}$/';
    // Returns 1 if they match. Returns 0 if they don't
    return preg_match($pattern, $userPassword);
}

switch ($action) {
    case 'Register':
        // Filter and store the data
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_STRING);

        if ($userPassword != $confirmPassword){
            $message = "<p class='notice'>Passwords do not match. Try again.</p>";
            $_SESSION['noMatch'] = "<span class='notice'>*</span>";
            include './view/register.php';
            exit;
        }
        // Check if password has at least 7 characters and a number
        $checkPassword = checkPassword($userPassword);
        if($checkPassword == 1){
            // Uses password_hash() function to hash the password
            $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        
            // Send the user data to the model
            $regOutcome = registerUser($username, $hashedPassword);
        
            if ($regOutcome === 1) {
             $_SESSION['message'] = "<p>Thanks for registering $username. Please use your email and password to login.</p>";
                header('Location: index.php?action=login'); // After inserting the user, redirect to the sign-in page
                exit;
            } else {
                $message = "<p>Registration failed. Please try again.</p>";
                include './view/register.php';
                exit;
            }
        }
        else{
            $message = "<p class='notice'>Password needs to contain at least 7 digits and 1 number.</p>";
            include './view/register.php';
                exit;
        }
        case 'register':
            include './view/register.php';
            break;
        case 'Login':
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $userPassword = filter_input(INPUT_POST, 'userPassword', FILTER_SANITIZE_STRING);

            // Get the user's data from the database
            $userData = getUser($username);

            // Use password_verify() function and compare against the hash in the database
            $hashCheck = password_verify($userPassword, $userData['userPassword']);
            
            // If an incorrect password is entered, stay on this page
            if(!$hashCheck){
                $message = 'Invalid username or password. Please try again.';
                include './view/login.php';
                exit;
            }
            // If a correct username/password is entered, save the userId to the session and redirect to the welcome page
            $_SESSION['loggedin'] = TRUE;
            array_pop($userData); // removes the user's password from the array BEFORE storing in the session
            $_SESSION['userData'] = $userData; // saves the user data in the session
            include './view/welcome.php';
            exit;
        case 'login':
            include './view/login.php';
            break;
        case 'signout':
            unset($_SESSION['username']);
            header("Location: index.php?action=login.php");
            die();
            break;
        default:
            include './view/register.php';
            break;
    }
?>