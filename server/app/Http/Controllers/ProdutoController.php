<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Requests\StoreprodutosRequest;
use App\Http\Requests\UpdateprodutosRequest;
use Illuminate\Http\Response;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna todo os models de Produto
        $produtos = Produto::all();
        return response()->json($produtos, Response::HTTP_OK);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */

    // POST
    public function store(StoreprodutosRequest $request)
    {
        // Valida antes de instanciar
        $data = $request->validated();
        // Instancia um novo produto com os dados passados
        $produto = Produto::create($data);
        // Post 
        $produto->save();
        return response()->json(['success' => true], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateprodutosRequest $request, int $id)
    {
        $produto = Produto::findOrFail($id);
        $data = $request->validated(); // Vai verificar e validar as regras feitas no request
        $produto->update($data);
        return response()->json(['success' => true], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // Busca o produto pelo ID
        $produto = Produto::findOrFail($id);
        // Deleta
        $produto->delete();
        return response()->json(['success' => true], Response::HTTP_OK);
    }
}
