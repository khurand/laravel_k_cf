@extends('layouts.app')

@section('content')
    <h1>Vos produits</h1>
    <hr>
    <a href="/products/create" class="btn btn-outline-success btn-sm" aria-pressed="true">Ajoutez un produit</a>
    @if(count($products) > 0)
        @foreach($products as $product)
            @if(Auth::user()->id == $product->user->id)
            <div class="border rounded box-shadow">
                <div class="my-3 p-3 bg-white">
                    <h3>
                        <a class="btn btn-primary" id="#collapse{{ $product->id}} "href="#collapse{{$product->id}}" data-toggle="collapse" aria-expanded="false" aria-controls="collapse{{ $product->id }}">{{$product->name}}</a>
                    </h3> 
                <small>Créé à: {{$product->created_at}} par <b>{{$product->user->name}}</b></small>
                </div>
                <div class="collapse" id="collapse{{$product->id}}">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <img style="width:100%;" src="/storage/cover_images/{{$product->cover_image}}" alt="" class="rounded">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <ul class="list-group-flush">
                                <li class="list-group-item list-group-item-action">Le prix TTC est de: <b>{{$product->price}} €</b></li>
                                <li class="list-group-item list-group-item-action">La catégorie: <b>{{$product->category}}</b></li>
                                <li class="list-group-item list-group-item-action">Taux de Tva: <b>{{$product->tva}}</b></li>
                                <li class="list-group-item list-group-item-action">Vendu par: <b>{{$product->unit}}</b></li>
                                <li class="list-group-item list-group-item-action">Le poids du produit: <b>{{$product->weight}}</b></li>
                                <li class="list-group-item list-group-item-action">Son prix converti, par gramme ou cl: <b>{{$product->convertedPrix}} €</b></li>
                                <li class="list-group-item list-group-item-action">Un ou plusieurs labels(s): <b>{{$product->labels}}</b></li>
                                <li class="list-group-item list-group-item-action">Les tag(s): <b>{{$product->tags}}</b></li>
                                <li class="list-group-item list-group-item-action">D'où vient-il ?: <b>{{$product->origin}}</b></li>
                                <li class="list-group-item list-group-item-action">La description: <b>{{$product->desc}}</b></li>
                            </ul>   
                            <div class="action">
                                <a href="/products/{{$product->id}}/edit" class="btn btn-outline-info btn-sm"  data-toggle="tooltip" title="Modifier ce produit" aria-pressed="true">Modifier</a>
                            
                                {!!Form::open(['action' => ['ProductsController@destroy',$product->id],'method'=>'POST','class'=>'float-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Supprimer',['class'=>'btn btn-outline-danger btn-sm','aria-pressed'=>'true', 'data-toggle'=>'tooltip', 'title'=>'Supprimer ce produit'])}}
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
            {{$products->links()}}
    @else 
        <p>Vous n'avez pas encore enregistré de produits </p>
    @endif

@endsection