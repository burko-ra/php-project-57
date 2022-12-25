@extends('layouts.main')

@section('title', 'Задачи')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            @include('flash::message')
            <div class="grid col-span-full">
                <x-page-title>
                    {{ __('layout.task_index_header') }}
                </x-page-title>

                <div class="w-full flex items-center">
                    <div>
                        <form method="GET" action="https://php-task-manager-ru.hexlet.app/tasks" accept-charset="UTF-8"
                            class="">
                            <div class="flex">
                                <div>
                                    <select class="rounded border-gray-300" name="filter[status_id]">
                                        <option selected="selected" value="">Статус</option>

                                        <option value="1">новая</option>
                                        <option value="2">завершена</option>
                                        <option value="3">выполняется</option>
                                        <option value="4">в архиве</option>
                                    </select>
                                </div>
                                <div>
                                    <select class="ml-2 rounded border-gray-300" name="filter[created_by_id]">
                                        <option selected="selected" value="">Автор</option>
                                        <option value="1">Денисов Адам Иванович</option>
                                        <option value="2">Виноградоваа Валерия Дмитриевна</option>
                                        <option value="3">Лариса Львовна Елисееваа</option>
                                        <option value="4">Веселова Изольда Андреевна</option>
                                        <option value="5">Кондратьев Аркадий Фёдорович</option>
                                        <option value="6">Бобров Владимир Евгеньевич</option>
                                        <option value="7">Владимирова Гавриил Евгеньевич</option>
                                        <option value="8">Любовь Андреевна Кудрявцеваа</option>
                                        <option value="9">Дроздоваа Люся Борисовна</option>
                                        <option value="10">Варвара Алексеевна Кошелева</option>
                                        <option value="11">Ева Сергеевна Ореховаа</option>
                                        <option value="12">Мартынова Добрыня Андреевич</option>
                                        <option value="13">Корнилова Юлия Дмитриевна</option>
                                        <option value="14">София Александровна Мухина</option>
                                        <option value="15">Гришинаа Олеся Ивановна</option>
                                        <option value="16">test</option>
                                    </select>
                                </div>
                                <div>
                                    <select class="ml-2 rounded border-gray-300" name="filter[assigned_to_id]">
                                        <option selected="selected" value="">Исполнитель</option>
                                        <option value="1">Денисов Адам Иванович</option>
                                        <option value="2">Виноградоваа Валерия Дмитриевна</option>
                                        <option value="3">Лариса Львовна Елисееваа</option>
                                        <option value="4">Веселова Изольда Андреевна</option>
                                        <option value="5">Кондратьев Аркадий Фёдорович</option>
                                        <option value="6">Бобров Владимир Евгеньевич</option>
                                        <option value="7">Владимирова Гавриил Евгеньевич</option>
                                        <option value="8">Любовь Андреевна Кудрявцеваа</option>
                                        <option value="9">Дроздоваа Люся Борисовна</option>
                                        <option value="10">Варвара Алексеевна Кошелева</option>
                                        <option value="11">Ева Сергеевна Ореховаа</option>
                                        <option value="12">Мартынова Добрыня Андреевич</option>
                                        <option value="13">Корнилова Юлия Дмитриевна</option>
                                        <option value="14">София Александровна Мухина</option>
                                        <option value="15">Гришинаа Олеся Ивановна</option>
                                        <option value="16">test</option>
                                    </select>
                                </div>
                                <div>
                                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2"
                                        type="submit" value="Применить">
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class='ml-auto'>
                        <x-responsive-link :href="route('tasks.create')" class="ml-2">
                            {{ __('layout.task_create_link') }}
                        </x-responsive-link>
                    </div>
                </div>

                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                        <tr>
                            <th>{{ __('layout.table_header_id') }}</th>
                            <th>{{ __('layout.table_header_task_status') }}</th>
                            <th>{{ __('layout.table_header_name') }}</th>
                            <th>{{ __('layout.table_header_created_by') }}</th>
                            <th>{{ __('layout.table_header_assigned_to') }}</th>
                            <th>{{ __('layout.table_header_created_at') }}</th>
                            <th>{{ __('layout.table_header_actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="border-b border-dashed text-left">
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->status_name }}</td>
                                <td>
                                    <a class="text-blue-600 hover:text-blue-900"
                                        href="{{ route('tasks.show', $task) }}">
                                        {{ $task->name }}
                                    </a>
                                </td>
                                <td>{{ $task->created_by_name }}</td>
                                <td>{{ $task->assigned_to_name }}</td>
                                <td>{{ Carbon\Carbon::create($task->created_at)->format('d.m.Y') }}</td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task) }}"
                                        class="text-blue-600 hover:text-blue-900">
                                        Изменить </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $tasks->links() }}
                </div>

            </div>
        </div>
    </section>
@endsection
