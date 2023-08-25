<?php

// app/Exports/UsersExport.php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    protected $columns;

    public function __construct($columns)
    {
        $this->columns = $columns;
    }

    public function collection()
    {
        $mappedColumns = collect($this->columns)->map(function ($column) {
            return $this->mapExcelColumnToDbColumn($column);
        });

        return User::select($mappedColumns->toArray())->get();
    }

    public function headings(): array
    {
        return $this->columns;
    }

    private function mapExcelColumnToDbColumn($excelColumn)
    {
        $columnMappings = [
            'name' => 'full_name',
            'phone' => 'phone_number',
            'email' => 'email',
        ];

        return $columnMappings[$excelColumn];
    }
}


?>