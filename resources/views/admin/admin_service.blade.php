@extends('admin.admin_layout') @section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Сервис</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Сервис</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addservice">Изменить сервис</button>
            </div>
            <!-- End Page Title -->
        </div>


        <section class="section dashboard mt-2">
            <div class="row row-cols-3">
                @foreach ($service as $item)
                <div class="col">
                    <div class="card info-card sales-card pb-0">

                       <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitservice">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_service/{{$item->id}}">Удалить</a></li>
                            </ul>
                            </div>
    
                            <div class="card-body">
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->icon}}</h2> 
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->card_title}}</h2>    
                            </div>
                    </section><!-- End Hero -->
                    </div>
                </div>
                <!-- End Sales Card -->

                <!-- Modal Exit Carousel -->
                <div class="modal fade" id="exitservice{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex border-0">
                                <h3 class="modal-title ms-auto" id="exitservice">Редактирование сервиса</h3>
                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/exit_service/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating mt-2">

                                        <input type="text" name="icon" value="{{$item->icon}}" class="form-control" id="icon" placeholder="name@example.com">
                                        <label for="icon">Иконка</label> @if($errors->has('icon')) {{$errors->first('icon')}} @endif

                                        <input type="text" name="card_title" value="{{$item->card_title}}" class="form-control" id="card_title" placeholder="name@example.com">
                                        <label for="card_title"></label> @if($errors->has('card_title')) {{$errors->first('card_title')}} @endif

                                        <input type="text" name="card_slogan" value="{{$item->card_slogan}}" class="form-control" id="card_slogan" placeholder="name@example.com">
                                        <label for="card_slogan"></label> @if($errors->has('card_slogan')) {{$errors->first('card_slogan')}} @endif
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
                <h3 class="modal-title ms-auto" id="addservice">Добавление нава</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_service" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mt-2">
                        <input type="text" name="icon" value="{{$item->icon}}" class="form-control" id="icon" placeholder="name@example.com">
                        <label for="icon">Иконка</label> @if($errors->has('icon')) {{$errors->first('icon')}} @endif

                    
                        <input type="text" name="card_title" class="form-control" id="card_title" placeholder="name@example.com">
                        <label for="card_title">Название</label> @if($errors->has('card_title')) {{$errors->first('card_title')}} @endif

                        <input type="text" name="card_slogan" class="form-control" id="card_slogan" placeholder="Слоган">
                        <label for="card_slogan">Слоган</label> @if($errors->has('card_slogan')) {{$errors->first('card_slogan')}} @endif
                    </div>

                    <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    @endsection