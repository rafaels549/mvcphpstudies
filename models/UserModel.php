<?php 

class UserModel extends Database {
    
  public function fetchAllUsers() {
    $sql = "SELECT * FROM users";
    return $this->getQuery($sql);
}

public function fetchUserById($id) {
    $sql = "SELECT * FROM users WHERE id = ?";
    return $this->getQuery($sql, [$id]);
}

public function findByUsername($username) {
  $sql = "SELECT * FROM users WHERE username = ?";
  return $this->getQuery($sql, [$username]);
}

public function findByEmail($email) {
  $sql = "SELECT * FROM users WHERE email = ?";
  return $this->getQuery($sql, [$email]);
}

public function createUser($username, $name, $email, $password) {
  $now = date('Y-m-d H:i:s');
  $sql = "INSERT INTO users (username, name, email, password, created_at) VALUES (?, ?, ?, ?, ?)";
  $params = [$username, $name, $email, $password, $now];
  return $this->getQuery($sql, $params);
}
}

