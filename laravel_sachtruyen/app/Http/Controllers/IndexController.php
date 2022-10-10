<?php

namespace App\Http\Controllers;
use App\Models\DanhmucTruyen;
use App\Models\Chapter;
use App\Models\Truyen;
use App\Models\Theloai;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class IndexController extends Controller
{
    public function home(){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->get();

        return view('pages.home')->with(compact('danhmuc','truyen','theloai','slide_truyen'));
    }

    public function danhmuc($slug){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc',$slug)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        // echo $danhmuc_id->id;
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','theloai','slide_truyen'));
    }

    public function theloai($slug){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();

        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $theloai_id = Theloai::where('slug_theloai',$slug)->first();
        $tentheloai = $theloai_id->tentheloai;
        // echo $danhmuc_id->id;
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->get();
        return view('pages.theloai')->with(compact('danhmuc','truyen','tentheloai','theloai','slide_truyen'));
    }

    public function xemtruyen($slug){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $truyen = Truyen::with('danhmucTruyen','theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();

        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->first();


        $cungdanhmuc = Truyen::with('danhmucTruyen','theloai')->where('danhmuc_id',$truyen->danhmucTruyen->id)->whereNotIn('id',[$truyen->id])->get();
        // whereNotIN tra ve 1 mag
        
        
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai','slide_truyen'));
    }

    public function xemchapter($slug){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $truyen = Chapter::where('slug_chapter',$slug)->first();

        //breakcrumb
        $truyen_breadcrumb = Truyen::with('danhmucTruyen','theloai')->where('id',$truyen->truyen_id)->first();
        //endbreakcrumb

        $chapter = Chapter::with('truyen')->where('slug_chapter', $slug)->where('truyen_id',$truyen->truyen_id)->first();

        $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();

        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');

    $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');

        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();

        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();

        return view('pages.chapter')->with(compact('danhmuc','chapter','truyen',
        'all_chapter','next_chapter','previous_chapter'
        ,'max_id','min_id','theloai','truyen_breadcrumb','slide_truyen'));
    }

    public function timkiem(){
        $theloai = Theloai::orderBy('id', 'DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $tukhoa = $_GET['tukhoa'];
        $truyen = Truyen::with('danhmucTruyen','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')
        ->orWhere('tomtat','LIKE','%'.$tukhoa.'%')->orWhere('tacgia','LIKE','%'.$tukhoa.'%')->get();
        
        return view('pages.timkiem')->with(compact('danhmuc','truyen','theloai','slide_truyen','tukhoa'));
    
    }

    public function timkiem_ajax(Request $request){
        $data = $request->all();
        if($data['keywords']){
            $truyen = Truyen::where('kichhoat',0)->where('tentruyen','LIKE','%'.$data['keywords'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block;">';
            
            foreach($truyen as $key => $tr){
                $output.= '<ul class="li_timkiem_ajax"><a href="#">'.$tr->tentruyen.'</a></li>';   
            }
            
           
        
        $output .= '</ul>';
         echo $output;
        }
    }
}