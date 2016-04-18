<?php
abstract class Model
{
    // @var PDO|null Connection to the database */
    protected static $dbc = null;
    // @var array Database values for a single record. Array keys should be column names in the DB */
    protected $attributes = array();
    protected static $table = '';
    /**
     * Constructor
     *
     * An instance of a class derived from Model represents a single record in the database.
     *
     * $param array $attributes Optional array of database values to initialize the model record with
     */
    public function __construct(array $attributes = array())
    {
        self::dbConnect();
        // Initialize the $attributes property with the passed value
        $this->attributes = $attributes;
    }
    /**
     * Connect to the DB
     *
     * This method should be called at the beginning of any function that needs to communicate with the database
     */
    protected static function dbConnect()
    {
        if(!self::$dbc)
        {
            // Connect to database
            $dbc = new PDO('mysql:host=127.0.0.1;dbname=users_db', 'admin_user', 'x');
            self::$dbc = $dbc;
            self::$table = 'users';
            // Throw exception on PDO error
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
    /**
     * Get a value from attributes based on its name
     *
     * @param string $name key for attributes array
     *
     * @return mixed|null value from the attributes array or null if it is undefined
     */
    public function __get($name)
    {
        // Return the value from attributes for $name if it exists, else return null
        if(array_key_exists($name, $this->attributes))
        {
            return $this->attributes[$name];
        }
        else
        {
            echo "Error: Attribute {$name} does not exist. Returning NULL";
            return null;
        }
    }
    /**
     * Set a new value for a key in attributes
     *
     * @param string $name key for attributes array
     * @param mixed $value value to be saved in attributes array
     */
    public function __set($name, $value)
    {
        // Store name/value pair in attributes array
        $this->attributes[$name] = $value;
    }
    /** Store the object in the database */
    public function save()
    {
        // Ensure there are values in the attributes array before attempting to save
        // Call the proper database method: if the `id` is set this is an update, else it is a insert
        if(isset($this->attributes['id']))
        {
            $this->update();
        }
        else
        {
            $this->insert();
        }
    }
    /** Remove the object from the database */
    public function delete()
    {
        // Ensure record exists before attempting to delete
        if(isset($this->attributes['id']))
        {
            self::dbConnect();
            $stmt = self::$dbc->query('DELETE FROM users WHERE id = ' . $this->attributes['id']);
            echo "Record " . $this->attributes['id'] . " deleted successfully";
        }
        else
        {
            echo "Cannot delete: Record does not exist";
        }
    }
    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        // Get connection to the database
        self::dbConnect();
        // Return all the matching records
        // $stmt = self::$dbc->query("SELECT * FROM {static::$table}");
        $stmt = self::$dbc->query('SELECT * FROM users');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    /**
     * Insert new entry into database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function insert();
    /**
     * Update existing entry in database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function update();
}
?>