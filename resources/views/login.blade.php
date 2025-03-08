@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center m-6">
        <form action="#" class="bg-linear-65 from-slate-700 to-slate-500 p-4 rounded-2xl">
            @csrf
            <div class="m-4">
                <div class="flex flex-col m-2">
                    <x-input-label :value="__('Username')"/>
                    <x-text-input class="mb-1 p-2 mt-1" type="text" name="username" id="username" placeholder="Player" required autofocus/>
                    <x-input-error :messages="$errors->get('username')" />
                </div>

                <div class="flex flex-col m-2">
                    <x-input-label :value="__('Password')"/>
                    <x-text-input class="mb-1 p-2 mt-1" type="password" name="password" id="password" required autofocus/>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="flex m-2">
                    <x-input-checkbox class="my-1" name="remember" id="remember"></x-input-checkbox>
                    <span class="ms-2 text-sm text-slate-300">{{ __('Remember me') }}</span>
                </div>

                <a href="/register" class="flex justify-center text-sm text-slate-300 underline hover:text-slate-200">
                    {{ __("Don't have an account? Register now") }}
                </a>

                <div class="flex justify-center m-2">
                    <x-input-button-primary>
                        {{ __('login') }}
                    </x-input-button-primary>
                </div>
            </div>
        </form>
        <script>
            $('form').on('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: "Success!",
                    text: "Ini coma percobaan login/register aja",
                    icon: "success"
                });
            })
        </script>
    </div>
@endsection
