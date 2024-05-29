<?php
include "Database.php";
class Users {
    private $db;

    public function __construct(){
       $this->db=new Database();
    }


    // Create a new user
    public function createUser($data) {
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $password = $data['password'];

        list($flag, $msg) = $this->validation($data);
        if (!$flag){
            return array($flag, $msg);
        }

        $sql = "INSERT INTO users (Firstname, Lastname, Email, Mobile, password) VALUES (:firstname, :lastname, :email, :mobile, :password)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':mobile' => $mobile,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
        return $this->db->pdo->lastInsertId();
    }

    // Read a user by ID
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Update a user by ID
    public function updateUser($userID, $data) {
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $password = $data['password'];
        list($flag, $msg) = $this->validation($data);
        if (!$flag){
            return array($flag, $msg);
        }

        $sql = "UPDATE users SET Firstname = :firstname, Lastname = :lastname, Email = :email, Mobile = :mobile, password = :password WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        echo $stmt->execute([
            ':id' => $userID,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':mobile' => $mobile,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    // Delete a user by ID
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Get all users
    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    private function checkExistEmail($email){
        $sql = "SELECT email from  users WHERE email = :email";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount()> 0) {
            return true;
        }else{
            return false;
        }
    }

    private function validation($data){
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $email = $data['email'];
        $mobile = $data['mobile'];
        $password = $data['password'];

        if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
            return array(false,"Firstname, Lastname, Email and password are required");
        }

        if (strlen($firstname)<3){
            return array(false,"Firstname must be at least 3 characters long");
        }

        if (strlen($lastname)<3){
            return array(false,"Lastname must be at least 3 characters long");
        }

        if (strlen($password)<8){
            return array(false,"password must be at least 8 characters long");
        }

        if (!preg_match("/^[a-zA-Z]*$/",$password)){
            return array(false, "password must contain at least one letter");
        }

        if( $this->checkExistEmail($email)){
            return array(false, "Email already exists");
        }

        return array(true,"");
    }
}
?>
