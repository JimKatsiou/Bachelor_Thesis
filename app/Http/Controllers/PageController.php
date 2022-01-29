<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $title = 'ERASMUS';
        return view('pages.index', compact('title'));
        //return view('pages.index')->with('title', $title);
    }

    public function announcements()
    {
        $title = 'Ανακοινώσεις';
        //$announcements = DB::select('select * from announcements');
        $announcements = DB::table('announcements')->orderBy('created_at','desc')->paginate(10);
        //dd($announcements);
//        return view('pages.announcements',['data'=>$data])->with('title', $title);
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();
//        $announcements = Post::orderBy('created_at','desc')->paginate(10);
        return view('pages.announcements',['title'=>$title],['announcements'=>$announcements]);
    }

    public function announcements_details()
    {
        $data = DB::select('select * from announcements');
        return view('admin.pages.navpages.announcements_details',['data'=>$data[0]]);
    }

    public function update_announcements_details(Request $request, $id)
    {
        $content = $request->input('content');

        DB::update('update announcements set content = ? where id = ?',[$content,$id]);

        return redirect()->back()->with('message', ' Η Τροποποιήση έγινε με επιτυχία.');
    }

    public function links()
    {
        $title = 'Χρήσιμοι Σύνδεσμοι';
        $data = DB::select('select * from link_page');
        return view('pages.links',['data'=>$data])->with('title', $title);
    }

    public function link_details()
    {
        $data = DB::select('select * from link_page');
        return view('admin.pages.navpages.link_details',['data'=>$data[0]]);
    }

    public function update_link_details(Request $request, $id)
    {
        $content = $request->input('content');

        DB::update('update link_page set content = ? where id = ?',[$content,$id]);

        return redirect()->back()->with('message', ' Η Τροποποιήση έγινε με επιτυχία.');
    }

    public function contact()
    {
        $title = 'Επικοινωνία';
        $data = DB::select('select * from contact');
        return view('pages.contact',['data'=>$data])->with('title', $title);
    }

    public function contact_details()
    {
        $data = DB::select('select * from contact');
        return view('admin.pages.navpages.contact_details',['data'=>$data[0]]);
    }

    public function update_contact_details(Request $request, $id)
    {
        $content = $request->input('content');

        DB::update('update contact set content = ? where id = ?',[$content,$id]);

        return redirect()->back()->with('message', ' Η Τροποποιήση έγινε με επιτυχία.');
    }

    public function erasmuseclass()
    {
        $title = 'ERASMUS-eclass';
        $data = DB::select('select * from eclass_data');
        return view('pages.erasmuseclass',['data'=>$data])->with('title', $title);
    }

    public function erasmuseclass_details()
    {
        $data = DB::select('select * from eclass_data');
        return view('admin.pages.navpages.erasmuseclass',['data'=>$data[0]]);
    }

    public function update_erasmuseclass_details(Request $request, $id)
    {
        $content = $request->input('content');

        DB::update('update eclass_data set content = ? where id = ?',[$content,$id]);

        return redirect()->back()->with('message', ' Η Τροποποιήση έγινε με επιτυχία.');
    }

    public function experiences()
    {
        $title = 'Εμπειρίες Φοιτητών';
        $data = DB::select('select * from student_experience');
        return view('pages.experiences',['data'=>$data])->with('title', $title);
    }

    public function experiences_details()
    {
        $data = DB::select('select * from student_experience');
        return view('admin.pages.navpages.experiences_details',['data'=>$data[0]]);
    }

    public function update_experiences_details(Request $request, $id)
    {
        $content = $request->input('content');

        DB::update('update student_experience set content = ? where id = ?',[$content,$id]);

        return redirect()->back()->with('message', ' Η Τροποποιήση έγινε με επιτυχία.');
    }

    public function about()
    {
        $title = 'About us';
        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function learning()
    {
        $app_data = DB::select('select * from app_data');
        $data = DB::select('select * from application');
        return view('learning_Agreement' , ['app_data'=>$app_data, 'data'=>$data]);
    }

    public function exportExcel()
    {
        $app_data = DB::select('select * from app_data');
        dd($app_data);


//        $column = $app_data->getTableColumns();
    }

}
