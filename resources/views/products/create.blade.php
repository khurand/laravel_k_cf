@extends('layouts.app')

@section('content')
    <h1>Ajouter un produit</h1>
    <hr>
    <div class="section">
        {!! Form::open([
            'action' => 'ProductsController@store', 
            'method' => 'POST',
            'id'=>'form',
            'enctype' => 'multipart/form-data'
        ])!!} 
        <h5 class="heading">Nom, Prix & Catégorie</h5>
        <hr>
        <div class="row">
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                {{Form::label('name','Nom du produit:')}}
                {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Ex: Sauce tomate','required'])}}
            </div>
    
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                {{Form::label('price','Prix TTC:')}}
                {{Form::number('price','',['class' => 'form-control', 'step' => '0.1', 'placeholder' => 'Ex: 2,50€','required'])}}
            </div>
    
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                <label for="category">Catégorie:</label>
                <select name="category" id="category" class="form-control" aria-placeholder="Choisissez une catégorie..." required>
                    @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
                {{Form::text('categoryInput','',['class' => 'form-control categoryInput'])}}
            </div>
        </div>  
        
        <h5 class="heading">Tva, Unité, Poids & Prix converti</h5>
        <hr>
        <div class="row">
            <div class="form-group col-lg-3 col-md-3 col-xs-3">
                {{Form::label('tva','Taux de Tva:')}}
                {{Form::select('tva', [
                    '5.5' => '5,5%', 
                    '20' => '20%' 
                ], 
                    null, ['class' => 'form-control', 'placeholder' => 'Choisissez la tva...','required'])}}
            </div>
    
            <div class="form-group col-lg-3 col-md-3 col-xs-3">
                <label for="unit">Unité:</label>
                <select name="unit" id="unit" class="form-control" aria-placeholder="Choisissez une unité..." required>
                    @foreach($units as $unit)
                <option value="{{$unit->name}}">{{$unit->name}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group col-lg-3 col-md-3 col-xs-3">
                {{Form::label('weight','Poids (grammes ou cl):')}}
                {{Form::number('weight', '', ['class' => 'form-control', 'step' => '0.1', 'placeholder' => 'Ex: 200g ou 33cl','required'])}}
            </div>
    
            <div class="form-group col-lg-3 col-md-3 col-xs-3" id="converted">
                {{Form::label('convertedPrix','Prix converti du produit:')}}
                {{Form::number('convertedPrix', '', ['class' => 'form-control','readonly'])}}
            </div>
        </div>

        <h5 class="heading">labels, Tags & Origine</h5>
        <hr>
        <div class="row">
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                {{Form::label('labels','label(s):')}}
                {{Form::select ('labels[]', 
                $labels->pluck('name'),
                null, 
                ['multiple', 'class' => 'form-control','id'=>'labels'])}}
                {{Form::text('labelsInput','',['class' => 'form-control labelsInput','readonly'])}}
            </div>
    
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
                {{Form::label('tags','Tag(s):')}}
                {{Form::select ('tags[]',
                $tags->pluck('name'), 
                null, 
                ['multiple', 'class' => 'form-control','id'=>'tags'])}}
                {{Form::text('tagsInput','',['class' => 'form-control tagsInput','readonly'])}}
            </div>
    {{--  --}}
            <div class="form-group col-lg-4 col-md-4 col-xs-4">
            {{-- <label for="origin">Origine:</label>
                <select name="origin" id="origin" class="form-control" aria-placeholder="Choisissez une origine..." required>
                    @foreach($origins as $origin)
                        <option value="{{$origin->name}}">{{$origin->name}}</option>
                    @endforeach
                </select> --}}
                {{Form::label('origin','Origine:')}}
                {{Form::select (
                    'origin',$origins->pluck('name'), 
                    null, 
                    ['class' => 'form-control', 
                    'placeholder' => 'Choisissez une origine...',
                    'required'
                ])}}
                {{Form::text('originInput','',['class' => 'form-control originInput'])}}
            </div>
        </div>

        <h5 class="heading">Description</h5>
        <hr>
            <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-xs-12" id="description">
                    {{Form::textarea('desc', '', ['class' => 'form-control desc','placeholder' => 'Une petite description du produit, si vous le souhaitez...','rows'=>'4'])}}
                </div>
            </div>

            <div class="row">
                <div class="form-group" id="prix_ht">
                    <label for="prix_ht">prix ht</label>
                    <input type="text" name="prix_ht">
                </div>
            </div>

    
                  
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>
            {{Form::submit('Ajouter',Array ('class' => 'btn btn-primary','id'=>'ajout'))}}
        {!! Form::close() !!}
    </div>

@endsection