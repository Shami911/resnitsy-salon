@extends('admin.admin_layout') @section('admin_main')
<main id="main" class="main">

    <div class="container d-flex flex-column px-0">
        <div class="pagetitle">
            <div class="d-flex">
                <div>
                    <h1>Часто задаваемые вопросы</h1>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="index.html">Главная</a></li>
                            <li class="breadcrumb-item active">Часто задаваемые вопросы</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-carousel ms-auto" data-bs-toggle="modal" data-bs-target="#addfaq">Добавить FAQ</button>
            </div>
            <!-- End Page Title -->
        </div>
        <!-- Modal -->
        <section class="section dashboard mt-2">
            <div class="row">
                @foreach ($title_faq as $faq)
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card pb-0">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exitfaq">Редактировать</button></li>
                                <li><a class="dropdown-item" href="/delete_title_faq/{{$faq->id}}">Удалить</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h2 class="carousel-name mt-2 text-truncate w-75">{{$faq->title}}</h2>
                        </div>

                    </div>
                </div>
                <!-- End Sales Card -->
                <!-- Modal Exit FAq -->
                <div class="modal fade" id="exitfaq" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex border-0">
                                <h3 class="modal-title ms-auto" id="exampleModalLabel">Редактирование</h3>
                                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/exit_title_faq/{{$faq->id}}" method="POST">
                                    @csrf
                                    <div>
                                        <div class="form-floating mt-2">
                                            <input type="text" name="title" value="{{$faq->title}}" class="form-control" id="title" placeholder="name@example.com">
                                            <label for="question">Название</label> @if($errors->has('title')) {{$errors->first('title')}} @endif
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
                <h3 class="modal-title ms-auto" id="exampleModalLabel">Добавление FAQ</h3>
                <button type="button" class="btn-close fs-4" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="/add_title_faq" method="POST">
                    @csrf
                    <div>
                        <div class="form-floating mt-2">
                            <input type="text" name="title" value="" class="form-control" id="title" placeholder="name@example.com">
                            <label for="title">Название</label> @if($errors->has('title')) {{$errors->first('title')}} @endif
                        </div>

                    </div>
                    <button class="btn btn-lg btn-carousel mt-2 w-100">Добавить</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection