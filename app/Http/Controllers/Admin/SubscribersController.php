<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequests\StoreSubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $domainId = $request->get('locale_id');
        $perPage = 25;

        $builder = Subscriber::latest();

        if (!empty($keyword)) {
            $builder->where('email', 'LIKE', "%$keyword%");
        }

        if (!empty($lang)) {
            $builder->whereIn('locale_id', $domainId);
        }

        $subscribers = $builder->paginate($perPage);

        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.subscribers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreSubscriberRequest $request)
    {
        
        $requestData = $request->all();
        
        Subscriber::create($requestData);

        return redirect('subscribers')->with('flash_message', 'Subscriber added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Subscriber::destroy($id);

        return redirect('subscribers')->with('flash_message', 'Subscriber deleted!');
    }
}
