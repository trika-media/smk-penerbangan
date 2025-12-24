<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftaranDataExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'No HP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Asal Sekolah',
            'Jenis Kelamin',
            'Nama Ibu',
            'No HP Ibu',
            'Agama',
            'Accepted',
            'Jurusan',
        ];
    }

    public function map($row): array
    {
        return [
            $row->nama,
            $row->email,
            $row->nohp,
            $row->tempat_lahir,
            $row->tanggal_lahir,
            $row->asal_sekolah,
            $row->jk,
            $row->nama_ibu,
            $row->nohp_ibu,
            $row->agama,
            $row->accepted ? 'Diterima' : 'Belum Diterima',
            $row->jurusanData ? $row->jurusanData->nama : '',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->data;
    }
}
