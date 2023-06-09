<?php

class User implements JsonSerializable
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $dateOfBirth;
    private string $email;
    private string $password;
    private string $registrationTime;

    /**
     * @return User|false
     */
    public function getObject(): User|false
    {
        try {
        $dbh = Db::getConnection();
        $sql = "SELECT * from user WHERE id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetchObject('User');
        $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $user;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $dateOfBirth
     * @param string $email
     * @param string $password
     * @return User
     */
    // get all info from input fields to create a new User in DB
    public function createNew(string $firstName, string $lastName, string $dateOfBirth, string $email, string $password): User
    {
        try {
            // handle DB using strictly privileges we need. INSERT in this case
            $dbh = Db::getConnection();
            //query
            $sql = "INSERT INTO user (id, firstName, lastName, dateOfBirth, email, password, registrationTime)
                VALUES (NULL, :firstName, :lastName, :dateOfBirth, :email, :password, :registrationTime)";
            //prepare query
            $stmt = $dbh->prepare($sql);
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
            //store in $id the last id inserted in Db
            $id = $dbh->lastInsertId();
            //close connection to database
            $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        // return as result of this function a new object User
        return new User($id, $firstName, $lastName, $dateOfBirth, $email, $password, $registrationTime);
    }

    /**
     * @param string $email
     * @return bool
     */
    public
    function checkForEmail(string $email): bool
    {
        try {
        // handle DB using strictly privileges we need. SELECT in this case
        $dbh = Db::getConnection();
        // Check if email already exists in database
        $sql = "SELECT id FROM user WHERE email = :email";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        // return true or false if find something or not
        $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $stmt->rowCount() > 0;

    }

    public
    function grantAccess(string $email, string|null $password): User|false
    {
        try {
        $checkEmail = (new User())->checkForEmail($email);
        // if checkForEmail finds something, then stores it in $checkEmail
        if ($checkEmail === true && isset($password)) {
            // search if input passwd matches the one associated to email in Db
            $dbh = Db::getConnection();
            $sql = "SELECT * FROM user WHERE email =:email AND password = :password";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $dbh = null;
            return $stmt->fetchObject('User');
        } elseif ($checkEmail === true && !isset($password)) {
            $dbh = Db::getConnection();
            $sql = "SELECT * FROM user WHERE email =:email";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $dbh = null;
            return $stmt->fetchObject('User');
        } else {
            return false;
        }
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
    }

    /**
     * @param $column
     * @param $newValue
     * @return void
     */
    public
    function updateInfo($column, $newValue): void
    {
        try {
//          handle Db using user_update, which can only update data
            $dbh = Db::getConnection();
            $sql = "UPDATE user SET $column=:newValue WHERE id =:id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':newValue', $newValue);
            $stmt->execute();
        $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
    }

    public function jsonSerialize(): array {
        return ['id' => $this->getId(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'dateOfBirth' => $this->getDateOfBirth(),
            'email' => $this->getEmail()];
    }

    public function search(): array|null
    {
        try {
        $dbh = Db::getConnection();
        $sql = "SELECT * FROM user ORDER BY RAND()";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
    }

    public function getObjectFromId(int $id): User
    {
        try {
        $dbh = Db::getConnection();
        $sql = "SELECT * FROM user WHERE id =:id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
        return $stmt->fetchObject('User');
    }

    public function delete(int $id):void
    {
        try {
        $dbh = Db::getConnection();
        $sql = "DELETE FROM user WHERE id=:id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $dbh = null;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getCode() . ' ' . $e->getLine());
        }
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
    public
    function __construct(int|null    $id = null, string|null $firstName = null, string|null $lastName = null,
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
    public
    function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public
    function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public
    function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public
    function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @return string
     */
    public
    function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public
    function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public
    function getRegistrationTime(): string
    {
        return $this->registrationTime;
    }


}