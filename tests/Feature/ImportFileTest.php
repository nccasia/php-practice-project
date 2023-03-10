<?php

use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ImportFileTest extends TestCase
{
    public function testImport_file()
    {
        $file = UploadedFile::fake()->create('myexcel.xlsx');
        Excel::fake();
        $this->post('/upload-file-post', [
            'file' => $file
        ]);
        Excel::assertImported('myexcel.xlsx');
    }
}
