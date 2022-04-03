@extends('admin.admin_layout')
@section('admin_main')

<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Счетчик</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Счетчик</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addcount">Добавить </button>
            </div><!-- End Page Title -->
        </div>
    
    
        <section class="section dashboard mt-2">
            <div class="row">
                 @foreach ($count as $item)
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
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->Clients}}</h2>    
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->SloganClients}}</h2> 
                             <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->Projects}}</h2>    
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->SloganProjects}}</h2> 
                             <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->Support}}</h2>    
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->SloganSupport}}</h2>
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->HardWorkers}}</h2>    
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$item->SloganWorkers}}</h2>   
                            <div style="background-image: url(storage/ImgAbout/{{$item->img}}); background-size: cover; height: 200px"></div>
                            </div>
    
                        </div>
                    </div><!-- End Sales Card -->
    
                    <!-- Modal Exit Carousel -->
                    <div class="modal fade" id="exitadvertising" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header d-flex border-0">
                                <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактирование</h3>
                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/exit_count/{{$item->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                    <div class="form-floating mt-2">
                                        <input type="text" name="Clients" value="{{$item->Clients}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Просмотры</label>
                                        @if($errors->has('Clients'))
                                            {{$errors->first('Clients')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="SloganClients" value="{{$item->SloganClients}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Число</label>
                                        @if($errors->has('SloganClients'))
                                            {{$errors->first('SloganClients')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="Projects" value="{{$item->Projects}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Количество выполненых работ</label>
                                        @if($errors->has('Projects'))
                                            {{$errors->first('Projects')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="SloganProjects" value="{{$item->SloganProjects}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Число работ</label>
                                        @if($errors->has('SloganProjects'))
                                            {{$errors->first('SloganProjects')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="Support" value="{{$item->Support}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Количество отзывов</label>
                                        @if($errors->has('Support'))
                                            {{$errors->first('Support')}}
                                        @endif
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input type="text" name="SloganSupport" value="{{$item->SloganSupport}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Число слогана</label>
                                        @if($errors->has('SloganSupport'))
                                            {{$errors->first('SloganSupport')}}
                                        @endif
                                    </div>

                                    
                                    <div class="form-floating mt-2">
                                        <input type="text" name="HardWorkers" value="{{$item->HardWorkers}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Число оказываемых услуг</label>
                                        @if($errors->has('HardWorkers'))
                                        {{$errors->first('HardWorkers')}}
                                        @endif
                                    </div>
                                    
                                    <div class="form-floating mt-2">
                                        <input type="text" name="SloganWorkers" value="{{$item->SloganWorkers}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Число</label>
                                        @if($errors->has('SloganWorkers'))
                                            {{$errors->first('SloganWorkers')}}
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
    <div class="modal fade" id="addcount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header d-flex border-0">
            <h3 class="modal-title ms-auto" id="exampleModalLabel">Добавление</h3>
            <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/add_count" method="POST" enctype="multipart/form-data">
            @csrf
    
                <div class="form-floating mt-2">
                    <input type="text" name="Clients" value="Просмотры" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput"></label>
                    @if($errors->has('Clients'))
                        {{$errors->first('Clients')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="SloganClients" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Число</label>
                    @if($errors->has('SloganClients'))
                        {{$errors->first('SloganClients')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="Projects" value="Количество выполненых работ" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput"></label>
                    @if($errors->has('Projects'))
                        {{$errors->first('Projects')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="SloganProjects" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Число</label>
                    @if($errors->has('SloganProjects'))
                        {{$errors->first('SloganProjects')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="Support" value="Количество отзывов" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput"></label>
                    @if($errors->has('Support'))
                        {{$errors->first('Support')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="SloganSupport" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Число</label>
                    @if($errors->has('SloganSupport'))
                        {{$errors->first('SloganSupport')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="HardWorkers" value="Число оказываемых услуг" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput"></label>
                    @if($errors->has('HardWorkers'))
                        {{$errors->first('HardWorkers')}}
                    @endif
                </div>

                <div class="form-floating mt-2">
                    <input type="text" name="SloganWorkers" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Число</label>
                    @if($errors->has('SloganWorkers'))
                        {{$errors->first('SloganWorkers')}}
                    @endif
                </div>

                <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection