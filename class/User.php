<?php

class User
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $dateOfBirth;
    private string $email;
    private string $password;
    private string $registrationTime;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $dateOfBirth
     * @param string $email
     * @param string $password
     * @return User
     */
    // get all info from input fields to create a new User in DB
    public function registerNewUser(string $firstName, string $lastName, string $dateOfBirth, string $email, string $password): User
    {
        // handle DB using strictly privileges we need. INSERT in this case
        $dbh = new PDO (DB_DNS, DB_USER_INSERT, DB_PASSWD_INSERT);
        //query
        $sql = "INSERT INTO user (id, firstName, lastName, dateOfBirth, email, password, registrationTime)
                VALUES (NULL, :firstName, :lastName, :dateOfBirth, :email, :password, :registrationTime)";
        //prepare query
        $stmt = $dbh->prepare($sql);
        //hash password for more security
        $password = password_hash($password, PASSWORD_DEFAULT);
        //get actual time of when User is created
        $registrationTime = date("Y-m-d H:i:s");
        //binding parameters to avoid injections
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':dateOfBirth', $dateOfBirth);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':registrationTime', $registrationTime);
        //execute prepared statement filled with parameters
        $stmt->execute();
        //store in $id the last Id inserted in Db
        $id = $dbh->lastInsertId();
        //close connection to database
        $dbh = null;
        // return as result of this function a new object User
        return new User($id, $firstName, $lastName, $dateOfBirth, $email, $password, $registrationTime);
    }

    /**
     * @param string $email
     * @return bool
     */
    public function checkForEmail(string $email): bool
    {
        // handle DB using strictly privileges we need. SELECT in this case
        $dbh = new PDO (DB_DNS, DB_USER_SELECT, DB_PASSWD_SELECT);
        // Check if email already exists in database
        $sql = "SELECT id FROM user WHERE email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        // fetchObject returns as an Object the query stored in $stmt
        // the object is saved in $result
        $result = $stmt->fetchObject('User');

        if ($result) {
            // if something is returned, then data is retrieved
            return true;
        } else {
            return false;
        }
    }

    public function grantAccess(string $email, string $password): bool
    {
        // check if email exists in Db
        $dbh = new PDO (DB_DNS, DB_USER_SELECT, DB_PASSWD_SELECT);
        $this->email = $email;
        $checkEmail = (new User())->checkForEmail($email);
        // if check forForEmail finds something, then stores it in $checkEmail
        if ($checkEmail === true) {
            // search if input passwd matches the one associated to email in Db
            $sql = "SELECT password FROM user WHERE email =:email";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $hash_password = $stmt->fetch();
            $this->password = $password;
            $validity = password_verify($password, $hash_password['password']);
        } else {
            $validity = false;
        }
        return $validity;
    }


    /**
     * @param int|null $id
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $dateOfBirth
     * @param string|null $email
     * @param string|null $password
     * @param string|null $registrationTime
     */
    public function __construct(int|null    $id = null, string|null $firstName = null, string|null $lastName = null,
                                string|null $dateOfBirth = null, string|null $email = null,
                                string|null $password = null, string|null $registrationTime = null)
    {
        if (isset($id) && isset($firstName) && isset($lastName) && isset($dateOfBirth) && isset($email) && isset($password) && isset($registrationTime)) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->dateOfBirth = $dateOfBirth;
            $this->email = $email;
            $this->password = $password;
            $this->registrationTime = $registrationTime;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getRegistrationTime(): string
    {
        return $this->registrationTime;
    }


}