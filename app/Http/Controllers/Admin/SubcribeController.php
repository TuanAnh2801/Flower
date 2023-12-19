<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Jobs\SendMailJobSubcribe;
use App\Mail\SendMailtoUserSubcribe;
use App\Models\Product;
use App\Models\TextMail;
use App\Models\User;
use App\Models\User_Subcribe;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SubcribeController extends Controller
{
    public function showSubcribe()
    {
        $subcribes = User_Subcribe::orderBy('created_at', 'desc')->paginate(5);
        // dd($subcribes);
        return view('backend.subcribe.subcribe', compact('subcribes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function deleteSubcribe($id)
    {

        $product = User_Subcribe::findOrFail($id);
        $product->delete($id);
        return redirect()->back()->with('delete','delete 1 user subcribe');
    }
    public function createTextMail(Request $request)
    {
        // dd($request->input());
        $contents = $request->input('content');
        $textMail = new TextMail();
        $textMail->content = $contents;
        $textMail->save();
        // if ($contents != null) {
        //     DB::table('text_mail')->insert(['content' => $contents]);
        //     SendMailJob::dispatch($contents)->delay(now()->addSeconds(30));

        //     return redirect()->back()->with('subcribeMail', 'Gửi mail thành công');
        // } else {

        //     $schedule = new Schedule;
        //     $schedule->call(function () {
        //         $newProducts = Product::where('created_at', '>=', Carbon::now()->subDay())->count();
        //         if ($newProducts >= 8) {
        //             $users = User_Subcribe::all();
        //             foreach ($users as $user) {
        //                 Mail::to($user->email)->send(new SendMailtoUserSubcribe("Sản Phẩm Mới"));
        //             }
        //         }
        //     })->daily();
        // }


        //gửi mail khi đủ 8 sản phẩm trong 1 ngày



        // gửi mail trực tiếp tại đây

        $users = User_Subcribe::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendMailtoUserSubcribe($contents));
        }
        return redirect()->back()->with('subcribeMail', 'Gửi mail thành công');







        // $contents = $request->input('content');
        // $users = User_Subcribe::all();

        // DB::table('text_mail')->insert(['content' => $contents]);

        // foreach ($users as $user) {
        //     Mail::to($user->mail)->send(new SendMailtoUserSubcribe($contents));
        // sleep(60);//nho xoa khi chay
        // }

        // $contents = $request->input('content');
        // SendMailJob::dispatch($contents);
        // DB::table('text_mail')->insert(['content' => $contents]);
        // return redirect()->back()->with('subcribeMail', 'Gửi mail thành công');

    }
}
