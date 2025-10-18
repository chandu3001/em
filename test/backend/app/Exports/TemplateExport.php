<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use App\Models\OptionTranslation;

class TemplateExport implements WithMapping, FromCollection, WithHeadings, WithColumnWidths, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $data;
    public $options;
    public $Count;
    public $total;
    public function __construct($data, $options)
    {
        $this->data = $data;
        $this->options = $options;
        $this->Count = $options['option_count'];
        $this->total = count($data);

    }

    public function collection()
    {
        return $this->data;
    }

    public function map($data): array
    {
        $result = [
            $data->id,
            $data[$this->options['from']['language_name'] . "_question"],
        ];
        $correct = 0;
        for ($i = 0; $i < $this->options['option_count']; $i++) {
            array_push($result, $data[$this->options['from']['language_name'] . "_option_" . $this->options['numberstoAlpha'][$i]]);
            if (($data[$this->options['from']['language_name'] . '_is_correct_' . $this->options['numberstoAlpha'][$i]]) == 1) {
                $correct = $i + 1;
            }
        }
        array_push($result, $correct);
        array_push($result, $data[$this->options['to']['language_name'] . "_question"]);
        $correct = 0;

        $optionTranlate = OptionTranslation::select('option_translation')->where('language_code', $this->options['to']['language_code'])->get()->first();

        for ($i = 0; $i < $this->options['option_count']; $i++) {
            if (($i == $data['total_options'] - 1) && $data['no_shuffle'] == 1 && $optionTranlate) {
                array_push($result, $optionTranlate->option_translation);
            } else {
                array_push($result, $data[$this->options['to']['language_name'] . "_option_" . $this->options['numberstoAlpha'][$i]]);
            }
            if (($data[$this->options['to']['language_name'] . '_is_correct_' . $this->options['numberstoAlpha'][$i]]) == 1) {
                $correct = $i + 1;
            }
        }
        array_push($result, $correct);
        array_push($result, $this->options['to']['id']);



        return $result;
    }

    public function styles(Worksheet $sheet)
    {
        $helper = ['A', 'B', "C", 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        // Make sure you enable worksheet protection if you need any of the worksheet or cell protection features!
        $sheet->getParent()->getActiveSheet()->getProtection()->setSheet(true);

        // lock all cells then unlock the cell
        $sheet->getParent()->getActiveSheet()
            ->getStyle($helper[$this->Count + 3] . '2:' . $helper[($this->Count + 3 + $this->Count) + 1] . ($this->total + 1))
            ->getProtection()
            ->setLocked(Protection::PROTECTION_UNPROTECTED);

        // styling first row
        $sheet->getStyle(1)->getFont()->setBold(true);
    }


    public function columnWidths(): array
    {
        return [
            'B' => 60,
            'C' => 40,
            'D' => 40,
            'E' => 40,
            'F' => 40,
            'G' => 40,
            'H' => 40,
            'I' => 40,
            "J" => 60,
            "K" => 60,
            "L" => 60,
            "M" => 60,
            "N" => 60,
            "O" => 60,
            "P" => 60,
            "Q" => 60,
            "R" => 60,
            "S" => 60,
            "T" => 60,
            "U" => 60,
            "V" => 60,



        ];
    }

    public function headings(): array
    {

        $result = [
            "id",
            $this->options['from']['language_name'] . "_question",

        ];
        for ($i = 0; $i < $this->options['option_count']; $i++) {
            array_push($result, $this->options['from']['language_name'] . "_answer_" . $this->options['numberstoAlpha'][$i]);
        }
        array_push($result, $this->options['from']['language_name'] . "_correct_answer");
        array_push($result, $this->options['to']['language_name'] . "_question");
        for ($i = 0; $i < $this->options['option_count']; $i++) {
            array_push($result, $this->options['to']['language_name'] . "_answer_" . $this->options['numberstoAlpha'][$i]);
        }
        array_push($result, $this->options['to']['language_name'] . "_correct_answer");
        array_push($result, "language_id");



        return $result;
    }
}