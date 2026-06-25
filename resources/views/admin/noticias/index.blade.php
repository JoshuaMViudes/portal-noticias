<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Noticias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">
                    <h1 class="text-[18px]">Lista de Noticias</h1>
                    <a href="{{ route('admin.noticias.cadastrar') }}" class="bg-slate-950 text-white px-4 py-2 rounded ">+
                        Adicionar Noticia.</a>
                </div>

                <div class="p-6 overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITULO</th>
                                <th class="hidden sm:table-cell">RESUMO</th>
                                <th class="hidden sm:table-cell"> CATEGORIA</th>
                                <th>PUBLICAÇÃO</th>
                                <th class="text-center">AÇÃO</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($noticias as $n)
                                <tr>
                                    <td>{{ $n->id }}</td>
                                    <td>{{ $n->titulo }}</td>
                                    <td class="hidden sm:table-cell">{{ $n->resumo }}</td>
                                    <td class="hidden sm:table-cell">{{ $n->categoria }}</td>
                                    <td>
                                        {{ $n->created_at->format('d/m/Y H:i') }}
                                        <br>0
                                        {{ $n->created_at->diffForHumans() }}

                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn-editar">Editar</a>
                                        <a href="#" class="btn-excluir">Excluir</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-slate-400" colspan="6">
                                        <p>Nenhuma notícia cadastrada</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center p-6 pt-0">
                    //paginação
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
