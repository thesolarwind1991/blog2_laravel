@extends('layout.site', ['title' => 'Личный кабинет'])

@section('content')
    <h1>Личный кабинет</h1>

    <p>Добрый день, {{ auth()->user()->name }}!</p>
    <p>Это личный кабинет пользователя сайта.</p>

    @perm('create-post')
        <a href="{{ route('user.post.create') }}" class="btn btn-success">
            Новая публикация
        </a>
    @endperm
    <a href="{{ route('user.post.index') }}" class="btn btn-primary">
        Ваши публикации
    </a>
    <a href="{{ route('user.comment.index') }}" class="btn btn-primary">
        Ваши комментарии
    </a>

    @if ($admin)
        <p>Вы являетесь админом, войдите в админку</p>
        <a href="{{ route('admin.index') }}">Админка</a>
    @else
        <p>Вы не являетесь админом</p>
    @endif


@endsection
