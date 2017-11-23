@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="mold_produto_container">
      <div class="col-md-12">
        <div class="row">

          <div class="col-md-12">
            <div class="titulo">
              <h1>{{$product->name}}</h1>
            </div>
            <div class="codigo-produto">

              <span class="cor-secundaria" itemprop="brand" itemscope="itemscope"
              itemtype="http://schema.org/Brand">
              <b>Marca: </b>
              <a href="{{url('marca/'.$product->brand->slug)}}"
                itemprop="url">{{$product->brand->name}}</a>
              </span>
              <span>
                <b>Categoria: </b>
                <a href="{{url('marca/'.$product->category->slug)}}"
                  itemprop="url">{{$product->category->name}}</a>
                </span>
                <span class="pull-right">Código: {{$product->code}}</span>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="img-produto">
                    <a href="{{Voyager::image($product->image)}}" data-lightbox="image-1"
                      data-title="{{$product->name}}">
                      <img src="{{Voyager::image($product->image)}}" alt="" class="img-responsive">
                    </a>
                  </div>
                </div>
                @if ($product->price_request == 1)
                  <div class="col-md-8">
                    <div class="alert alert-info" role="alert"> <strong>Indisponível para compra!</strong> Entre em contato com o nosso atendimento para adquirir o produto escolhido. </div>
                  </div>
                @elseif ($product->price_request == 0)
                  <div class="col-md-4">
                    <div class="preco-produto destaque-avista com-promocao">
                      <div itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">
                        <s class="preco-venda">
                          {{sprintf('R$ %s', number_format($product->sale_price, 2))}}
                        </s>
                        <strong class="preco-promocional cor-principal">
                          {{sprintf('R$ %s', number_format($product->promotional_price, 2))}}
                        </strong>
                      </div>
                      <!--googleoff: all-->
                      <div>
                      </div>
                      <!--googleon: all-->
                      <span class="desconto-a-vista" itemprop="offers" itemscope="itemscope"
                      itemtype="http://schema.org/Offer">
                      ou <strong class="cor-principal  preco-boleto"> R${{$product->sale_price}}</strong>
                      via Boleto Bancário
                    </span>
                  </div>
                </div>
                <div class="col-md-4">
                  <button-purchase :product="{{$product}}"></button-purchase>
                  <span class="disponibilidade-produto">
                    Estoque:
                    <b class="">
                      Disponível
                    </b>
                  </span>
                </div>
              </div>
            @else
              Nenhuma das opções
            @endif

          </div>
          @if ($product->price_request == 1)
            <div class="row">
              <div class="col-md-12">
                <div class="mold-form-contato-product">
                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email de contato</label>
                      <input type="email" class="form-control" placeholder="Seu e-mail de contato">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Telefone</label>
                      <input type="text" class="form-control" placeholder="Digite um telefone">
                    </div>
                    <div class="form-group">
                      <label>Escreva uma mensagem para o nosso atendimento</label>
                      <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar contato</button>
                  </form>
                </div>
              </div>
            </div>
          @elseif ($product->price_request == 0)
            <div class="row">
              <div class="col-md-12">
                <h3>Especificacoes Técnicas</h3>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Preço</th>
                      <th>Descrição</th>
                      <th>Tamanho</th>
                      <th>Alterar</th>
                    </tr>
                  </thead>
                  <tbody>

                    @forelse ($specification as $s)
                      <tr>
                        <th scope="row">{{$s->price}}</th>
                        <td>{{$s->name}}</td>
                        <td>{{$s->dimension}}</td>
                        <td><a type="button" href="" class="btn btn-primary btn-xs center-block">Escolher</a>
                        </td>
                      </tr>
                    @empty
                      <p>Sem especificações cadastrada!</p>
                    @endforelse


                  </tbody>
                </table>
              </div>
            </div>
          @else
            Nenhuma das opções
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs ul-produtos" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                data-toggle="tab" aria-expanded="true">Especificações
                Técnicas:</a></li>
                <li role="presentation" class=""><a href="#forma-pagamento"
                  aria-controls="forma-pagamento" role="tab"
                  data-toggle="tab" aria-expanded="false">Formas de
                  Pagamento:</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">
                    <p>{{$product->description}}</p>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="forma-pagamento">
                    <div class="mold-form-pagamento">
                      <div class="panel-group" id="accordion" role="tablist"
                      aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                            href="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            Boleto Bancário
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                      aria-labelledby="headingOne">
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-2">
                            <img style="-webkit-user-select: none"
                            src="https://www.asaas.com/blog/wp-content/uploads/2015/08/banner_boleto2.jpg"
                            class="img-responsive">
                          </div>
                          <div class="col-md-10">
                            Com o boleto bancário da <b>BSB Placas</b> você tem
                            total facilidade no processo de compra em nosso site.
                            Realize o pagamento com até <b>12% de desconto</b> em
                            todo site.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse"
                        data-parent="#accordion" href="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        Cartão de Crédito
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                  aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <img src="https://cdn.awsli.com.br/production/static/img/formas-de-pagamento/pagarme-cards.png?v=ec88fd0"
                    alt="Pagar.me">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="form-group">
      <input type="hidden" name="id" value="0001">
      <input type="hidden" name="url"
      value="http://www.bsbplacas.com.br/produto/30/placa-braile-corrim">
      <input type="hidden" name="foto"
      value="http://www.bsbplacas.com.br/assets/themes/loja_backend/images/categoria-sem-imagem.gif">
      <input type="hidden" name="nome" value="Placa braile corrimão">
      <input type="hidden" name="altura" value="100">
      <input type="hidden" name="largura" value="100">
      <input type="hidden" name="comprimento" value="100">
      <input type="hidden" name="peso" value="100">
      <input type="hidden" name="preco" value="850">
      <input type="hidden" name="quantidade" value="1">
    </div>

  </div>
</div>
</div>
</div>
</div>
@endsection
