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
                            <h2 class="carousel-name mt-2 text-truncate w-150">{{$item->title}}</h2>
                            <h2 class="carousel-name mt-2 text-truncate w-150">{{$item->slogan}}</h2>
                            <h2 class="carousel-name mt-2 text-truncate w-150">{{$item->button}}</h2>
                            <div style="background-image: url(storage/ImgAbout/{{$item->img}}); background-size: cover; width: 400px;"></div>
                        </div>
        </section>
        <!-- End Hero -->
        </div>
        </div>
        <!-- End Sales Card -->

        <!-- Modal Exit Carousel -->
        <div class="modal fade" id="exitnav" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header d-flex border-0">
                        <h3 class="modal-title ms-auto" id="exitnav">Редактирование</h3>
                        <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/exit_nav/{{$item->id}}" method="POST">
                            @csrf
                            <div>
                                <div class="form-floating mt-2">
                                    <input type="text" name="title" value="{{$item->title}}" class="form-control" id="title" placeholder="name@example.com">
                                    <label for="title">Название</label> @if($errors->has('title')) {{$errors->first('title')}} @endif
                                </div>
                                <div class="form-floating mt-2">
                                    <input type="text" name="slogan" value="{{$item->slogan}}" class="form-control" id="slogan" placeholder="name@example.com">
                                    <label for="slogan">Слоган</label> @if($errors->has('slogan')) {{$errors->first('slogan')}} @endif
                                </div>
                                <div class="form-floating mt-2">
                                    <input type="text" name="button" value="{{$item->button}}" class="form-control" id="button" placeholder="name@example.com">
                                    <label for="button">Кнопка</label> @if($errors->has('button')) {{$errors->first('button')}} @endif
                                </div>

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
                        <div>
                            <input type="text" placeholder="Название" name="title" class="form-control mt-1"> @if($errors->has('title')) {{$errors->first('title')}} @endif
                        </div>
                    </div>
                    <div class="form-floating mt-2">
                        <div>
                            <input type="text" placeholder="Cлоган" name="slogan" class="form-control mt-1"> @if($errors->has('slogan')) {{$errors->first('slogan')}} @endif
                        </div>
                    </div>
                    <div class="form-floating mt-2">
                        <div>
                            <input type="text" placeholder="Кнопка" name="button" class="form-control mt-1"> @if($errors->has('button')) {{$errors->first('button')}} @endif
                        </div>
                    </div>
            </div>

            <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
            </form>
        </div>
    </div>
</div>
@endsection