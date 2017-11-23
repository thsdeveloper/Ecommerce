<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{setting('site.title')}} - {{setting('site.description')}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">

    <!-- import CSS Element -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div id="app">
    <div class="header-menu">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="mold_menu_top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mold_info_redes_sociais">
                                <i class="fa fa-phone-square" aria-hidden="true"></i> Telefone: {{setting('site.telefone_celular')}} | <i class="fa fa-envelope" aria-hidden="true"></i> Email: {{setting('site.site_email_contato')}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mold_info_menu_top">
                                @auth
                                {{ menu('menu_top')}}
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mold_header_1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="{{url('/')}}">
                                    <img src="{{url('storage/'.setting('site.logo'))}}" alt="{{setting('site.title')}}"
                                         width="100%" title="{{setting('site.title')}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mold_pesquisa_login">
                                <div class="login">
                                    <div class="wrapper">
                                        @guest
                                        <a href="{{url('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                            Entre</a>
                                        &nbsp;<span class="color">ou</span>&nbsp;
                                        <a id="topbar-signup-link" class="wm-topbar-sign-up" href="{{url('register')}}">Cadastre-se</a>
                                        @else<p>Seja bem-vindo: {{ Auth::user()->name }}</p>@endguest
                                    </div>
                                </div>

                                <div class="pesquisa">
                                    <div class="form-group">
                                        <input type="text" name="txt_busca" value=""
                                               class="form-control input_style_busca"
                                               placeholder="Olá o que você procura?">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <details-cart></details-cart>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-secundario">
                <div class="container">
                    <div class="mold_secundario">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown categorias">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-haspopup="true" aria-expanded="false">Todas as categorias <span
                                                        class="caret"></span></a>
                                            <ul class="dropdown-menu categorias-ul">
                                                @foreach ($categories as $cat)
                                                    <li><a href="{{url('categoria/'.$cat->slug)}}">{{$cat->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="menu-principal">
                                        {{menu('menu_principal')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="pos-f-t" id="nav-scrool" style="display: none;">
        <div class="collapse" id="navbar-header" aria-expanded="false">
            <div class="container-fluid bg-inverse p-1">
                <h3>Collapsed content</h3>
                <p>Toggleable via the navbar brand.</p>
            </div>
        </div>
        <div class="navbar navbar-light bg-faded navbar-static-top">
            <div class="container">
                <button class="navbar-toggler collapsed btn btn-primary" type="button" data-toggle="collapse"
                        data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false"
                        aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="mold-loja">
            <div class="row">
                <div class="col-md-3" id="sidebar_left">
                    <div class="mold_categorias">
                        <p><i class="fa fa-list-ul" aria-hidden="true"></i> <strong>Placas|Sinalização</strong></p>
                        <div class="list-group">
                            @foreach ($categories as $cat)
                                <a href="{{url('categoria/'.$cat->slug)}}" class="list-group-item "><i class="fa fa-caret-right"
                                                                                     aria-hidden="true"></i> {{$cat->name}}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-md-6">
                    @yield('content')
                </div>
                <div class="col-md-2" id="sidebar_rigth">
                    <div class="mold_banner">
                        <img alt="" src="https://integrando.se/files/produtos/127/400/ofertas-antecipadas.jpg"
                             class="img-responsive">
                        <br>
                        <img alt="" src="https://integrando.se/files/produtos/130/400/semana-do-consumidor.png"
                             class="img-responsive">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->


    <!-- Inicio do Rodape do E-commerce -->
    <footer>
        <a href="#" class="back-to-top" style="display: none;">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </a>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="menu_institucional">
                                <h4><i class="fa fa-building" aria-hidden="true"></i> Institucional/Dúvidas</h4>
                                {{menu('rodape')}}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="box_televendas">
                                <h4 class="tit_rodape heading-footer"><i class="fa fa-phone-square"
                                                                         aria-hidden="true"></i> Televendas</h4>
                                <h6 class="tit_sec_rodape">{{setting('site.telefone_celular')}}</h6>
                                <p>Horários:</p>
                                <p>Sábado 8h00 as 18h00.<br>
                                    Exceto feriados</p>
                                <br>
                                <h4 class="tit_rodape heading-footer"><i class="fa fa-question-circle"
                                                                         aria-hidden="true"></i> Atendimento</h4>
                                <h6 class="tit_sec_rodape">{{setting('site.site_email_contato')}}</h6>
                                <p>Tire dúvidas sobre produtos e serviços em nosso canal de atendimento.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h4><i class="fa fa-map-marker" aria-hidden="true"></i> Localização</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7677.949192281973!2d-47.954676732808146!3d-15.805293476035692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935a305ac757e44b%3A0x3ce036ed8e779158!2sBSB+M%C3%ADdia+e+Comunica%C3%A7%C3%A3o+Visual+Eireli+EPP!5e0!3m2!1spt-BR!2sbr!4v1507354448005" width="390" height="220" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <div class="icones-redes-sociais">
                                <ul class="nav nav-pills">
                                    <li role="presentation" class=""><a href="#"><i
                                                    class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                                    </li>
                                    <li role="presentation" class=""><a href="#"><i class="fa fa-whatsapp fa-2x"
                                                                                    aria-hidden="true"></i></a></li>
                                    <li role="presentation" class=""><a href="#"><i class="fa fa-instagram fa-2x"
                                                                                    aria-hidden="true"></i></a></li>
                                    <li role="presentation" class=""><a href="#"><i class="fa fa-youtube-play fa-2x"
                                                                                    aria-hidden="true"></i></a></li>
                                    <li role="presentation" class=""><a href="#"><i class="fa fa-twitter-square fa-2x"
                                                                                    aria-hidden="true"></i></a></li>
                                    <li role="presentation" class=""><a href="#"><i class="fa fa-facebook-square fa-2x"
                                                                                    aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <h4><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Formas de pagamento</h4>
                            <img src="http://191.252.1.241/arquivos_loja/41424/Fotos/pi_156440.jpg" width="280px">
                        </div>
                        <div class="col-lg-8">
                            <h4><i class="fa fa-shield" aria-hidden="true"></i> Certificados e Segurança</h4>
                            <img src="http://www.bsbplacas.com.br/assets/themes/loja_frontend/images/certificados-e-segurtanca.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mold-footer-bootom">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <p class="texto-rodape">Copyright ® - Todos os direitos reservados.<br>
                            Preços e condições de pagamento válidos exclusivamente para compras efetuadas no site, não
                            valendo necessariamente para a rede de lojas físicas.<br>
                            As imagens dos produtos são meramente ilustrativas. Todos os preços e condições comerciais
                            estão sujeitos a alteração sem prévio aviso.</p>
                    </div>
                    <div class="col-md-3">
                        <a href="https://www.facebook.com/internetcriativa" target="_blank">
                            <img src="{{Voyager::image(setting('site.logo'))}}" class="pull-right logo-netcriativa"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>

<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>

</body>
</html>
