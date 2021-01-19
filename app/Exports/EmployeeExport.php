<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Fromquery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class EmployeeExport implements Fromquery, WithHeadings, WithEvents
{
    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Phone',
            'Salary',
            'Department'
        ];
    }
    public function registerEvents(): array
    {
        $styleArray =  [
            'font' => [
                'bold' => true,
            ],
            'background' => [
                'color'=> '#000000'
            ]
        ];
        return [
            AfterSheet::class => function (AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:G1')->applyFromArray($styleArray);
            },
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     // return Employee::all();
    //     return collect(Employee::getEmployee());
    // }
    public function query()
    {
        // return Employee::all();
        return Employee::where('id', '<', 25);
    }
}
