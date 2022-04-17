<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game list') }}
        </h2>
    </x-slot>
    <p>
        @if (auth()->user()->isAdmin())
            <a href="{{route('gameform')}}">Create new game</a>
        @endif
    </p>
    <table class="border-collapse border border-slate-500">
        <thead>
            <tr>
                <th class="p-10 border border-slate-500">Title</th>
                <th class="p-10 border border-slate-500">System</th>
                <th class="p-10 border border-slate-500">Release year</th>
                <th class="p-10 border border-slate-500">Completed</th>
                <th class="p-10 border border-slate-500">Categories</th>
                <th class="p-10 border border-slate-500">Boxart</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $game)
            <tr>
                <td class="p-10 border border-slate-500">{{$game->title}}</td>
                <td class="p-10 border border-slate-500">{{$game->system->name}}</td>
                <td class="p-10 border border-slate-500">{{$game->release_year}}</td>
                <td class="p-10 border border-slate-500">{{$game->completed_yes_no}}</td>
                <td class="p-10 border border-slate-500">{{$game->categoryList()}}</td>
                <td class="p-10 border border-slate-500">
                    @if($game->boxart !== null)
                        <img class="lab4-boxart" src="{{$game->boxart_url}}" alt="{{$game->title}}">
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
