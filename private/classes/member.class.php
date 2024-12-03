<?php
/**
 * Class Member
 * @method static Member|false find_by_id(int $id)
 */
class Member extends DatabaseObject {
    static protected $table_name = "users";
    static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'user_level', 'hashed_password'];

    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $username;
    public $user_level;
    public $hashed_password;
    public $password;
    public $confirm_password;

    public function __construct($args=[]) {
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->user_level = $args['user_level'] ?? 'm';
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
    }

    public function verify_password($password) {
        return password_verify($password, $this->hashed_password);
    }

    /**
     * Find a member by username
     * @param string $username The username to search for
     * @return Member|false The found member or false if not found
     */
    public static function find_by_username($username) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    protected function validate() {
        $this->errors = [];

        if(is_blank($this->first_name)) {
            $this->errors[] = "First name cannot be blank.";
        }
        if(is_blank($this->last_name)) {
            $this->errors[] = "Last name cannot be blank.";
        }
        if(is_blank($this->email)) {
            $this->errors[] = "Email cannot be blank.";
        } elseif (!has_valid_email_format($this->email)) {
            $this->errors[] = "Email must be a valid format.";
        }
        if(is_blank($this->username)) {
            $this->errors[] = "Username cannot be blank.";
        }
        if(is_blank($this->password)) {
            $this->errors[] = "Password cannot be blank.";
        } elseif (strlen($this->password) < 6) {
            $this->errors[] = "Password must contain at least 6 characters";
        } elseif (!preg_match('/[A-Z]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 uppercase letter";
        } elseif (!preg_match('/[a-z]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 lowercase letter";
        } elseif (!preg_match('/[0-9]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 number";
        }

        if($this->password !== $this->confirm_password) {
            $this->errors[] = "Password and confirm password must match.";
        }

        return $this->errors;
    }
}
?>
