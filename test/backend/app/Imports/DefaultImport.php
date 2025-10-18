<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Imports\ImportQuestions;

class DefaultImport implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            new ImportQuestions()
        ];
    }

}