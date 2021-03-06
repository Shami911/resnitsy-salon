<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Админ панель</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets_admin/img/favicon.png" rel="icon">
    <link href="/assets_admin/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets_admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets_admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets_admin/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets_admin/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets_admin/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets_admin/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="/assets_admin/css/admin.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets_admin/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="assets_admin/img/logo.png" alt="">
                <span class="d-none d-lg-block">Админ панель</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a>
                    <!-- End Notification Icon -->

                    <!-- End Notification Nav -->

                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-chat-left-text"></i>
                            <span class="badge bg-success badge-number">3</span>
                        </a>
                        <!-- End Messages Icon -->
                        <!-- End Messages Dropdown Items -->

                    </li>
                    <!-- End Messages Nav -->

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="assets_admin/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2">Д. Тарланова</span>
                        </a>
                        <!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>Д. Тарланова</h6>
                                <span>Специалист по наращиваниваю ресниц</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-person"></i>
                                    <span>Мой профиль</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-gear"></i>
                                    <span>Настройки</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Нуждаетесь в помощи?</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Выйти</span>
                                </a>
                            </li>

                        </ul>
                        <!-- End Profile Dropdown Items -->
                    </li>
                    <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Компоненты</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin_nav">
                            <i class="bi bi-circle"></i><span>Текст</span>
                        </a>
                    </li>
                    <li>
                        <a href="/icon">
                            <i class="bi bi-circle"></i><span>Иконки</span>
                        </a>
                    </li>
                    <li>
                        <a href="/img_about">
                            <i class="bi bi-circle"></i><span>Главная страница фото</span>
                        </a>
                    </li>
                    <li>
                        <a href="/count">
                            <i class="bi bi-circle"></i><span>счетчик</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin_title_service">
                            <i class="bi bi-circle"></i><span>Название сервиса</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin_service">
                            <i class="bi bi-circle"></i><span>Сервис</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin_section">
                            <i class="bi bi-circle"></i><span>Секция</span>
                        </a>
                    </li>
                    <li>
                        <a href="/reviews">
                            <i class="bi bi-circle"></i><span>Отзывы</span>
                        </a>
                    </li>
                    <li>
                        <a href="/comment">
                            <i class="bi bi-circle"></i><span>Комментарии</span>
                        </a>
                    </li>
                    <li>
                        <a href="/portfolio">
                            <i class="bi bi-circle"></i><span>Портфолио</span>
                        </a>
                    </li>
                    <li>
                        <a href="/title_faq">
                            <i class="bi bi-circle"></i><span>Название Faq</span>
                        </a>
                    </li>
                    <li>
                        <a href="/main_faq">
                            <i class="bi bi-circle"></i><span>Часто задаваемые вопросы</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pricing_title">
                            <i class="bi bi-circle"></i><span>Название прайса</span>
                        </a>
                    </li>
                    <li>
                        <a href="/price">
                            <i class="bi bi-circle"></i><span>Прайс</span>
                        </a>
                    </li>
                    <li>
                        <a href="/price_two">
                            <i class="bi bi-circle"></i><span>Прайс 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="/price_three">
                            <i class="bi bi-circle"></i><span>Прайс 3</span>
                        </a>
                    </li>
                    <li>
                        <a href="/price_four">
                            <i class="bi bi-circle"></i><span>Прайс 4</span>
                        </a>
                    </li>
                    <li>
                        <a href="/contact_title">
                            <i class="bi bi-circle"></i><span>Название контактов</span>
                        </a>
                    </li>
                    <li>
                        <a href="/email">
                            <i class="bi bi-circle"></i><span>Почта</span>
                        </a>
                    </li>
                    <li>
                        <a href="/call">
                            <i class="bi bi-circle"></i><span>Связь с нами</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Карты</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin_card_app">
                            <i class="bi bi-circle"></i><span>Первый ряд</span>
                        </a>
                    </li>
                    <li>
                        <a href="/PortfolioCard">
                            <i class="bi bi-circle"></i><span>Второй ряд</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin_card_web">
                            <i class="bi bi-circle"></i><span>Третий ряд</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            <!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Команда Реклама</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin_team">
                            <i class="bi bi-circle"></i><span>Приветствие</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin_teamCard">
                            <i class="bi bi-circle"></i><span>Карта</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin_icon_link">
                            <i class="bi bi-circle"></i><span>Иконки</span>
                        </a>
                    </li>
                </ul>
            </li>

<<<<<<< HEAD
        
        </ul>

=======
>>>>>>> 090e94aa5500156266515a340e5f1d6d2b10c8ac
    </aside>
    <!-- End Sidebar-->

    @yield('admin_main')

   

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets_admin/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets_admin/vendor/chart.js/chart.min.js"></script>
    <script src="/assets_admin/vendor/echarts/echarts.min.js"></script>
    <script src="/assets_admin/vendor/quill/quill.min.js"></script>
    <script src="/assets_admin/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets_admin/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets_admin/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets_admin/js/main.js"></script>

</body>

</html>