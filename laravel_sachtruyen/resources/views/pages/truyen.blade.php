@extends('/layout')
{{-- @section('slide')
  @include('pages.slide')
@endsection --}}
@section('content')
   
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmucTruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"> {{$truyen->tentruyen}}</li>
  </ol>
</nav>

<div class="row">
    <div class = "col-md-9">
            <div class="row">
            <div class="col-md-3">
                <img class="card-img-top" src= "{{asset('public/uploads/truyen/thuongmai10.jpg')}}">
            </div>
            <div class="col-md-9">
                <style type ="text/css">
                    .infotruyen{
                        list-style:none;
                    }
                </style>
                <ul class = "infotruyen">
                    <li>Tên truyện: {{$truyen->tentruyen}}</li>
                    <li>Tác giả: {{$truyen->tacgia}}</li>
                    <li>Danh mục truyện : <a href="{{url('danh-muc/'.$truyen->danhmucTruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}
                    </a></li>
                    <li>Thể loại truyện : <a href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}">{{$truyen->theloai->tentheloai}}
                    </a></li>
                    <li>Thể loại : Trinh thám</li>
                    <li>Số chapter : 200</li>
                    <li>Số lượt xem : 2006</li>
                    <li><a href = "#">Xem mục lục</a></li>
                   
                    @if($chapter_dau)
                    <li><a href = "{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class = "btn btn-primary">Đọc online</a></li>
                    @else
                    <li><a class = "btn btn-danger">Hiện tại chưa có chương để đọc</a></li>
                    @endif
                </ul>
            </div>
        </div>
    <div class = "col-md-12">
        <p>ádniafhsdkvhdjfghvsdchbsdjmh</p>
    </div>
<hr>
<h4>Mục lục </h4>
    <ul class = "mucluctruyen">
    @php
     $mucluc = count($chapter);
    @endphp
    @if($mucluc > 0)
        @foreach($chapter as $key => $chap)
        <li><a href = "{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
        @endforeach
    @else
      <li>Đang cập nhật ...</li>
    @endif
    </ul>
    <h4>Sách cùng danh mục</h4>
    <div class="row">
      @foreach($cungdanhmuc as $key => $value)
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
  
          <img class="card-img-top" src= "{{asset('public/uploads/truyen/'.$value->hinhanh)}}">
          <div class="card-body">
            <h5>{{$value->tentruyen}}</h5>
            <p class="card-text">{{$value->tomtat}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{url('xem-truyen/'.$value->slug_truyen)}}"  class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                <a  class="btn btn-sm btn-outline-secondary"><i  class="fa-regular fa-eye">2556</i></a>
                
              </div>
              <small class="text-muted"> 9 mins ago</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach

         

          

         
    {{-- <div class = "col-md-3">
        <h3>Sách hay xem nhiều</h3>
    </div> --}}
</div>

@endsection