<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StoreDictionaryRequest;
use App\Models\Dictionary;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('search');
        $perPage = 150;

        $buider = Dictionary::groupBy(['code', 'uid']);

        if (!empty($keyword)) {
            $buider->where('code', 'LIKE', "%$keyword%")->orWhere('uid', 'LIKE', "%$keyword%");
        }

        $dictionary = $buider->select('code', 'uid')->latest()->paginate($perPage);

        return view('admin.dictionary.index', compact('dictionary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dictionary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDictionaryRequest $request)
    {
        $requestData = $request->all();
        $domains = Localization::all();
        $uid = 'uid-' . Str::random(10);
        foreach ($domains as $domain) {
            Dictionary::create([
                'translate' => $requestData['translate'][$domain->code],
                'locale_id' => $domain->id,
                'code' => $requestData['code'],
                'uid' => Str::lower($uid)
            ]);
        }

        return redirect('admin/dictionary')->with('success', 'Текст добавлен в словарь!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uid)
    {
        $dictionary = Dictionary::where('uid', $uid)->first();

        if (!$dictionary) {
            abort(404);
        }

        return view('admin.dictionary.edit', compact('dictionary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $requestData = $request->all();

        $domains = Localization::all();

        foreach ($domains as $domain) {
            $dictionary = Dictionary::where(['uid' => $uid, 'locale_id' => $domain->id])->first();
            $dictionary->update([
                'translate' => $requestData['translate'][$domain->code]
            ]);

        }

        return redirect('admin/dictionary')->with('success', 'Текст в словаре обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dictionary::destroy($id);

        return redirect('admin/dictionary')->with('success', 'Текст добавлен в словарь!');
    }
}
