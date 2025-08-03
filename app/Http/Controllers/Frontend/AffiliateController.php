<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\HappyUser;
use Illuminate\View\View;

class AffiliateController extends Controller {
    /**
     * Fetches all active FAQs and HappyUsers, then returns the affiliate view with this data.
     *
     * @return View
     */
    public function index() {
        $faqs       = FAQ::where('status', 'active')->get();
        $happyusers = HappyUser::where('status', 'active')->get();
        return view('frontend.layout.affiliate', compact('faqs', 'happyusers'));
    }
}
