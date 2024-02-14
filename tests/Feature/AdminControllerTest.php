<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    public function testIndex()
    {
        $response = $this->get(route('indexadmin'));

        $response->assertStatus(200);
    }

    public function testCreateStudentFromAdmin()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ];

        $response = $this->post(route('createstudentfromadmin'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('students', ['email' => $data['email']]);
    }

    // public function testCreateStudentFromAdminWithExcel()
    // {
    //     Excel::fake();

    //     $file = UploadedFile::fake()->create('students.xlsx');

    //     $response = $this->post(route('createstudentfromadminwithexel'), [
    //         'excel' => $file
    //     ]);

    //     $response->assertRedirect();
    //     Excel::assertImported('students.xlsx', function($import) {
    //         return true; 
    //     });
    // }
}
