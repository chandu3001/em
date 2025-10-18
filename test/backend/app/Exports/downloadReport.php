<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

// use Maatwebsite\Excel\Concerns\WithStyles;
// use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class downloadReport implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $data;
    public $school_id;
    public function __construct($data, $school_id)
    {
        foreach ($data as $da) {
            $da->gender = $da->gender == 1 ? "Male" : ($da->gender == 2 ? "Female" : '--');
        }

        $this->data = $data;
        $this->school_id = $school_id;

    }

    public function collection()
    {
        return $this->data;
    }


    public function columnWidths(): array
    {
        return [
            'B' => 40,
            'D' => 25,
            'E' => 25,
            'F' => 25,
            'G' => 25,
            'H' => 25,
            'I' => 25,
            'J' => 25,
            'K' => 25,
            'L' => 25,
            'M' => 25,
        ];
    }


    public function headings(): array
    {
        if ($this->school_id) {
            return [
                "Student Name",
                "National ID",
                "Student ID",
                "Gender",
                "Attended Language",
                "License Type",
                "Sub-License Type",
                "Exam Name",
                "Date & Time",
                "Total Score",
                "Total Questions",
                "Total Correct Answers",
                "Total Wrong Answers",
                "Total Obtained score",
                "Results"
            ];
        } else {
            return [
                "Student Name",
                "National ID",
                "Student ID",
                "Gender",
                "Attended Language",
                "Driving School",
                "License Type",
                "Sub-License Type",
                "Exam Name",
                "Date & Time",
                "Total Score",
                "Total Questions",
                "Total Correct Answers",
                "Total Wrong Answers",
                "Total Obtained score",
                "Results"
            ];
        }
    }
}