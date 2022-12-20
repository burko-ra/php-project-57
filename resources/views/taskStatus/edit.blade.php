@extends('layouts.main')

@section('title', 'Статусы задач')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">Изменение статуса</h1>
                <form method="POST" action="{{ route('task_statuses.update', $taskStatus) }}" accept-charset="UTF-8"
                    class="w-50">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col">
                        <div>
                            <label for="name">Имя</label>
                        </div>
                        <div class="mt-2">
                            <input class="rounded border-gray-300 w-1/3" name="name" type="text"
                                value="{{ $taskStatus->name }}" id="name">
                        </div>
                        @if ($errors->get('name'))
                            @foreach ($errors->get('name') as $error)
                                <div class="text-rose-600">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <div class="mt-2">
                            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit" value="Обновить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
