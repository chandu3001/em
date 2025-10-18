<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use App\Models\DefaultBulkUploadIntruction;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class DefaultInstruction implements FromCollection, WithTitle, WithHeadings, WithStyles, WithColumnWidths, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = DefaultBulkUploadIntruction::selectRaw('questions,family, difficulty_level, eliminatory_question, answer_1, all_of_the_above, all_of_the_above_correct, correct_answer')->get()->first();


        $result = [];

        array_push($result, ["Question", $data->questions]);
        array_push($result, ["Group", $data->family]);
        array_push($result, ["Difficulty Level", $data->difficulty_level]);
        array_push($result, ["Eliminatory Question", $data->eliminatory_question]);
        array_push($result, ["Answer 1 \nAnswer 2 \nAnswer 3", $data->answer_1]);
        array_push($result, ["All of the above", $data->all_of_the_above]);
        array_push($result, ["All of the above is correct?", $data->all_of_the_above_correct]);
        array_push($result, ["Correct Answer", $data->correct_answer]);


        return collect($result);

    }

    public function title(): string
    {
        return 'Instructions';
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:Z20')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1:B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->mergeCells('A1:B1');
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true, 'size' => 26]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'B' => 115
        ];
    }
    public function headings(): array
    {
        return [
            "INSTRUCTIONS FOR QUESTION BULK UPLOAD"
        ];
    }
}