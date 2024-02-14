<?php namespace App\Imports;

use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return new Student([
            'name' => $row[0],
            'email' => $row[1],
            'password' => Hash::make($row[2]),
            // Add other columns here if needed
        ]);
    }
}
