<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class uniqueFields implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $table;
    public $school_id;
    public $attribute;
    public $id;
    public function __construct($table, $school_id, $id = 0)
    {
        $this->table = $table;
        $this->school_id = $school_id;
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->attribute = str_replace("_",' ', $attribute);
        $obj = new $this->table;
        $table_name = $obj->getTable();
        $count = $this->table::where($attribute, $value)->where('school_id', $this->school_id);

        if($table_name == "examinations")
        {
            $count = $count->where('deleted_status', 0);
        }

        if($this->id)
            $count = $count->where("id","!=", $this->id)->count();
        else
            $count = $count->count();

        if($count == 0)
        return true;
        else
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->attribute.' is already exists.';
    }
}
