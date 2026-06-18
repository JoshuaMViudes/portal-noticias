<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Listar as Notícias de um banco.
     */
    public function index()
    {
        return view("admin.noticias.index");
    }

    /**
     * Chamar o view do cadasrtar notícias.
     */
    public function create()
    {
        //
    }

    /**
     * Armazenar os Dados da Notícia, enviado pelo formulário.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Chamar o view do editor de notícias.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Armazenar a atualização dos dados da notícia.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Excluir uma notícia do banco de dados.
     */
    public function destroy(string $id)
    {
        //
    }
}
