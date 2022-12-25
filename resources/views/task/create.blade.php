@extends('layouts.main')

@section('title', 'Задачи')

@section('content')
{{-- {{dump($errors)}} --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="grid col-span-full">
                <x-page-title>
                    {{ __('layout.task_create_header') }}
                </x-page-title>
                {{ Form::open(['route' => 'tasks.store', 'method' => 'POST', 'accept-charset' => 'UTF-8', 'class' => 'w-50']) }}
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
                        {{ Form::label('description', __('layout.form_label_description')) }}
                    </div>
                    <div>
                        {{ Form::textarea('description', old('description'), ['class' => 'rounded border-gray-300 w-1/3 h-32', 'cols' => 50, 'rows' => 10]) }}
                    </div>
                    <x-layout.input-error :messages="$errors->get('description')" />

                    <div class="mt-2">
                        {{ Form::label('status_id', __('layout.form_label_status_id')) }}
                    </div>
                    <div>
                        {{ Form::select(
                            'status_id',
                            $taskStatusOptions,
                            null,
                            ['placeholder' => '----------', 'class' => 'rounded border-gray-300 w-1/3'],
                        ) }}
                    </div>
                    <x-layout.input-error :messages="$errors->get('status_id')" />

                    <div class="mt-2">
                        {{ Form::label('assigned_to_id', __('layout.form_label_assigned_to_id')) }}
                    </div>
                    <div>
                        {{ Form::select(
                            'assigned_to_id',
                            $appointeeOptions,
                            null,
                            ['placeholder' => '----------', 'class' => 'rounded border-gray-300 w-1/3'],
                        ) }}
                    </div>
                    <x-layout.input-error :messages="$errors->get('assigned_to_id')" />

                    <div class="mt-2">
                        {{ Form::label('labels', __('layout.form_label_labels')) }}
                    </div>
                    <div>
                        {{ Form::select(
                            'labels',
                            [
                                '1' => 'ошибка',
                                '2' => 'документация',
                                '3' => 'дубликат',
                                '4' => 'доработка'
                            ],
                            null,
                            ['placeholder' => '', 'multiple' => true, 'class' => 'rounded border-gray-300 w-1/3 h-32'],
                        ) }}
                    </div>
                    <x-layout.input-error :messages="$errors->get('labels')" />

                    <div class="mt-2">
                        {{ Form::submit(__('layout.task_store_button'), ['class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@endsection
