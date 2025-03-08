@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center m-6 overflow-hidden">
        <div class="flex flex-col sm:flex-row gap-4 bg-linear-65 from-slate-700 to-slate-500 p-4 rounded-2xl">
            <div>
                <img class="h-full w-128 object-cover" src="{{ asset('storage/profile.jpg') }}" alt="profile">
            </div>
            <div class="big-shoulders-light flex flex-col justify-between">
                <div>
                    <p class="text-2xl md:text-4xl text-slate-300 pb-2">Welcome back, <b class="text-slate-100">Xx_KingAmeR_xX</b></p>
                    <div class="md:grid md:grid-cols-2 break-words">
                        <p class="text-xl md:text-2xl text-slate-400">Wallet ballance:</p><p class="text-xl md:text-2xl text-slate-300">USD $466.67</p>
                        <p class="text-xl md:text-2xl text-slate-400">Email:</p><p class="text-xl md:text-2xl text-slate-300">kingamer666@hotmail.com</p>
                        <p class="text-xl md:text-2xl text-slate-400">Last online:</p><p class="text-xl md:text-2xl text-slate-300">16-09-2024, 09:48:23 UST</p>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <button onclick="confirmDialog('change')" class="text-xl md:text-3xl text-slate-200 py-1 px-2 bg-linear-60 from-red-400 to-red-500 rounded-lg shadow-lg hover:scale-101">Change password</button>
                    <button onclick="confirmDialog('delete')" class="text-xl md:text-3xl text-slate-200 py-1 px-2 bg-linear-60 from-red-400 to-red-500 rounded-lg shadow-lg hover:scale-101">Delete account</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDialog(text) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes " + text + " it!"
            });
        }
    </script>
@endsection
