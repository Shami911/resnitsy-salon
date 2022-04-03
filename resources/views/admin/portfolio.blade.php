@extends('admin.admin_layout')
@section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Портфолио</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Портфолио</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addportfolio">Добавить портфолио</button>
            </div>
            <!-- End Page Title -->
        </div>


        <section class="section dashboard mt-2">
            <div class="row row-cols-3">
                @foreach ($portfolio as $item)
                <div class="col">
                    <div class="card info-card sales-card pb-0">

                       <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitservice{{$item->id}}">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_portfolio/{{$item->id}}">Удалить</a></li>
                            </ul>
                            </div>
    
                            <div class="card-body">
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->title}}</h2> 
                            <div style="background-image: url(storage/Portfolio/{{$item->img}}); background-size: cover; height: 200px"></div>     
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
                                <form action="/exit_portfolio/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating mt-2">


                                        <div class="form-floating mt-2">
                                            <input type="text" name="title" value="{{$item->title}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Название</label>
                                            @if($errors->has('title'))
                                                {{$errors->first('title')}}
                                            @endif
                                        </div>
    
                                        <div class="form-floating mt-2">
                                            <input type="text" name="description" value="{{$item->description}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="description">Описание</label>
                                            @if($errors->has('description'))
                                                {{$errors->first('description')}}
                                            @endif
                                        </div>

                                        <div class="form-floating mt-2">
                                            <input type="text" name="buttonAll" value="{{$item->buttonAll}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="buttonAll">Все</label>
                                            @if($errors->has('buttonAll'))
                                                {{$errors->first('buttonAll')}}
                                            @endif
                                        </div>

                                        <div class="form-floating mt-2">
                                            <input type="text" name="buttonApp" value="{{$item->buttonApp}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="buttonApp">Первый ряд</label>
                                            @if($errors->has('buttonApp'))
                                                {{$errors->first('buttonApp')}}
                                            @endif
                                        </div>

                                        <div class="form-floating mt-2">
                                            <input type="text" name="buttonCard" value="{{$item->buttonCard}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="buttonCard">Второй ряд</label>
                                            @if($errors->has('buttonCard'))
                                                {{$errors->first('buttonCard')}}
                                            @endif
                                        </div>

                                        <div class="form-floating mt-2">
                                            <input type="text" name="buttonWeb" value="{{$item->buttonWeb}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="buttonWeb">Третий ряд</label>
                                            @if($errors->has('buttonWeb'))
                                                {{$errors->first('buttonWeb')}}
                                            @endif
                                        </div>

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
<div class="modal fade" id="addportfolio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex border-0">
                <h3 class="modal-title ms-auto" id="addservice">Добавление</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_portfolio" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-floating mt-2">
                        <div class="form-floating mt-2">
                            <input type="text" name="title" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Название</label>
                            @if($errors->has('title'))
                                {{$errors->first('title')}}
                            @endif
                        </div>
        
                        <div class="form-floating mt-2">
                            <input type="text" name="description" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Описание</label>
                            @if($errors->has('description'))
                                {{$errors->first('description')}}
                            @endif
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="buttonAll" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Все</label>
                            @if($errors->has('buttonAll'))
                                {{$errors->first('buttonAll')}}
                            @endif
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="buttonApp" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Первый ряд</label>
                            @if($errors->has('buttonApp'))
                                {{$errors->first('buttonApp')}}
                            @endif
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="buttonCard" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Второй ряд</label>
                            @if($errors->has('buttonCard'))
                                {{$errors->first('buttonCard')}}
                            @endif
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="buttonWeb" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Третий ряд</label>
                            @if($errors->has('buttonWeb'))
                                {{$errors->first('buttonWeb')}}
                            @endif
                        </div>
                       
                    </div>

                    <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
