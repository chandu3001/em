<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\DefaultInstruction;

class DefaultMultiSheet implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public $difficultyLevel;
    public $families;
    function __construct($families, $difficultyLevel)
    {
        $this->families = $families;
        $this->difficultyLevel = $difficultyLevel;
    }
    public function sheets(): array
    {
        $sheets = [];

        $sheets[0] = new defaultTemplate($this->families, $this->difficultyLevel);
        $sheets[1] = new DefaultInstruction();



        return $sheets;
    }
}