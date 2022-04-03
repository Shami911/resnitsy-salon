@extends('admin.admin_layout')
@section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>О нас</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">О нас</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addimg">Добавить</button>
            </div><!-- End Page Title -->
        </div>
    
    
        <section class="section dashboard mt-2">
            <div class="row">
                 @foreach ($img as $item)
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card pb-0">
    
                            <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitadvertising">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_img_about/{{$item->id}}">Удалить</a></li>
                            </ul>
                            </div>
    
                            <div class="card-body">
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->title}}</h2>    
                            <div style="background-image: url(storage/ImgAbout/{{$item->img}}); background-size: cover; height: 200px"></div>
                            </div>
    
                        </div>
                    </div><!-- End Sales Card -->
    
                    <!-- Modal Exit Carousel -->
                    <div class="modal fade" id="exitadvertising" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header d-flex border-0">
                                <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактирование рекламы</h3>
                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/exit_img_about/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div>
                                        <label>Выберите фото</label>
                                        <input type="file" name="img" class="form-control mt-1">
                                        @if($errors->has('img'))
                                            {{$errors->first('img')}}
                                        @endif
                                    </div>
    
                                    <div class="form-floating mt-2">
                                        <input type="text" name="title" value="{{$item->title}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Название карточки</label>
                                        @if($errors->has('title'))
                                            {{$errors->first('title')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="description" value="{{$item->description}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Описание</label>
                                        @if($errors->has('description'))
                                            {{$errors->first('description')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="slogatLeft" value="{{$item->slogatLeft}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Левый слоган</label>
                                        @if($errors->has('slogatLeft'))
                                            {{$errors->first('slogatLeft')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="descriptionSL" value="{{$item->descriptionSL}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Описание левого слогана</label>
                                        @if($errors->has('descriptionSL'))
                                            {{$errors->first('descriptionSL')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="slogatRight" value="{{$item->slogatRight}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Правый слоган</label>
                                        @if($errors->has('slogatRight'))
                                            {{$errors->first('slogatRight')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="descriptionSR" value="{{$item->descriptionSR}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Описание правого слогана</label>
                                        @if($errors->has('descriptionSR'))
                                            {{$errors->first('descriptionSR')}}
                                        @endif
                                    </div>
    
                                    <button class="btn btn-lg btn-carousel mt-2 w-100">Сохранить</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- End Left side columns -->
        </section>
    </div>
    
    </main><!-- End #main -->
    
    <!-- Modal Add Carousel -->
    <div class="modal fade" id="addimg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header d-flex border-0">
            <h3 class="modal-title ms-auto" id="exampleModalLabel">О нас</h3>
            <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/add_img_about" method="POST" enctype="multipart/form-data">
            @csrf
                <div>
                    <label>Выберите фото</label>
                    <input type="file" name="img" class="form-control mt-1">
                    @if($errors->has('img'))
                        {{$errors->first('img')}}
                    @endif
                </div>
    
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
                    <input type="text" name="slogatLeft" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Левый слоган</label>
                    @if($errors->has('slogatLeft'))
                        {{$errors->first('slogatLeft')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="descriptionSL" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Описание левого слогана</label>
                    @if($errors->has('descriptionSL'))
                        {{$errors->first('descriptionSL')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="slogatRight" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Правый слоган</label>
                    @if($errors->has('slogatRight'))
                        {{$errors->first('slogatRight')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="descriptionSR" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Описание правого слогана</label>
                    @if($errors->has('descriptionSR'))
                        {{$errors->first('descriptionSR')}}
                    @endif
                </div>

                <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection