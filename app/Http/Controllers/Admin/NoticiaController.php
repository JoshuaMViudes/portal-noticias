<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    /**
     * Lista de noticia do banco
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('admin.noticias.index', [
            'noticias' => $noticias
        ]);
    }

    /**
     * Chamar a view do cadastrar noticia
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nome', 'ASC')->pluck('nome', 'id');
        return view("admin.noticias.cadastrar", [
            'categorias' => $categorias,
            'noticia' => new Noticia()
        ]);
    }

    /**
     * Armazenar dados.
     */
    public function store(Request $request)
    {
        dd($request);

        $request->validade([
            'categoria_id' => 'required',
            'titulo' => 'required|min:10|max:255',
            'resumo' => 'require',
            'conteudo' => 'required',
            'imagem' => 'required|image|mimes:jpge,jpg,png,webp|max:2048'
        ]);

        $noticia = new Noticia();

        $noticia->titulo = $request->titulo;
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->titulo;
        $noticia->categoria_id = $request->titulo;
        $noticia->ativo = $request->titulo;
        $noticia->usuario_id = Auth::user()->id;

        if ($request->hasFile('imagem')) {
            $noticia->imagem = $request->file('imagem')->store('noticias', 'public');
        }

        $noticia->save();

        return redirect()->route('admin.noticias.index');
    }

    /**
     * Visualizar uma noticia
     */

    /**
     * Chamar a view do editar noticias
     */
    public function edit(string $id)
    {
        $categorias = Categoria::orderBy('nome', 'ASC')->pluck('nome', 'id');

        $noticia = Noticia::findOrFail($id);

        return view("admin.noticias.editar", [
            'categorias' => $categorias,
            'noticia' => $noticia
        ]);
    }

    /**
     * Armazenar a atualizacao dos dados da noticia
     */
    public function update(Request $request, string $id)
    {
        $request->validade([
            'categoria_id' => 'required',
            'titulo' => 'required|min:10|max:255',
            'resumo' => 'require',
            'conteudo' => 'required',
            'imagem' => 'nullable|image|mimes:jpge,jpg,png,webp|max:2048'
        ]);

        $noticia = Noticia::findOrFall($id);

        $noticia->titulo = $request->titulo;
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->titulo;
        $noticia->categoria_id = $request->titulo;
        $noticia->ativo = $request->titulo;
        $noticia->usuario_id = Auth::user()->id;

        if ($request->hasFile('imagem')) {
            if ($noticia->imagem) {
                Storage::disk('public')->delete($noticia->imagem);
            }

            $noticia->imagem = $request->file('imagem')->store('noticias', 'public');
        }

        $noticia->save();

        return redirect()->route('admin.noticias.index');
    }

    /**
     * excluir uma noticia de banco de dados.
     */
    public function destroy(string $id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();
        return redirect()->route('admin.noticias.index');
    }
}
