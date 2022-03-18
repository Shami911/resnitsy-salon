@extends('admin.admin_layout') @section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Секция</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Секция</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addsection">Изменить секцию</button>
            </div>
            <!-- End Page Title -->
        </div>


        <section class="section dashboard mt-2">
            <div class="row row-cols-3">
                @foreach ($section as $item)
                <div class="col">
                    <div class="card info-card sales-card pb-0">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitsection">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_section/{{$item->id}}">Удалить</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->title}}</h2>
                        </div>
        </section>
        <!-- End Hero -->
        </div>
        </div>
        <!-- End Sales Card -->

        <!-- Modal Exit Carousel -->
        <div class="modal fade" id="exitsection{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex border-0">
                        <h3 class="modal-title ms-auto" id="exitservice">Редактирование секцию</h3>
                        <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/exit_section/{{$item->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mt-2">
                                <input type="text" name="button" class="form-control" id="button" placeholder="name@example.com">
                                <label for="button"></label> @if($errors->has('button')) {{$errors->first('button')}} @endif

                                <input type="text" name="title" value="{{$item->title}}" class="form-control" id="title" placeholder="name@example.com">
                                <label for="title">Название</label> @if($errors->has('title')) {{$errors->first('title')}} @endif

                                <input type="text" name="slogan" value="{{$item->slogan}}" class="form-control" id="slogan" placeholder="name@example.com">
                                <label for="slogan">Слоган</label> @if($errors->has('slogan')) {{$errors->first('slogan')}} @endif
                            </div>
                            <button class="btn btn-lg btn-carousel mt-2 w-100">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        <!-- End Left side columns -->
        </section>
    </div>

</main>
<!-- End #main -->

<!-- Modal Add Carousel -->
<div class="modal fade" id="addsection" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex border-0">
                <h3 class="modal-title ms-auto" id="addsection">Добавление нава</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_section" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mt-2">
                        <input type="text" name="button" class="form-control" id="button" placeholder="name@example.com">
                        <label for="button"></label> @if($errors->has('button')) {{$errors->first('button')}} @endif

                        <input type="text" name="title" class="form-control" id="title" placeholder="name@example.com">
                        <label for="title"></label> @if($errors->has('title')) {{$errors->first('title')}} @endif

                        <input type="text" name="slogan" class="form-control" id="slogan" placeholder="Слоган">
                        <label for="slogan"></label> @if($errors->has('slogan')) {{$errors->first('slogan')}} @endif
                    </div>

                    <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    @endsection