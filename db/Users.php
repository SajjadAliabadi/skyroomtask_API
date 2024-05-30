<?php
include "Database.php";

class Users {
    private $db;
    public function __construct(){
       $this->db=new Database();
    }


    // Create a new user
    public function createUser($data) {
        $firstname =isset($data['firstname']) ? $data['firstname']:"";
        $lastname = isset($data['lastname']) ? $data['lastname']:"";
        $email = isset($data['email']) ? $data['email']:"";
        $mobile = isset($data['mobile']) ? $data['mobile']:"";
        $password = isset($data['password']) ? $data['password']:"";

        list($flag, $msg) = $this->validation($data, 'insert');
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
        return array(true,"Insert user successfully");
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
        $firstname =isset($data['firstname']) ? $data['firstname']:"";
        $lastname = isset($data['lastname']) ? $data['lastname']:"";
        $email = isset($data['email']) ? $data['email']:"";
        $mobile = isset($data['mobile']) ? $data['mobile']:"";
        $password = isset($data['password']) ? $data['password']:"";

        list($flag, $msg) = $this->validation($data, 'update');
        if (!$flag){
            return array($flag, $msg);
        }
        if( $this->checkExistEmail($email, $userID)){
            return array(false, "Email already exists");
        }

        $sql = "UPDATE users SET Firstname = :firstname, Lastname = :lastname, Email = :email, Mobile = :mobile, password = :password WHERE id = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $err=$stmt->execute([
            ':id' => $userID,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':mobile' => $mobile,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
        if (!$err){
            return array($err, "Update has an error!");
        }else{
            return array($err, "update successfully!");
        }

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

    private function checkExistEmail($email, $userID){
        $sql = "SELECT email from  users WHERE email = :email and id = :userID";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':userID', $userID);
        $stmt->execute();
        if ($stmt->rowCount()> 1) {
            return true;
        }else{
            return false;
        }
    }

    private function validation($data, $type){
        $firstname =isset($data['firstname']) ? $data['firstname']:"";
        $lastname = isset($data['lastname']) ? $data['lastname']:"";
        $email = isset($data['email']) ? $data['email']:"";
        $mobile = isset($data['mobile']) ? $data['mobile']:"";
        $password = isset($data['password']) ? $data['password']:"";

        if (strlen($firstname)<3){
            return array(false,"Firstname must be at least 3 characters long");
        }

        if (strlen($lastname)<3){
            return array(false,"Lastname must be at least 3 characters long");
        }

        if ($type=="insert"){
            if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
                return array(false,"Firstname, Lastname, Email and password are required");
            }

            if (!preg_match("/^[a-zA-Z0-9]*$/",$password)){
                return array(false, "password must contain at least one letter");
            }

            if( $this->checkExistEmail($email, 0)){
                return array(false, "Email already exists");
            }

            if (strlen($password)<8){
                return array(false,"password must be at least 8 characters long");
            }

        }
        if ($type=="update"){
            if (empty($firstname) || empty($lastname) || empty($email) ) {
                return array(false,"Firstname, Lastname, Email and password are required 00");
            }
        }

        return array(true  ,"success!");
    }
}
?>
