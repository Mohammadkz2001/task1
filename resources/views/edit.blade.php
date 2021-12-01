@extends('layouts.sidebar')

    <!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>add books</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vazir-font.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontello.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/jalalidatepicker/persian-datepicker.min.css')}}">
</head>
<body id="page-top">
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="icon-fw icon-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">کتابخانه شهر کدنشین ها</div>
        </a>
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{route('mainepage')}}">
                <i class="icon-fw icon-book"></i>
                <span>صفحه اصلی</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">
                <i class="icon-fw icon-gauge"></i>
                <span>پیشخوان</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('books.list')}}">
                <i class="icon-fw icon-book"></i>
                <span>کتاب‌ها</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('authors.list')}}">
                <i class="icon-fw icon-users"></i>
                <span>نویسندگان</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('publishers.list')}}">
                <i class="icon-fw icon-building-filled"></i>
                <span>ناشران</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>


    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="icon-menu"></i>
                </button>
            </nav>
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800"><i class="icon-plus"></i> ویرایش کتاب</h1>
                {{--                <?php--}}
                {{--                $flash = Flash::get();--}}
                {{--                if (!empty($flash)) { ?>--}}
                {{--                <div class="alert alert-<?php echo $flash['type'] ?>" role="alert">--}}
                {{--                    <?php echo $flash['message'] ?>--}}
                {{--                </div>--}}
                {{--                <?php } ?>--}}
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="post" action="{{route('update.book',$book->id) }}">
                            @csrf
                            @method('PUT')
                            @php
                                echo \Illuminate\Support\Facades\Session::get('massage')
                            @endphp
                            <div class="form-group">

                                <label for="name">عنوان کتاب</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="author">نام نویسنده</label>
                                <select name="author_id" class="form-control" id="id">
                                    @foreach(\App\Models\Author::latest()->get() as $auth)
                                        <option value="{{$auth->id}}">{{$auth->name}}</option>
                                    @endforeach
                                </select>
                                {{--                                <input type="text" name="author"  id="author">--}}
                            </div>
                            <div class="form-group">
                                <label for="publisher">نام ناشر</label>
                                <select name="publisher_id" class="form-control" id="id">
                                    @foreach(\App\Models\publisher::latest()->get() as $pub)
                                        <option value="{{$pub->id}}">{{$pub->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">

                                <label for="name">تعداد</label>
                                <input type="text" name="quantity" class="form-control" id="name">
                            </div>

                            <div class="form-group">

                                <label for="name">روز فروش</label>
                                <input type="date" name="time" class="form-control" id="name">
                            </div>

                            <div class="form-group">

                                <label for="name">ساعت فروش</label>
                                <input type="time" name="time" class="form-control" id="name">
                            </div>


                            <button type="submit"  class="btn btn-primary">ثبت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>By <a target="_blank" href="https://quera.ir">Quera</a></span>
                </div>
            </div>
        </footer>
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="icon-angle-up"></i>
</a>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle">حذف کتاب</h5>
                {{--                <form action="{{route('book.delete',$id)}}" method="post">--}}
                {{--                    @csrf--}}
                {{--                    @method('DELETE')--}}
                {{--                    <button class="btn btn-secondary" type="button" data-dismiss="modal">لغو</button>--}}
                {{--                    <a href="{{route('books.list')}}" id="deleteConfirm" class="btn btn-danger">حذف</a>--}}
                {{--                </form>--}}

                {{--            </div>--}}
                {{--            <div class="modal-body">آیا مطمئن هستید که می‌خواهید این کتاب را حذف کنید؟</div>--}}
                {{--            <div class="modal-footer">--}}
                {{--                <form action="{{route('book.delete',$id)}}" method="post">--}}
                {{--                    @csrf--}}
                {{--                    @method('DELETE')--}}
                {{--                        <button class="btn btn-secondary" type="button" data-dismiss="modal">لغو</button>--}}
                {{--                        <a href="{{route('books.list')}}" id="deleteConfirm" class="btn btn-danger">حذف</a>--}}
                {{--                </form>--}}

            </div>
        </div>
    </div>
</div>






<script>var base_url = '#';</script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{asset('assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
</body>
</html>


