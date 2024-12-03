<?php
/**
 * Class Bird
 * @property int $id
 * @property string $common_name
 * @property string $habitat
 * @property string $food
 * @property int $conservation_id
 * @property string $backyard_tips
 * @method static Bird|false find_by_id(int $id)
 */
class Bird extends DatabaseObject {
    static protected $table_name = 'birds';
    static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];

    // Declare all properties
    public $id;
    public $common_name;
    public $habitat;
    public $food;
    public $conservation_id;
    public $backyard_tips;

    public function __construct($args=[]) {
        $this->common_name = $args['common_name'] ?? '';
        $this->habitat = $args['habitat'] ?? '';
        $this->food = $args['food'] ?? '';
        $this->conservation_id = $args['conservation_id'] ?? 1;
        $this->backyard_tips = $args['backyard_tips'] ?? '';
    }

    /**
     * Get the conservation status text
     * @return string
     */
    public function conservation_status() {
        switch($this->conservation_id) {
            case 1: return "Low Concern";
            case 2: return "Moderate Concern";
            case 3: return "Extreme Concern";
            case 4: return "Extinct";
            default: return "Unknown";
        }
    }

    protected function validate() {
        $this->errors = [];

        if(is_blank($this->common_name)) {
            $this->errors[] = "Common name cannot be blank.";
        }
        if(is_blank($this->habitat)) {
            $this->errors[] = "Habitat cannot be blank.";
        }
        if(is_blank($this->food)) {
            $this->errors[] = "Food cannot be blank.";
        }
        if(is_blank($this->conservation_id)) {
            $this->errors[] = "Conservation ID cannot be blank.";
        }
        if(is_blank($this->backyard_tips)) {
            $this->errors[] = "Backyard tips cannot be blank.";
        }

        return $this->errors;
    }
}
?>
