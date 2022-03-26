@extends('admin.admin_layout') @section('admin_main')
<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Прайс 3 </h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Прайс 3</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addfaq">Добавить прайс</button>
            </div>
            <!-- End Page Title -->
        </div>
        <!-- Modal -->
        <section class="section dashboard mt-2">
            <div class="row">
                @foreach ($price_three as $item)
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card pb-0">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitfaq">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_price_three/{{$item->id}}">Удалить</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="col-lg-3 col-md-6">
                                <div class="box">
                                    <h3>{{$item->title}}</h3>
                                    <h4>{{$item->cost}}<span> / {{$item->time}}</span></h4>
                                    <ul>
                                        <li>{{$item->service1}}</li>
                                        <li>{{$item->service2}}</li>
                                        <li>{{$item->service3}}</li>
                                        <li>{{$item->service4}}</li>
                                        <li>{{$item->service5}}</li>
                                    </ul>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-buy">{{$item->button}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Sales Card -->
                <!-- Modal Exit FAq -->
                <div class="modal fade" id="exitfaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex border-0">
                                <h3 class="modal-title ms-auto" id="exitfaq">Редактирование</h3>
                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/exit_price_three/{{$item->id}}" method="POST">
                                    @csrf
                                    <div>
                                        <div class="form-floating mt-2">
                                            <input type="text" name="title" value="{{$item->title}}" class="form-control" id="title" placeholder="name@example.com">
                                            <label for="title">Название</label> @if($errors->has('title')) {{$errors->first('title')}} @endif
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="number" name="cost" value="{{$item->cost}}" class="form-control" id="cost" placeholder="name@example.com">
                                            <label for="cost">Цена</label> @if($errors->has('cost')) {{$errors->first('cost')}} @endif
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="text" name="time" value="{{$item->time}}" class="form-control" id="time" placeholder="name@example.com">
                                            <label for="time">Время</label> @if($errors->has('time')) {{$errors->first('time')}} @endif
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="text" name="service1" value="{{$item->service1}}" class="form-control" id="service1" placeholder="name@example.com">
                                            <label for="service1">Сервис 1</label> @if($errors->has('service1')) {{$errors->first('service1')}} @endif
                                        </div>

                                        <div class="form-floating mt-2">
                                            <input type="text" name="service2" value="{{$item->service2}}" class="form-control" id="service2" placeholder="name@example.com">
                                            <label for="service2">Сервис 2</label> @if($errors->has('service2')) {{$errors->first('service2')}} @endif
                                        </div>
                                        <div class="form-floating mt-2">
                                            <input type="text" name="service3" value="{{$item->service3}}" class="form-control" id="service3" placeholder="name@example.com">
                                            <label for="service3">Сервис 3</label> @if($errors->has('service3')) {{$errors->first('service3')}} @endif
                                        </div>

                                        <div class="form-floating mt-2">
                                            <input type="text" name="service4" value="{{$item->service4}}" class="form-control" id="service4" placeholder="name@example.com">
                                            <label for="service4">Сервис 4</label> @if($errors->has('service4')) {{$errors->first('service4')}} @endif
                                        </div>

                                        <div class="form-floating mt-2">
                                            <input type="text" name="service5" value="{{$item->service5}}" class="form-control" id="service5" placeholder="name@example.com">
                                            <label for="service5">Сервис 5</label> @if($errors->has('service5')) {{$errors->first('service5')}} @endif
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

<!-- Modal Add FAq -->
<div class="modal fade" id="addfaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex border-0">
                <h3 class="modal-title ms-auto" id="exampleModalLabel">Добавление</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="/add_price_three" method="POST">
                    @csrf
                    <div>
                        <div class="form-floating mt-2">
                            <input type="text" name="title" value="" class="form-control" id="title" placeholder="name@example.com">
                            <label for="title">Название</label> @if($errors->has('title')) {{$errors->first('title')}} @endif
                        </div>
                        <div class="form-floating mt-2">
                            <input type="number" name="cost" value="" class="form-control" id="cost" placeholder="name@example.com">
                            <label for="cost">Цена</label> @if($errors->has('cost')) {{$errors->first('cost')}} @endif
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" name="time" value="" class="form-control" id="time" placeholder="name@example.com">
                            <label for="time">Время</label> @if($errors->has('time')) {{$errors->first('time')}} @endif
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" name="service1" value="" class="form-control" id="service1" placeholder="name@example.com">
                            <label for="service1">Сервис 1</label> @if($errors->has('service1')) {{$errors->first('service1')}} @endif
                        </div>

                        <div class="form-floating mt-2">
                            <input type="text" name="service2" value="" class="form-control" id="service2" placeholder="name@example.com">
                            <label for="service2">Сервис 2</label> @if($errors->has('service2')) {{$errors->first('service2')}} @endif
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" name="service3" value="" class="form-control" id="service3" placeholder="name@example.com">
                            <label for="service3">Сервис 3</label> @if($errors->has('service3')) {{$errors->first('service3')}} @endif
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" name="service4" value="" class="form-control" id="service4" placeholder="name@example.com">
                            <label for="service4">Сервис 4</label> @if($errors->has('service4')) {{$errors->first('service4')}} @endif
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" name="service5" value="" class="form-control" id="service5" placeholder="name@example.com">
                            <label for="service5">Сервис 5</label> @if($errors->has('service5')) {{$errors->first('service5')}} @endif
                        </div>
                        <div class="form-floating mt-2">
                            <input type="text" name="button" value="" class="form-control" id="button" placeholder="name@example.com">
                            <label for="button">Кнопка</label> @if($errors->has('button')) {{$errors->first('button')}} @endif
                        </div>
                    </div>
                    <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection