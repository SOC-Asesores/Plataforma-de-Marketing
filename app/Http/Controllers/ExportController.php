<?php

namespace App\Exports;
namespace App\Http\Controllers;

use App\Invoice;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registros;
use App\Models\Archivos;
use App\Models\Folders;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Str;


class InvoicesExport implements FromQuery
{
    use Exportable;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function query()
    {
        return Invoice::whereBetween('updated_at', [$from, $to])->get();
    }
}
?>