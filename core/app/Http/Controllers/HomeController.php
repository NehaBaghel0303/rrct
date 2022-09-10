<?php 
/**
 *
 * @category zStarter
 *
 * @ref zCURD
 * @author  Defenzelite <hq@defenzelite.com>
 * @license https://www.defenzelite.com Defenzelite Private Limited
 * @version <zStarter: 1.1.0>
 * @link    https://www.defenzelite.com
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\UserEnquiry;
use App\Models\Article;
use App\Models\Slider;
use App\Models\Faq;
use App\Models\SliderType;
use App\Models\NewsLetter;
use App\Models\WebsitePage;
use App\Traits\DelayNewLoadFormat;
   

class HomeController extends Controller
{
        
    public function index()
    {
        return view('frontend.index');
    }
    public function helpCenter(Request $request)
    {
        $faqs = Faq::query();
        if(request()->has('title') && request()->get('title') != null){
            $faqs->where('title',request()->get('title'));  
        }
        if(request()->has('category_id') && request()->get('category_id') != null){
            $faqs->where('category_id',request()->get('category_id'));
        }
        
        $faqs = $faqs->where('is_publish',1)->paginate(10); 
        return view('backend.help-center',compact('faqs'));
    }
    public function notFound()
    {
        return view('global.error');
    }
    public function introduction()
    {
        return view('frontend.introduction');
    }
    public function maintanance()
    {
        return view('global.maintanance');
    }
    
    use DelayNewLoadFormat;
    public function taritCheck()
    {
        return dd($this-> delayNewLoadFormat());
    }
    
    public function page($slug = null)
    {
        if($slug != null){
            $page = WebsitePage::where('slug', '=', $slug)->whereStatus(1)->first();
                if(!$page){
                    abort(404);
                }
        }else{
            $page = null;
        }
        return view('frontend.page',compact('page'));
    }

  


    public function smsVerification(Request $request)
    {   
        if(auth()->check()){
            $user = auth()->user();
        }else{
            $user = User::where('phone', $request->phone)->first();
        }
        
        if($user->temp_otp != null){
            if($user->temp_otp = $request->verification_code){
                $user->update(['is_verified' => 1,'temp_otp'=>null ]);
                return redirect()->route('panel.dashboard');
                return $request->all();
            }else{
                return back()->with('error','OTP Mismatch');
            }
        }else{
            return back()->with('error','Try Again');
        }
    }

  
   
    public function about(Request $request)
    {
        $slider_type = SliderType::whereTitle('our_greatest_minds')->first();
        $sliders = Slider::whereSliderTypeId($slider_type->id)->whereStatus(1)->get();
        return view('frontend.website.about',compact('sliders'));
    }
    public function storeNewsletter(Request $request)
    {
        $news = NewsLetter::create([
            'type' => $request->get('type'),
            'group_id' => $request->get('group_id'),
            'value' => $request->get('value'),
        ]);
        return back()->with('success',"Subscribed Successfully!");
    }

    
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAs()
    {
        // If for some reason route is getting hit without someone already logged in
        if (! auth()->user()) {
            return redirect()->url('/');
        }
        
        // If admin id is set, relogin
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            // Save admin id

             if(authRole() == "User"){
                $role = "?role=User";
             }else{
                $role = "?role=Admin";
             }
            $admin_id = session()->get('admin_user_id');

            session()->forget('admin_user_id');
            session()->forget('temp_user_id');

            // Re-login admin
            auth()->loginUsingId((int) $admin_id);

            // Redirect to backend user page
            return redirect(route('panel.users.index').$role);
        } else {
            // return 'f';
            session()->forget('admin_user_id');
            session()->forget('temp_user_id');

            // Otherwise logout and redirect to login
            auth()->logout();

            return redirect('/');
        }
    }
}
