@extends('layouts.app')

@section('content')
@yield('script')
    <h1>Modifier un produit</h1>
    <hr>
    <div class="section">
        {!! Form::open([
            'action' => [
                'ProductsController@update',
                $product->id
            ], 
            'method' => 'POST',
            'id'=>'form',
            'enctype' =>'multipart/form-data'
        ])!!}
        <h5 class="heading">Nom, Prix & Catégorie</h5>
        <hr>
        <div class="row">
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                {{Form::label('name','Nom du produit:')}}
                {{Form::text('name',
                    $product->name, 
                    ['class' => 'form-control', 'placeholder' => 'Ex: Sauce tomate','required'])}}
            </div>
    
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                {{Form::label('price','Prix TTC:')}}
                {{Form::number('price',
                    $product->price,
                    ['class' => 'form-control', 'step' => '0.1', 'placeholder' => 'Ex: 2,50€','required'])}}
            </div>
    
            <div class="form-group col-lg-4 col-md-4 col-xs-4">

                {{Form::label('category','categorie:')}}
                {{Form::select ('category',[
                    'Viande'=>'Viande',
                    'Légumes'=>'Légumes',
                    'Fruits'=>'Fruits',
                    'Epices'=>'Epices',
                    'Produits Régionaux'=>'Produits Régionaux',
                    'Produits Laitiers'=>'Produits Laitiers',
                    'Fromages'=>'Fromages',
                    'Boissons'=>'Boissons'
                    ],
                    $product->category, 
                    ['class' => 'form-control','required','id'=>'category'])}}

            </div>
        </div>  
        
        <h5 class="heading">Tva, Unité, Poids & Prix converti</h5>
        <hr>
        <div class="row">
            <div class="form-group col-lg-3 col-md-3 col-xs-3">
                {{Form::label('tva','Taux de Tva:')}}

                {{-- tableau associatif --}}
                {{Form::select('tva', [
                    '5.5' => '5,5%', 
                    '20' => '20%' 
                ], 
                $product->tva, ['class' => 'form-control', 'placeholder' => 'Choisissez la tva...','required'])}}
            </div>
    
            <div class="form-group col-lg-3 col-md-3 col-xs-3">
                    {{Form::label('unit','Unité:')}}
                    {{Form::select ('unit',[
                        'Kg'=>'Kg',
                        'Bouteille'=>'Bouteille',
                        'Sachet'=>'Sachet',
                        'Pot'=>'Pot',
                        'Panier'=>'Panier',
                        'Lot'=>'Lot',
                        'Piece'=>'Piece',
                        'Autre'=>'Autre'
                        ],
                        $product->unit, 
                        ['class' => 'form-control','required'])}}

            </div>
    
            <div class="form-group col-lg-3 col-md-3 col-xs-3">
                {{Form::label('weight','Poids (grammes ou cl):')}}
                {{Form::number('weight', $product->weight, ['class' => 'form-control', 'step' => '0.1', 'placeholder' => 'Ex: 200g ou 33cl','required'])}}
            </div>
    
            <div class="form-group col-lg-3 col-md-3 col-xs-3" id="converted">
                {{Form::label('convertedPrix','Prix converti du produit:')}}
                {{Form::number('convertedPrix', $product->convertedPrix, ['class' => 'form-control','readonly'])}}
            </div>
        </div>

        <h5 class="heading">Labels, Tags & Origine</h5>
        <hr>
        <div class="row">
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                {{Form::label('labels','labels(s):')}}
                {{Form::select ('labels[]', [
                    'Aucun'=>'Aucun',
                    'Bio'=>'Bio',
                    'AOP'=>'AOP',
                    'AOC'=>'AOC',
                    'IGP'=>'IGP',
                    'STG'=>'STG',
                    'Produits Certifiés'=>'Produits Certifiés',
                    'Fair-Trade'=>'Fair-Trade',
                    'Autre'=>'Autre',
                    'AB'=>'AB'
                ], 
                $labels, 
                ['multiple', 'class' => 'form-control','required','id'=>"labels"])}}
                {{Form::text('labelsInput',$product->labels,['class' => 'form-control labelsInput','readonly'])}}
            </div>
    
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                {{Form::label('tags','Tag(s):')}}
                {{Form::select ('tags[]', [
                    'Aucun'=>'Aucun',
                    'Bio'=>'Bio',
                    'Hallal'=>'Hallal',
                    'Raclette'=>'Raclette',
                    'Apero'=>'Apero',
                    'Paniers'=>'Paniers',
                    'Brunch'=>'Brunch',
                    'Sans Gluten'=>'Sans Gluten'
                ], 
                $tags, 
                ['multiple', 'class' => 'form-control','required','id'=>'tags'])}}
                {{Form::text('tagsInput',$product->tags,['class' => 'form-control tagsInput','readonly'])}}

                {{-- <label for="tags">Tags:</label>
                <select name="tags[]" id="tags" class="form-control" aria-placeholder="Choisissez un ou plusieurs tags..." required value="{{$product->tags}}" multiple="">
                    @foreach($tags as $tag)
                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control tagsInput" name="tagsInput" value="{{$product->tags}}" readonly> --}}
            </div>
    
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
            {{-- <label for="origin">Origine:</label>
                <select name="origin" id="origin" class="form-control" aria-placeholder="Choisissez une origine..." required value="{{$product->origin}}">
                    @foreach($origins as $origin)
                        <option value="{{$origin->name}}">{{$origin->name}}</option>
                    @endforeach
                </select> --}}
                {{Form::label('origin','Origine:')}}
                {{Form::select ('origin',[
                    'Angleterre'=>'Angleterre',
                    'Ariège'=>'Ariège',
                    'Auvergne'=>'Auvergne',
                    'Aveyron'=>'Aveyron',
                    'Berry'=>'Berry',
                    'Bourgogne'=>'Bourgogne',
                    'Bretagne'=>'Bretagne',
                    'Centre'=>'Centre',
                    'Corse'=>'Corse',
                    'Deux-Sèvres'=>'Deux-Sèvres',
                    'Ecosse'=>'Ecosse',
                    'Est-Central'=>'Est-Central',
                    'Franche-Comté'=>'Franche-Comté',
                    'Grèce'=>'Grèce',
                    'Hollande'=>'Hollande',
                    'Inconnue'=>'Inconnue',
                    'Ile-de-France'=>'Ile-de-France',
                    'Ile de Ré'=>'Ile de Ré',
                    'Rhône-Alpes'=>'Rhône-Alpes',
                    'Val-de-Loire'=>'Val-de-Loire'
                ],
                $product->origin, 
                ['class' => 'form-control', 'placeholder' => 'Choisissez une origine...','required'])}}
            </div>
        </div>

        <h5 class="heading">Description</h5>
        <hr>
            <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-xs-12" id="description">
                    {{Form::textarea('desc', $product->desc, ['class' => 'form-control desc','placeholder' => 'Une petite description du produit, si vous le souhaitez...','rows'=>'4'])}}
                </div>
            </div>

            <div class="row">
                <div class="form-group" id="prix_ht">
                    <label for="prix_ht">prix ht</label>
                <input type="text" name="prix_ht" value="{{$product->prix_ht}}">
                </div>
            </div>
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::hidden('old_image',$product->cover_image)}}
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Modifier',['class' => 'btn btn-primary','id'=>'modif'])}}
        {!! Form::close() !!}
    </div>

@endsection