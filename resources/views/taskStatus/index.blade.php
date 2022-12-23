@extends('layouts.main')

@section('title', 'Статусы задач')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            @include('flash::message')
            <div class="grid col-span-full">
                <x-page-title>
                    {{ __('layout.task_status_index_header') }}
                </x-page-title>

                <div>
                    <x-responsive-link :href="route('task_statuses.create')">
                        {{ __('layout.task_status_create_link') }}
                    </x-responsive-link>
                </div>

                <table class="mt-4">
                    <thead class="border-b-2 border-solid border-black text-left">
                        <tr>
                            <th>{{ __('layout.table_header_id') }}</th>
                            <th>{{ __('layout.table_header_name') }}</th>
                            <th>{{ __('layout.table_header_created_at') }}</th>
                            <th>{{ __('layout.table_header_actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskStatuses as $taskStatus)
                            <tr class="border-b border-dashed text-left">
                                <td>{{ $taskStatus->id }}</td>
                                <td>{{ $taskStatus->name }}</td>
                                <td>{{ Carbon\Carbon::create($taskStatus->created_at)->format('d.m.Y') }}</td>
                                <td>
                                    <a data-confirm="{{ __('layout.destroy_confirmation') }}" data-method="delete"
                                        class="text-red-600 hover:text-red-900"
                                        href="{{ route('task_statuses.destroy', $taskStatus) }}"
                                        rel="nofollow">
                                        {{ __('layout.task_status_destroy_link') }}
                                    </a>
                                    <a class="text-blue-600 hover:text-blue-900"
                                        href="{{ route('task_statuses.edit', $taskStatus) }}">
                                        {{ __('layout.task_status_edit_link') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
@endsection
