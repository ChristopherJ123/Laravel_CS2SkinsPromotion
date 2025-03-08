@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center m-6">
        <form action="#" class="bg-linear-65 from-slate-700 to-slate-500 p-4 rounded-2xl">
            @csrf
            <div class="m-4 w-64">
                <div class="flex flex-col m-2">
                    <x-input-label for="username" :value="__('Username')"/>
                    <x-text-input class="mb-1 p-2 mt-1" type="text" name="username" id="username" placeholder="Player" required autofocus/>
                    <x-input-error :messages="$errors->get('username')" />
                </div>

                <div class="flex flex-col m-2">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input class="mb-1 p-2 mt-1" type="email" name="email" id="email" placeholder="Player@gmail.com" autofocus/>
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="flex flex-col m-2">
                    <x-input-label for="password" :value="__('Password')"/>
                    <x-text-input class="mb-1 p-2 mt-1" type="password" name="password" id="password" required autofocus/>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="flex flex-col m-2">
                    <x-input-label for="password_confirmation" :value="__('Password Confirmation')"/>
                    <x-text-input class="mb-1 p-2 mt-1" type="password" name="password_confirmation" id="password_confirmation" required autofocus/>
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>


                <div class="flex flex-col items-center m-2">
                    <a href="/login" class="flex justify-center me-2 text-sm text-slate-300 underline hover:text-slate-200">
                        {{ __("Already have an account?") }}
                    </a>
                </div>

                <div class="flex justify-center">
                    <x-input-button-primary>
                        {{ __('register') }}
                    </x-input-button-primary>
                </div>
            </div>
        </form>
    </div>
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
@endsection
