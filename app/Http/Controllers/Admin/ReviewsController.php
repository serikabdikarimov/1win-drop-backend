<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Brand;
use App\Models\Localization;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();
        $keyword = $request->get('search');
        $brandId = $request->get('brand_id');
        $status = $request->get('status');
        $perPage = 25;

        $builder = Review::join('users', 'users.id', 'reviews.user_id')->join('brands', 'brands.id', 'reviews.brand_id')->select('reviews.id', 'reviews.user_id', 'reviews.vote', 'reviews.brand_id', 'reviews.is_active', 'reviews.created_at', 'reviews.locale_id', 'reviews.is_active');

        if (!empty($keyword)) {
            $builder->where('users.name', 'LIKE', "%$keyword%")
                ->orWhere('brands.name', 'LIKE', "%$keyword%");
        }

        if (!empty($brandId)) {
            $builder->where('reviews.brand_id', $brandId);
        }

        if (!empty($status)) {
            $builder->where('reviews.is_active', $status);
        }

        $reviews = $builder->where('reviews.locale_id', $domainId)->latest()->paginate($perPage);
        $brands = Brand::where('locale_id', $domainId)->get();
        $reviewStatuses = Review::REVIEW_STATUSES;

        return view('admin.reviews.index', compact('reviews', 'brands', 'reviewStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $users = User::where('locale_id', $domainId)->get();
        $brands = Brand::where('locale_id', $domainId)->get();
        
        return view('admin.reviews.create', compact('users', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $requestData['locale_id'] = $domainId;

        if (empty($requestData['created_at'])) {
            $requestData['created_at'] = now();
            $requestData['updated_at'] = now();
        }

        Review::create($requestData);

        return redirect('reviews')->with('flash_message', 'Review added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $users = User::all();
        $brands = Brand::all();
        $reviewStatuses = Review::REVIEW_STATUSES;

        return view('admin.reviews.edit', compact('review', 'users', 'brands', 'reviewStatuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        $domainId = session('locale_id') != null ? session('locale_id') : Localization::defaultDomain();

        $requestData['locale_id'] = $domainId;
        
        if (empty($requestData['created_at'])) {
            $requestData['created_at'] = now();
            $requestData['updated_at'] = now();
        }
        
        $review = Review::findOrFail($id);
        $review->update($requestData);

        return redirect('reviews')->with('flash_message', 'Review updated!');
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
        Review::destroy($id);

        return redirect('reviews')->with('flash_message', 'Review deleted!');
    }
}
