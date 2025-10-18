<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class defaultTemplate implements FromCollection, WithHeadings, WithEvents, WithTitle, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $difficultyLevel;
    public $selects;
    public $families;
    function __construct($families, $difficultyLevel)
    {
        $this->families = $families;
        $this->difficultyLevel = $difficultyLevel;

        $families = $families->pluck('family_name')->toArray();
        $difficultyLevel = $difficultyLevel->pluck('level')->toArray();

        $selects = [
            ['columns_name' => 'B', 'options' => $families],
            ['columns_name' => 'C', 'options' => $difficultyLevel],
            ['columns_name' => 'D', 'options' => ['Yes', 'No']],
            ['columns_name' => 'G', 'options' => ['Yes', 'No']],
            ['columns_name' => 'H', 'options' => ['Yes', 'No']],


        ];
        $this->selects = $selects;
    }
    public function collection()
    {
        return collect([]);
    }

    public function title(): string
    {
        return 'Bulk Upload';
    }


    public function headings(): array
    {
        return [
            'Question',
            'Group',
            'Difficulty level',
            'Eliminatory Question',
            'Answer 1',
            'Answer 2',
            'All of the above',
            'All of the above is correct?',
            'Correct Answer'
        ];
    }

    public function registerEvents(): array
    {
        return [
                // handle by a closure.
            AfterSheet::class => function (AfterSheet $event) {
                foreach ($this->selects as $select) {
                    $dropColumn = $select['columns_name'];
                    $options = $select['options'];
                    // set dropdown list for first data row
                    $validation = $event->sheet->getCell("{$dropColumn}2")->getDataValidation();
                    $validation->setType(DataValidation::TYPE_LIST);
                    $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
                    $validation->setAllowBlank(false);
                    $validation->setShowInputMessage(true);
                    $validation->setShowErrorMessage(true);
                    $validation->setShowDropDown(true);
                    $validation->setErrorTitle('Input error');
                    $validation->setError('Value is not in list.');
                    $validation->setPromptTitle('Pick from list');
                    $validation->setPrompt('Please pick a value from the drop-down list.');
                    $validation->setFormula1(sprintf('"%s"', implode(',', $options)));

                    // clone validation to remaining rows
                    for ($i = 1; $i <= 1000; $i++) {
                        $event->sheet->getCell("{$dropColumn}{$i}")->setDataValidation(clone $validation);
                    }
                    // set columns to autosize
                    for ($i = 1; $i <= 10; $i++) {
                        $column = Coordinate::stringFromColumnIndex($i);
                        $event->sheet->getColumnDimension($column)->setAutoSize(true);
                    }
                }

            },
        ];
    }
}