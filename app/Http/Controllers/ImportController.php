<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data; // Replace with your model
use App\Models\Data as ModelsData;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        // Import CSV using Maatwebsite\Excel
        $data = \Maatwebsite\Excel\Excel::toCollection(new ModelsData(), $file);

        // Process and save data to database
        foreach ($data as $row) {
            ModelsData::create([
                'column1' => $row[0],
                'column2' => $row[1],
               
            ]);
        }

        return redirect()->back()->with('success', 'CSV imported successfully');
    }
}
