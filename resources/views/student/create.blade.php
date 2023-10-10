<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('user Dashboard') }}
        </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as user!") }}
                </div>
            </div>
        </div>
        <hr>
        <hr>
    </div>
    <div>
        <h1>Create student</h1>
        <div>
            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="name"/><br/>
                @error('name')
                    <span>{{$message}}</span>
                @enderror<br/>
                <input type="text" name="email" placeholder="email"/><br/>
                @error('email')
                <span>{{$message}}</span>
                @enderror
                <br/>
                <input type="text" name="phone" placeholder="phone"/><br/>
                @error('phone')
                <span>{{'phone'}}</span>
                @enderror<br/>
                <input type="file" name="file" accept=".pdf, .doc"/><br/>
                @error('file')
                <span>{{$message}}</span>
                @enderror
                <br/>
                <input type="text" name="message" placeholder="message"/><br/>
                @error('message')
                <span>{{$message}}</span>
                @enderror
                <br/>
                <input type="submit">
            </form>
        </div>
    </div>
</x-slot>
</x-app-layout>