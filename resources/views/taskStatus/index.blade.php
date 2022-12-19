@extends('layouts.main')

@section('title', 'Статусы задач')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            @include('flash::message')
            <div class="grid col-span-full">
                <x-page-title>
                    {{ __('Статусы') }}
                </x-page-title>

                <x-responsive-link :href="route('task_statuses.create')">
                    {{ __('Создать статус') }}
                </x-responsive-link>

                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Дата создания</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskStatuses as $taskStatus)
                            <tr class="border-b border-dashed text-left">
                                <td>{{ $taskStatus->id }}</td>
                                <td>{{ $taskStatus->name }}</td>
                                <td>{{ Carbon\Carbon::create($taskStatus->created_at)->format('d.m.Y') }}</td>
                                <td>
                                    <a data-confirm="Вы уверены?" data-method="delete"
                                        class="text-red-600 hover:text-red-900"
                                        href="{{ route('task_statuses.destroy', $taskStatus) }}"
                                        rel="nofollow">
                                        Удалить </a>
                                    <a class="text-blue-600 hover:text-blue-900"
                                        href="{{ route('task_statuses.edit', $taskStatus) }}">
                                        Изменить </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
@endsection
