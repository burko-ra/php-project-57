@extends('layouts.main')

@section('title', 'Статусы задач')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <h1 class="mb-5">{{ __('layout.task_status_create_header') }}</h1>

                {{ Form::open(['route' => 'task_statuses.store', 'method' => 'POST', 'accept-charset' => 'UTF-8', 'class' => 'w-50']) }}
                @csrf
                <div class="flex flex-col">
                    <div>
                        {{ Form::label('name', __('layout.form_label_name')) }}
                    </div>
                    <div class="mt-2">
                        {{ Form::text('name', old('name'), ['class' => 'rounded border-gray-300 w-1/3']) }}
                    </div>
                    <x-layout.input-error :messages="$errors->get('name')" />

                    <div class="mt-2">
                        {{ Form::submit(__('layout.task_status_store_button'), ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection
