<?php

namespace App\Exports;

use App\Models\MemberAttendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class AttendanceExport implements WithHeadings, WithEvents, FromCollection
{
    public $id;

    /**
     * AttendanceExport constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }


    public function collection()
    {
        return MemberAttendance::query()
            ->select('name', 'email', 'phone')
            ->where('attendance_id', $this->id)
            ->get();
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'phone'
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:C1')
                    ->applyFromArray([
                        'font' => [
                            'color' => ['argb' => 'FFFFFF'],
                        ]
                    ])
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('244062');
            }
        ];
    }
}
