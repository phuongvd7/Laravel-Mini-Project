<?php

namespace App\Http\Controllers;
use App\Models\Theloai;
use Illuminate\Http\Request;

class TheloaiController extends Controller
{
    
    public function index()
    {
        $theloai =  Theloai::orderBy('id','DESC')->get();
        return view('admincp.theloai.index')->with(compact('theloai'));
    }

    
    public function create()
    {
        return view('admincp.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
            'tentheloai' => 'required|unique:theloai|max:255',
            'slug_theloai' => 'required|unique:theloai|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
            ],
            [
            'tentheloai.unique' =>'Tên thể loại đã có, xin điền tên khác',
            'slug_theloai.unique' =>'Slug đã có, xin điền slug khác',
            'tentheloai.required' => 'Tên danh mục phải có nhé',
            'mota.required' => 'Mô tả danh mục phải có nhé',
            ]
            );
        $theloai = new Theloai();
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat =  $data['kichhoat'];
        $theloai->save();
        return redirect()->back()->with('status','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theloai = Theloai::find($id);
        return view('admincp.theloai.edit')->with(compact('theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
            'tentheloai' => 'required|max:255',
            'slug_theloai' => 'required|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required',
        ],  
        [

            'tentheloai.required' => 'Tên danh mục phải có nhé',
            'slug_tentheloai.required' => 'Slug danh mục phải có nhé',
            'mota.required' => 'Mô tả danh mục phải có nhé',
        ] 
        );
        $theloai = Theloai::find($id);
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug_theloai = $data['slug_theloai'];
        $theloai->mota = $data['mota'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();

        return redirect()->back()->with('status','Cập nhật thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
