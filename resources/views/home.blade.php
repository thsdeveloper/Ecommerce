@extends('layouts.app')
<div class="container">
    <div class="mold-banner">
        @include('banners.home')
    </div>
</div>
@section('content')

    <div class="row">
        <div class="col-md-12">
            <p>
            <h3><i class="fa fa-flag" aria-hidden="true"></i> <strong>Lançamentos / Destaques</strong></h3></p>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $pro)
            <div class="col-md-4">
                <div class="box-product">
                    <div class="img-wrapper">
                        <a href="{{url('produto/'.$pro->slug)}}">
                            <img src="{{Voyager::image($pro->image)}}" alt="Categoria NetCriativa sem Imagem"
                                 class="img-responsive">
                        </a>
                    </div>
                    <h6><a href="#">{{$pro->name}}</a></h6>
                    <div class="mold_info_product">
                        <span class="labelcartao"><b>3x</b> no cartão de crédito</span>
                        <br>
                        <span class="labeltag"><b>5%</b> de desconto no boleto à vista</span>
                    </div>
                    <a href="{{url('produto/'.$pro->slug)}}" class="btn btn-primary center-block">Detalhes | preço</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
