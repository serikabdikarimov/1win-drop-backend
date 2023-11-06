<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schema;
use Illuminate\Http\Request;

class SchemasController extends Controller
{
    public function index()
    {
        $schema = Schema::where('schema_type', 'organization')->pluck('data', 'locale_id');

        return view('admin.schemas.index', compact('schema'));
    }

    public function update(Request $request)
    {
        $requestData = $request->all();
        
        foreach ($requestData as $key => $value) {

            if (is_array($value)) {
                Schema::updateOrCreate([
                    'locale_id' => $key,
                    'schema_type' => 'organization'
                ],[
                    'locale_id' => $key,
                    'schema_type' => 'organization',
                    'data' => json_encode($value)
                ]);
            }
        }
        
        return redirect()->back()->with('success', 'Данные обновлены!');
    }
}
