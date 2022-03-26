@extends('admin.admin_layout')
@section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Иконки</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Иконки</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addicon">Добавить</button>
            </div><!-- End Page Title -->
        </div>
    
    
        <section class="section dashboard mt-2">
            <div class="row">
                 @foreach ($icon as $item)
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card pb-0">
    
                            <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exiticon{{$item->id}}">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_icon/{{$item->id}}">Удалить</a></li>
                            </ul>
                            </div>
    
                            <div class="card-body">

                            <div style="background-image: url(storage/Icon/{{$item->img}}); background-size: cover; height: 200px"></div>
                            </div>
    
                        </div>
                    </div><!-- End Sales Card -->
    
                    <!-- Modal Exit Carousel -->
                    <div class="modal fade" id="exiticon{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header d-flex border-0">
                                <h3 class="modal-title ms-auto" id="exiticon{{$item->id}}">Редактирование</h3>
                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/exit_icon/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div>
                                        <label>Выберите фото</label>
                                        <input type="file" name="img" class="form-control mt-1">
                                        @if($errors->has('img'))
                                            {{$errors->first('img')}}
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
    <div class="modal fade" id="addicon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header d-flex border-0">
            <h3 class="modal-title ms-auto" id="addicon">Добавление</h3>
            <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/add_icon" method="POST" enctype="multipart/form-data">
            @csrf
                <div>
                    <label>Выберите фото</label>
                    <input type="file" name="img" class="form-control mt-1">
                    @if($errors->has('img'))
                        {{$errors->first('img')}}
                    @endif
                </div>

                <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection