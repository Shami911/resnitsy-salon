@extends('admin.admin_layout') @section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Почта</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Почта</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addservice">Изменить</button>
            </div>
            <!-- End Page Title -->
        </div>


        <section class="section dashboard mt-2">
            <div class="row row-cols-3">
                @foreach ($email as $item)
                <div class="col">
                    <div class="card info-card sales-card pb-0">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitemail">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_email/{{$item->id}}">Удалить</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->title}}</h2>
                            <h3 class="carousel-name mt-2 text-truncate w-75">{{$item->slogan}}</h3>
                            <h3 class="carousel-name mt-2 text-truncate w-75">{{$item->slogan2}}</h3>
                        </div>
        </section>
        <!-- End Hero -->
        </div>
        </div>
        <!-- End Sales Card -->

        <!-- Modal Exit Carousel -->
        <div class="modal fade" id="exitemail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex border-0">
                        <h3 class="modal-title ms-auto" id="exitemail">Редактирование</h3>
                        <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/exit_email/{{$item->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mt-2">
                                <input type="text" name="title" value="{{$item->title}}" class="form-control" id="title" placeholder="name@example.com">
                                <label for="title">Название</label> @if($errors->has('title')) {{$errors->first('title')}} @endif

                                <input type="text" name="slogan" value="{{$item->slogan}}" class="form-control" id="slogan" placeholder="name@example.com">
                                <label for="slogan">Слоган</label> @if($errors->has('slogan')) {{$errors->first('slogan')}} @endif
                            <input type="text" name="slogan2" value="{{$item->slogan2}}" class="form-control" id="slogan2" placeholder="name@example.com">
                                <label for="slogan2">Слоган 2</label> @if($errors->has('slogan2')) {{$errors->first('slogan2')}} @endif
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
<div class="modal fade" id="addservice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex border-0">
                <h3 class="modal-title ms-auto" id="addservice">Добавление</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_email" method="POST" enctype="multipart/form-data">
                    @csrf
                            <div class="form-floating mt-2">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="name@example.com">
                                    <label for="title">Название</label>
                                    @if($errors->has('title'))
                                        {{$errors->first('title')}}
                                    @endif
                                </div>

                                <div class="form-floating mt-2">
                                    <input type="text" name="slogan" class="form-control" id="slogan" placeholder="name@example.com">
                                    <label for="slogan">Слоган</label>
                                    @if($errors->has('slogan'))
                                        {{$errors->first('slogan')}}
                                    @endif
                                </div>
                                <div class="form-floating mt-2">
                                    <input type="text" name="slogan2" class="form-control" id="slogan2" placeholder="name@example.com">
                                    <label for="slogan2">Слоган 2</label>
                                    @if($errors->has('slogan2'))
                                        {{$errors->first('slogan2')}}
                                    @endif
                                </div>
                    <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    @endsection