<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Menu Quản Lý</div>

                <div class="card-body">
                  
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        {{-- <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button> --}}
                       
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="{{route('home')}}">Admin</a>
                            </li>
                            {{-- <li class="nav-item">
                              <a class="nav-link" href="#">Quản lý danh mục</a>
                            </li> --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Quản lý danh mục
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a>
                                  <a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a>
                                </div>
                              </li>

                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Thể loại
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{route('theloai.create')}}">Thêm thể loại</a>
                                  <a class="dropdown-item" href="{{route('theloai.index')}}">Liệt kê thể loại</a>
                                </div>
                              </li>

                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Sách Truyện
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{route('truyen.create')}}">Thêm sách truyện</a>
                                  <a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê sách truyện</a>
                                </div>
                              </li>

                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Chapter
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{route('chapter.create')}}">Thêm chapter</a>
                                  <a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê chapter</a>
                                </div>
                              </li>

                          </ul>
                          <form class="form-inline my-2 my-lg-0">
                            <input  class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                          </form>
                        </div>
                      </nav>
                    
                </div>
            </div>
        </div>
    </div>
</div>
