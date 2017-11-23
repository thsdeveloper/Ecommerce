@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>
            <h3><i class="fa fa-flag" aria-hidden="true"></i> <strong>Produtos relacionados</strong></h3></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @forelse ($produtos as $produto)
                <div class="col-md-4">
                    <div class="box-product">
                        <div class="img-wrapper">
                            <a href="{{url('produto/'.$produto->slug)}}">

                                <img src="{{Voyager::image($produto->image)}}" alt="Categoria NetCriativa sem Imagem"
                                     class="img-responsive">

                            </a>
                            <div class="tags tags-left">
                                <span class="label-tags"><span
                                            class="label label-success arrowed-right">Frete Grátis - {{$produto->code}}</span></span>
                            </div>
                        </div>
                        <h6><a href="#">{{$produto->name}}</a></h6>
                        <div class="mold_info_product">
                            <span class="labelcartao"><b>3x</b> no cartão de crédito</span>
                            <br>
                            <span class="labeltag"><b>5%</b> de desconto no boleto à vista</span>
                        </div>
                        <br>
                        <a href="#" class="btn btn-primary center-block">Detalhes | preço</a>
                    </div>
                </div>
            @empty
                <div class="caixa-destaque">
                    <h1>Não existem produtos nessa categoria</h1>
                    <p>
                        Você está tentando acessar uma categoria, mas não existem produtos adicionados nela.
                    </p>
                    <a href="{{url('/')}}" class="btn btn-primary">Ir às compras</a>
                </div>
            @endforelse
        </div>
    </div>
@endsection
