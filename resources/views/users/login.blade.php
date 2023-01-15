@extends('guest_layout')

@section('content')

<x-card class="p-10 max-w-lg mx-auto mt-24">
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1 dark:text-gray-200">
        Log In
    </h2>
    <p class="mb-4 dark:text-gray-200">Log into your account</p>
</header>

<form method="POST" action="/users/authenticate">
    @csrf

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2 dark:text-gray-200"
            >Email</label
        >
        <input
            type="email"
            class="border border-gray-200 rounded p-2 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="email"
            value="{{old('email')}}"
        />
        <!-- Error Example -->
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    
    </div>

    <div class="mb-6">
        <label
            for="password"
            class="inline-block text-lg mb-2 dark:text-gray-200"
        >
            Password
        </label>

        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="password"
        />
        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror


    </div>

    <div class="mb-6">
        <button
            type="submit"
            class="bg-cyan-700 text-white rounded py-2 px-4 hover:bg-cyan-600 transition duration-300 dark:text-gray-200"
        >
            Sign In
        </button>
    </div>

    <div class="mt-8 dark:text-gray-200">
        <p>
            Dont have an account?
            <a href="/register" class="text-cyan-600"
                >Register</a
            >
        </p>
    </div>
</form>
</x-card>

@endsection