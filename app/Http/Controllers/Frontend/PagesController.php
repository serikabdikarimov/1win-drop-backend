<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Models\Brand;
use App\Models\Localization;
use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function homePage(Request $request)
    {
        $localeId = Localization::where('locale_name', $request->getHost())->first();

        $page = Page::where(['slug' => '/', 'locale_id' => $localeId->id])->first();

        if (!$page) {
            abort(404);
        }

        return view('frontend.pages.page', compact('page'));
    }

    public function page(Request $request, $slug)
    {
        $localeId = Localization::where('locale_name', $request->getHost())->first();

        $page = Page::where(['slug' => $slug, 'locale_id' => $localeId->id])->first();

        if (!$page) {
            abort(404);
        }

        if ($page->type == 3) {
            $author = Autor::where(['id' => $page->type_content_id, 'locale_id' => $localeId->id])->first();
            return view('frontend.pages.author', compact('page','author'));
        }

        if ($page->type == 2) {
            $brand = Brand::where(['id' => $page->type_content_id, 'locale_id' => $localeId->id])->first();
            return view('frontend.pages.brand', compact('page','brand'));
        }

        return view('frontend.pages.page', compact('page', 'slug'));
    }


    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);

        $localeId = Localization::where('locale_name', request()->getHost())->first();

        $subscribe = DB::table('subscribers')->insert([
            'email' => $request->email,
            'locale_id' => $localeId->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($subscribe) {
            return response('success', 200);
        } else {
            return response('error', 500);
        }
    }

    public function contacts(Request $request)
    {
        $localeId = Localization::where('locale_name', request()->getHost())->first();

        $page = Page::where(['slug' => 'contacts', 'locale_id' => $localeId->id])->first();

        if (!$page) {
            abort(404);
        }

        return view('frontend.pages.contacts', compact('page'));
    }

    public function sendMessage(Request $request)
    {

        $localeId = Localization::where('locale_name', request()->getHost())->first();

        $requestData = $request->all();
        $requestData['domain_name'] = $request->getHost();

        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255|email',
            'message' => 'required|min:3|max:500',
            'captcha' => 'required|integer|in:' . session('captcha'),
        ]);

        Mail::send('email.send-message', ['data' =>  $requestData], function($message) use($request){
            $message->to('abdikarimov.s@yandex.kz');
            $message->subject('Message from WebSite');
        });

        return redirect()->back()->with('success', 'Good!');
    }

    function userFavorites(Request $request)
    {
        $requestData = $request->all();

        $localeId = Localization::where('locale_name', request()->getHost())->first();
        $requestData['locale_id'] = $localeId->id;
        $requestData['user_id'] = Auth::user()->id;

        $brand = DB::table('user_favorites')->where([
                'user_id' => $requestData['user_id'],
                'locale_id' => $requestData['locale_id'],
                'brand_id' => $requestData['brand_id']
            ])->first();
        if ($brand) {
            DB::table('user_favorites')->where([
                'user_id' => $requestData['user_id'],
                'locale_id' => $requestData['locale_id'],
                'brand_id' => $requestData['brand_id']
            ])->delete();
        } else {
            DB::table('user_favorites')->insert([
                'user_id' => $requestData['user_id'],
                'locale_id' => $requestData['locale_id'],
                'brand_id' => $requestData['brand_id'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return response('success', 200);
    }


    public function sendReview(Request $request, $brandId)
    {
        $requestData = $request->all();

        $localeId = Localization::where('locale_name', $request->getHost())->first();

        $requestData['locale_id'] = $localeId->id;
        $requestData['user_id'] = Auth::user()->id;
        $requestData['brand_id'] = $brandId;

        Review::create($requestData);

        return redirect()->back()->with('success', __('messages.Отзыв удачно отправлен!'));

    }
}
