<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/landing_page.css') }}">
    {{-- <script src="https://kit.fontawesome.com/c7865ea265.js" crossorigin="anonymous"></script> --}}
</head>

<body>
    <nav class="navbar navbar-light bg-white justify-content-between">
        <div class="container">
            <a class="navbar-brand"><img src="{{ asset('image/amoeba_logo.png') }}" /></a>
            <form class="form-inline" action="{{ route('login') }}" method="GET">
                {{-- <a class="navbar-home-menu mr-sm-4" href="#">Home</a> --}}
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Login</button>
            </form>
        </div>
    </nav>

    <div class="jumbotron main-page mb-sm-0">
        <div class="row">
            <div class="col-md-6" style="margin: auto">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title pb-sm-2">Boost Your CX <br>
                            & Combat Churn
                        </h1>
                        <h6 class="card-text">iCare</h6>
                        <p class="card-text pb-sm-2">adalah sebuah dashboard monitoring yang bertujuan untuk memprediksi
                            indikasi pelanggan dengan treatment sesuai dengan Masa Length of Stay dan Parameter Churn.
                        </p>
                        <a href="#" class="btn btn-secondary">Explore More <span class="pl-sm-2"><i
                                    class="fa fa-arrow-circle-right nav-icon"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 banner-main-page bg-image">
                <img src="{{ asset('image/banner_picture.png') }}" />
            </div>
        </div>
    </div>

    <div class="jumbotron second-page mb-md-0">
        <div class="row">
            <div class="col-md-3 col-sm-6" style="margin: auto">
                <div class="card mt-sm-4">
                    <div class="card-body">
                        <img class="card-img-top pb-sm-4" src="{{ asset('image/alert_view.png') }}"
                            style="width: 100%;" />
                        <a href="#">Main Feature</a>
                        <h3 class="card-title pb-sm-2">Alert View</h3>
                        <h6 class="card-text">Brief Description :</h6>
                        <p class="card-text pb-sm-2">Alert untuk mengetahui pelanggan yang berpotensi churn berdasarkan
                            beberapa symptoms.Alert untuk mengetahui pelanggan yang berpotensi churn berdasarkan
                            beberapa
                            symptoms.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-secondary bottom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6" style="margin: auto">
                <div class="card mt-sm-4">
                    <div class="card-body">
                        <img class="card-img-top pb-sm-4" src="{{ asset('image/alert_update.png') }}"
                            style="width: 100%;" />
                        <a href="#">Main Feature</a>
                        <h3 class="card-title pb-sm-2">Alert Update</h3>
                        <h6 class="card-text">Brief Description :</h6>
                        <p class="card-text pb-sm-2">Menu untuk pembaruan alert pelanggan yang terkena symptomp churn.
                        </p>

                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-secondary bottom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6" style="margin: auto">
                <div class="card mt-sm-4">

                    <div class="card-body">
                        <img class="card-img-top pb-sm-4" src="{{ asset('image/quality_of_sales.png') }}"
                            style="width: 100%;" />
                        <a href="#" class="align-baseline">Main Feature</a>
                        <h3 class="card-title pb-sm-2">Quality Of Sales</h3>
                        <h6 class="card-text">Brief Description :</h6>
                        <p class="card-text pb-sm-2">Menampilkan cohort quality of sales (QoS) berdasarkan length of
                            stay
                            (LoS) pelanggan.</p>

                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-secondary bottom">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6" style="margin: auto">
                <!-- <div class="card" style="margin: auto; vertical-align:middle;"> -->
                <!-- <div class="card-body"> -->
                <h2 class="card-title pb-sm-2">What's Inside ?</h2>

                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>

    <footer class="bg-light text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="card-body">
                        <img src="{{ asset('image/footer-logo-image.png') }}" />

                        <p>
                            Customer Care Telkom Regional 2 <br>
                            The Telkom Hub, Jl. Gatot Subroto No.Kav. 52, RW.1, <br>Kuningan Bar., Kec. Mampang Prpt.,
                            Kota
                            Jakarta <br>Selatan, Daerah Khusus Ibukota Jakara
                        </p>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-0" style="margin: auto;">
                    <div class="card-body">
                        <img src="{{ asset('image/footer-indihome-logo.png') }}" />
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-0" style="margin: auto;text-align: right;">

                    <div class="card-body">
                        <h6 class="text-uppercase">Supported by</h6>
                        <img src="{{ asset('image/footer-amouba-logo.png') }}" />
                    </div>



                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 bg-light">
            © Copyright 2021 | Powered by Telkom Indonesia
        </div>
        <!-- Copyright -->
    </footer>
</body>

</html>
