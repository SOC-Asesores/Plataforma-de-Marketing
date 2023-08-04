<?php

namespace App\Exports;

use App\Models\Archivos;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ArchivesExport implements FromQuery
{
    use Exportable;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        return Archivos::whereBetween('updated_at', [$this->from, $this->to])->get();
    }
    public function headings(): array
        {
            return [
                'nombre',
                'url',
                'imagen ',
            ];
        }
}

?>