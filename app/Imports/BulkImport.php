<?php

namespace App\Imports;

use App\Employee;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class BulkImport implements ToModel , WithHeadingRow , SkipsOnError ,WithValidation ,SkipsOnFailure
{

    use Importable,SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'name'     => $row['name'],
            // 'Lastname'    => $row['lastname'], 
            // 'password' => \Hash::make('123456'),
        ]);
    }

    public function rules(): array
    {
        return [
           // email is heading of xlsx file if heading is not present use cellno like 1 ,2 //
             // '*.email' => ['email','unique:users,email'],
        ];
    }

}
