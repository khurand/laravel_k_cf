<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use App\Label;
use App\Tag;
use App\Origin;
use App\Unit;
use App\User;

class ProductsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
    */

    // Constructor: a function that runs when a class is instantiated
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Une version plus courte pour récupérer les data de la db:
        // $products = Product::all();

        // On peut aussi récupérer ces données via une commande Mysql au lieu d'Eloquent, en utilisant la librairie "DB":
        //$products = DB::select('SELECT * FROM products');

        //On récupère les produits de la db (via Eloquent et le model Product) dans une variable et on les affiche par ordre "descending", qui signifie que l'élément qui a l'id le plus petit (donc créé en premier) se retrouve en bas de la liste. Les plus récents sortent en haut de la liste.
        //$products = Product::orderBy('id', 'desc')->get();

        //On peut choisir aussi de n'afficher que 10 produits par page, et dès le 11eme la pagination va s'activer 
        $products = Product::orderBy('id', 'desc')->paginate(10);
        
        $user_id = auth()->user()->id;
        $user = User::find($user_id);


        return view('products.index', compact('products', $user->products));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $labels = Label::all();
        $tags = Tag::all();
        $origins = Origin::all();
        $units = Unit::all();
        // dd($units);
        return view('products.create', compact('categories','labels','tags','origins','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation des champs du formulaire
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'category' => 'required|max:255',
            'tva' => 'required|max:255',
            'unit' => 'required|max:255',
            'weight' => 'required|numeric',
            'convertedPrix' => 'required_if:convertedPrix,numeric',
            'labels' => 'required|max:255',
            'tags' => 'required|max:255',
            'origin' => 'required|max:255',
            'desc' => 'required_if:desc,string|max:255',
            'prix_ht' => 'required|max:255',
            'cover_image' => 'image|nullable|max:1999'
        ]);
            // dd($request);

        //File Upload
        if($request->hasFile('cover_image')){
            //Get Filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //FileName to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //Créer un produit
        $product = new Product;
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->category = $request->get('category');
        $product->tva = $request->get('tva');
        $product->unit = $request->get('unit');
        $product->weight = $request->get('weight');
        $product->convertedPrix = $request->get('convertedPrix');

        //Implode (conversion en string) des valeurs des array labels et tags :
        $product->labels = $request->input('labelsInput');
        $labels_multi = implode(',', array ($product->labels));
        $product->tags = $request->input('tagsInput');
        $tags_multi = implode(',', array ($product->tags));

        $product->origin = $request->input('originInput');
        $product->desc = $request->get('desc');
        $product->prix_ht = $request->get('prix_ht');
        $product->user_id = auth()->user()->id;
        $product->cover_image = $fileNameToStore;


        // dd($product->tags);

        $product->save();
        
        return redirect('/products')->with('success', 'Le produit a bien été ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Cette variable permet de récupérer toutes les valeurs pour une clé donnée. Dans cet exemple ci-dessous, la methode pluck() permet de retrouver les éléments dans notre table ou db (en fonction de ce qui parametré dans le model) qui ont l'attribut 'name'. (Remplace le @foreach dans les formulaires créés avec Laravel-Collective)

        // $catName = Category::pluck('name');


        $product = Product::find($id);
        $category = $product->category;

        // str_word_count() permet de savoir combien d'éléments composent les strings labels et tags dans la db. La valeur du 2eme parametre (1) retourne un array avec chaque mots de la string 
        $labels = str_word_count($product->labels,1);
        $tags = str_word_count($product->tags,1);

        
        // explode (reconvertion en array) des tags/labels contenus dans la db :                    
        // $labels_e = explode(', ', $labels);
        // $tags_e = explode(', ', $tags);

        

        return view('products.edit', compact('product','category','tags_e','labels_e','tags','labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        //File Upload
        if($request->hasFile('cover_image')){
            //Get Filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //FileName to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }


        //modifier un produit
        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->tva = $request->input('tva');
        $product->unit = $request->input('unit');
        $product->weight = $request->input('weight');
        $product->convertedPrix = $request->input('convertedPrix');
        $product->tags = $request->input('tagsInput');
        $tags_multi = implode(',', array ($product->tags));
        $product->labels = $request->input('labelsInput');
        $labels_multi = implode(',', array ($product->labels));
        $product->origin = $request->input('origin');
        $product->desc = $request->input('desc');
        $product->prix_ht = $request->input('prix_ht');

        //Delete also the old image if the image was updated 
        if ($request->hasFile('cover_image')) {
            if ($product->cover_image != 'noimage.jpg') {
                Storage::delete('public/cover_images/'.$product->cover_image);
            }
            $product->cover_image = $fileNameToStore;
            
            //Delete the image when a post is edited
            if($request->input('old_image')!='noimage.jpg'){    
                Storage::delete('public/cover_images/'.$request->old_image);
            }
        }

        
        // $product->update($request->all());

        $product->save();

        return redirect('/products')->with('success', 'Le produit a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if($product->cover_image !== 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/'.$product->cover_image);
        }

        $product->delete();

        return redirect('/products')->with('success', 'Le produit a bien été supprimé !');
    }
}
