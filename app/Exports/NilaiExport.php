<?php

namespace App\Exports;

use App\Models\Nilai;
use App\Models\Tugas;
use App\Models\Matkul;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NilaiExport implements FromView, ShouldAutoSize, WithStyles
{
    use Exportable;

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $tugass = Tugas::ShowTugas($this->id);
        $matkul = Matkul::where('id', $tugass->pertemuan->matkul_id)->first();

        $tugas = Nilai::whereHas('pengumpulan', function ($query) {
            $query->where('tugas_id', $this->id);
        })->get();

        return view('frontend.pages.dosen.tugas.export-page', [
            'tugas' => $tugas,
            'tugass' => $tugass,
            'matkul' => $matkul
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->mergeCells('A1:E1');
        $sheet->mergeCells('A2:E2');
        $sheet->getStyle('1')->getFont()->setBold(true);
        $sheet->getStyle('2')->getFont()->setBold(true);
        $sheet->getStyle('1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('C')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('D')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('E')->getAlignment()->setHorizontal('center');
    }
}
