<?php
namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller {
    public function getIndex() {
        //$posts = DB::table('posts')->select('title', 'body', 'slug', 'image', 'category_id', 'created_at', 'updated_at')->get();
        $posts = Post::orderBy('created_at')->limit(10)->get();
        $tags = Tag::all();
        $categories = Category::all();
        return view('pages.welcome', ['posts'=>$posts])
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    public function getAbout() {
        return view('pages.about');
    }

    public function  getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, array(
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'required|min:10'
        ));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' =>$request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('mojahedhabib3@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Successfully sent message.');
        return redirect()->back();
    }
}

?>