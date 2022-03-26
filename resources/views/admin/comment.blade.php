@extends('admin.admin_layout') @section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Комментарии</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Комментарии</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addcomment">Изменить комментарий</button>
            </div>
            <!-- End Page Title -->
        </div>


        <section class="section dashboard mt-2">
            <div class="row row-cols-3">
                @foreach ($comment as $item)
                <div class="col">
                    <div class="card info-card sales-card pb-0" style="background-size:cover; height: 350px; width: 500px ;">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitcomment{{$item->id}}">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_comment/{{$item->id}}">Удалить</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->comment}}</h2>
                            <h3 class="carousel-name mt-2 text-truncate w-75">{{$item->name}}</h3>
                            <h4 class="carousel-name mt-2 text-truncate w-75">{{$item->work}}</h4>
                            <div style="background-image: url(storage/ImgAbout/{{$item->img}}); background-size: cover; height: 200px; width: 400px"></div>
                        </div>
        </section>
        <!-- End Hero -->
        </div>
        </div>
        <!-- End Sales Card -->

        <!-- Modal Exit Carousel -->
        <div class="modal fade" id="exitcomment{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex border-0">
                        <h3 class="modal-title ms-auto" id="exitcomment{{$item->id}}">Редактирование</h3>
                        <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/exit_comment/{{$item->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mt-2">
                                <div>
                                    <input type="file" placeholder="Фото" value="{{$item->img}}" name="img" class="form-control mt-1"> @if($errors->has('img')) {{$errors->first('img')}} @endif
                                </div>
                            </div>
                            <div class="form-floating mt-2">
                                <div>
                                    <input type="text" placeholder="Комментарий" value="{{$item->comment}}" name="comment" class="form-control mt-1"> @if($errors->has('comment')) {{$errors->first('comment')}} @endif
                                </div>
                            </div>

                            <div class="form-floating mt-2">
                                <div>
                                    <input type="text" placeholder="Имя и фамилия" value="{{$item->name}}" name="name" class="form-control mt-1"> @if($errors->has('name')) {{$errors->first('name')}} @endif
                                </div>
                            </div>
                            <div class="form-floating mt-2">
                                <div>
                                    <input type="text" placeholder="Профессия" value="{{$item->work}}" name="work" class="form-control mt-1"> @if($errors->has('work')) {{$errors->first('work')}} @endif
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
<div class="modal fade" id="addcomment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex border-0">
                <h3 class="modal-title ms-auto" id="addcomment">Добавление</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add_comment" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mt-2">
                        <div>
                            <input type="file" placeholder="Фото" name="img" class="form-control mt-1"> @if($errors->has('img')) {{$errors->first('img')}} @endif
                        </div>
                    </div>
                    <div class="form-floating mt-2">
                        <div>
                            <input type="text" placeholder="Комментарий" name="comment" class="form-control mt-1"> @if($errors->has('comment')) {{$errors->first('comment')}} @endif
                        </div>
                    </div>
                    <div class="form-floating mt-2">
                        <div>
                            <input type="text" placeholder="Имя и фамилия" name="name" class="form-control mt-1"> @if($errors->has('name')) {{$errors->first('name')}} @endif
                        </div>
                    </div>
                    <div class="form-floating mt-2">
                        <div>
                            <input type="text" placeholder="Профессия" name="work" class="form-control mt-1"> @if($errors->has('work')) {{$errors->first('work')}} @endif
                        </div>
                    </div>
                    <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
    @endsection