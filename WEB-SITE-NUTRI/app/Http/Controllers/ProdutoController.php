<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto;

class ProdutoController extends Controller
{
/**
* lista todos os produtos
* contem uma tabela e nessa tabela irá listar todos os produtos que contém no banco de dados
*/
public function index()
{
$produtos = Produto::all();// essa variavel recebe todos os produtos cadastrado no banco de dados utilizando esse metodo all
return view('produtos.index',compact('produtos')); //esse compact prondutos, buscas todos os produtos do model pois o model esta ligado diretamente com o banco de dados
}
/**
 * abre o formulario de cadastro
 */
//quando chamamos a create ele vai exibir o formulario para preenchermos
public function create()
{
    return view('produtos.create');
}

/**
 * armazena/envia o formulario de cadastro
 */
//após o create ele vai validar as informações a partir do store, e em seguida enviar as informações para o banco de dados
public function store(Request $request)
{
    $request->validate([
        'nome'=> 'required|string|max:255',
        'descricao'=> 'required',
        'categoria'=> 'required',
        'quantidade'=> 'required|numeric',
        'preco'=> 'required|numeric',
    ]);

    Produto::create($request->all());

    return redirect()->route('produtos.index')->
    with('success','Produto criado com sucesso');
}



/**
 * vai abrir todas as informações do produto para que possamos efetuar a edição do mesmo
 */
public function edit(Produto $produto)
{
    return view('produtos.edit',compact('produto'));
}


public function update(Request $request, Produto $produto)
{
    $request->validate([
        'nome'=> 'required|string|max:255',
        'descricao'=> 'required',
        'categoria'=> 'required',
        'quantidade'=> 'required|numeric',
        'preco'=> 'required|numeric',
    ]);

    $produto->update($request->all()); //coletando o produto e efetuando um update/atualização das informações do produto

    return redirect()->route('produtos.index')->
    with('sucess','Produto atualizado com sucesso');
}


public function destroy(Produto $produto)
{
    $produto->delete();


    return redirect()->route('produtos.index')->
    with('sucess','Produto Deletado com Sucesso');
}

//mostra os Produtos
public function show(Produto $produto){}
}