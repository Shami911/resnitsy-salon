@extends('admin.admin_layout') @section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Нав</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Нав</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addnav">Изменить нав</button>
            </div>
            <!-- End Page Title -->
        </div>


        <section class="section dashboard mt-2">
            <div class="row row-cols-3">
                @foreach ($nav as $item)
                <div class="col">
                    <div class="card info-card sales-card pb-0">

                       <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitnav">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_nav/{{$item->id}}">Удалить</a></li>
                            </ul>
                            </div>
    
                            <div class="card-body">
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->title}}</h2>    
                            <div style="background-image: url(storage/ImgAbout/{{$item->img}}); background-size: cover; height: 200px"></div>  
                            </div>
                    </section><!-- End Hero -->
                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- Modal Exit Carousel -->
                <div class="modal fade" id="exitnav{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex border-0">
                                <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактирование нава</h3>
                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/exit_nav/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating mt-2">
                                        <input type="text" name="link" value="{{$item->link}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Текст 1</label> @if($errors->has('nav')) {{$errors->first('nav')}} @endif
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
<div class="modal fade" id="addnav" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex border-0">
                <h3 class="modal-title ms-auto" id="exampleModalLabel">Добавление нава</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_nav" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mt-2">
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