@extends('layouts.app')

@section('seedbar')
<div class="container">
    <div class="row">
        <div class="col-md-3 sidebar-offcanvas" id="sidebar">
            <div class="mold_categorias">
                <p><i class="fa fa-list-ul" aria-hidden="true"></i> <strong>Categorias em destaque</strong></p>
                <div class="list-group">

                    <a href="" class="list-group-item"><i class="fa fa-caret-right" aria-hidden="true"></i> Titutl categoria</a>

                </div>
            </div>
            <div class="mold_banner">
                <img alt="" src="https://integrando.se/files/produtos/127/400/ofertas-antecipadas.jpg" class="img-responsive">
                <br>
                <img alt="" src="https://integrando.se/files/produtos/130/400/semana-do-consumidor.png" class="img-responsive">
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
