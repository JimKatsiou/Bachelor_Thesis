<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AnnouncementsController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth', ['except' => ['index', 'show']]);
//        //an den exeis kanei log-in se paei sthn log-in page ektos apo ths selida me thn lista me ta posts
//    }

//    public function index()
//    {
//        //$posts = Post::all();
//        //return Post::where('title', 'Post Two')->get();
//        //$posts = DB::select('SELECT * FROM posts');
//        //$posts = Post::orderBy('title','desc')->take(1)->get();
//        //$posts = Post::orderBy('title','desc')->get();
//        $posts = Post::orderBy('created_at','desc')->paginate(10);
//        return view('posts.index')->with('posts', $posts);
//    }

    public function create()
    {
        return view('admin.pages.navpages.announcements_create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'cover_image' => 'image|nullable|max:1999' //!!! to 1999 to apach borei 2MB
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image');
//                ->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/storage/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Post-Announcement
//        $announcements = new Announcements;
//        $announcements->title = $request->input('title');
//        $announcements->body = $request->input('body');
//        $announcements->user_id = auth()->user()->id;
//        $announcements->cover_image = $fileNameToStore;
//        $announcements->save();

        $title = $request->input('title');
        $body = $request->input('content');
        //$cover_image = $request->input('cover_image');
        $cover_image = $request->cover_image = $fileNameToStore;

        $data=array('title'=>$title,'body'=>$body, 'cover_image'=>$cover_image);

        DB::table('announcements')->insert($data);
        return redirect('announcements')->with('message', 'Η Ανακοίνωση δημιουργίθηκε.');

//        return redirect('/$announcements')->with('success', 'Η Ανακοίνωση δημιουργίθηκε');
    }

    public function show($id)
    {
        $announcements = DB::select('select * from announcements where id=?',[$id]);
        return view('admin.pages.navpages.announcements_show',['announcements'=>$announcements]);
    }

    public function edit($id)
    {
        $announcements = DB::select('select * from announcements where id=?',[$id]);
//        dd($announcements);

        //Check if post exists before deleting
//        if (!isset($announcements)){
//            return redirect('/announcements')->with('error', 'No Post Found');
//        }

        return view('admin.pages.navpages.announcements_edit')->with('announcements', $announcements);

//        return view('lesson/edit_lession',['data'=>$data[0]])->with('success', 'Τα δεδομένα ενημερώθηκαν');

//        return view('lesson.edit_lession', compact('lesson'))->with('success', 'Τα δεδομένα ενημερώθηκαν');

////        // Check for correct user! na min pirazei olou user post
////        if(auth()->user()->id !==$announcements->user_id){
////            return redirect('/$announcements')->with('error', 'Unauthorized Page');
////        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);
//        // Handle File Upload
//        if($request->hasFile('cover_image')){
//            // Get filename with the extension
//            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
//            // Get just filename
//            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//            // Get just ext
//            $extension = $request->file('cover_image')->getClientOriginalExtension();
//            // Filename to store
//            $fileNameToStore= $filename.'_'.time().'.'.$extension;
//            // Upload Image
//            $path = $request->file('cover_image')->storeAs('public/storage/cover_images', $fileNameToStore);
//        }
        // Create Post - Announcements
        $title = $request->input('title');
        $body = $request->input('content');
//        //$cover_image = $request->input('cover_image');
//        $cover_image= $request->cover_image = $fileNameToStore;
//        if($request->hasFile('cover_image')){
//            $cover_image->cover_image = $fileNameToStore;
//        }
        DB::update('update announcements set title = ?, body = ?  where id = ?',[$title,$body,$id]);

        return redirect('/announcements')->with('success', 'Η Ανανέωση έγινε με επιτυχία');
    }

    public function destroy($id)
    {
        $announcements = DB::select('select * from announcements where id=?',[$id]);

        //Check if post exists before deleting
        if (!isset($announcements)){
            return redirect('/announcements')->with('error', 'No Post Found');
        }

////        // Check for correct user
////        if(auth()->user()->id !==$announcements->user_id){
////            return redirect('/announcements')->with('error', 'Unauthorized Page');
////        }
//        if($announcements->cover_image != 'noimage.jpg'){
//            // Delete Image
//            Storage::delete('public/cover_images/'.$announcements->cover_image);
//        }
        DB::delete('delete from announcements where id = ?',[$id]);
        return redirect('announcements')->with('message', 'Το μάθημα διαγράφηκε επιτυχώς.');

//        $announcements->delete();
//        return redirect('/announcements')->with('success', 'Post Removed');
    }
}
