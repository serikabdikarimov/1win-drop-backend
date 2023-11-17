<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HtaccessController extends Controller
{
    public function index()
    {
        // Получите текущее содержимое .htaccess
        $htaccessPath = public_path('.htaccess');
        $currentContent = file_get_contents($htaccessPath);

        return view('admin.htaccess.index', ['content' => $currentContent]);
    }

    public function update(Request $request)
    {
        // Получите новое содержимое из запроса
        $newContent = $request->input('htaccess');

        // Путь к файлу .htaccess
        $htaccessPath = public_path('.htaccess');

        // Перезапись содержимого файла
        file_put_contents($htaccessPath, $newContent);
        
        return redirect()->back()->with('success', 'Данные обновлены!');
    }
}
