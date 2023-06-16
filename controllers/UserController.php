<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/User.php';
class UserController
{
    
        private $jsonPath;
    
        public function __construct()
        {
            $this->jsonPath = $_SERVER['DOCUMENT_ROOT'] . '/dataset/users.json';
        }
    
    // Fetches all users from the JSON file
    public function getAllUsers()
    {
        $jsonString = file_get_contents($this->jsonPath);
        $usersData = json_decode($jsonString, true);
        $users = [];

        foreach ($usersData as $userData) {
            $user = new User(
                $userData['id'],
                $userData['name'],
                $userData['username'],
                $userData['email'],
                $userData['address'],
                $userData['phone'],
                $userData['company']
            );
            $users[] = $user;
        }
        return $users;
    }
    // Adds a new user to the JSON file
    public function addUser($user)
    {
        $jsonString = file_get_contents($this->jsonPath);
        $users = json_decode($jsonString, true);
        $lastRecord = end($users);
        $lastId = $lastRecord['id'];
        $user->id = $lastId + 1;
        $users[] = $user;
        $updatedJsonString = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents($this->jsonPath, $updatedJsonString);
    }
    // Removes a user from the JSON file based on the given index
    public function removeUser($index)
    {
        $jsonString = file_get_contents($this->jsonPath);
        $users = json_decode($jsonString, true);
        if (isset($users[$index])) {
            unset($users[$index]);
            $updatedJsonString = json_encode(array_values($users), JSON_PRETTY_PRINT);
            file_put_contents($this->jsonPath, $updatedJsonString);
        }
    }
}
// Handle user actions
if (isset($_GET['action'])) {
    $userController = new UserController();

    if ($_GET['action'] === 'addUser' && isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['street'], $_POST['city'], $_POST['zipcode'], $_POST['phone'], $_POST['companyName'], $_POST['address'])) {
        try {
            $user = new User(
                null,
                $_POST['name'],
                $_POST['username'],
                $_POST['email'],
                ['street' => $_POST['street'], 'city' => $_POST['city'], 'zipcode' => $_POST['zipcode']],
                $_POST['phone'],
                ['name' => $_POST['companyName']]
            );
            $userController->addUser($user);
            header("Location: ../index.php");
            exit;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } elseif ($_GET['action'] === 'removeUser' && isset($_POST['index'])) {
        try {
            $userController->removeUser($_POST['index']);
            header("Location: ../index.php");
            exit;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
