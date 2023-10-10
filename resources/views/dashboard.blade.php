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
        <hr><hr>
    </div>
    <div>
        <a href="{{route('crate')}}">
            <button>Create</button>
        </a>
    </div><br/><br/>
    <div>
        @if(session()->get('message'))
        <h5>{{session()->get('message')}}</h5>
        @endif
    </div>
    <div>
        <table width="100%">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->file}}</td>
                    <td>
                        <a href="{{route('edit', $student->id)}}">
                            <button>Edit</button>
                        </a>
                        <a href="{{route('delete', $student->id)}}" onclick="return confirm('Are you sure to delete it?')">
                            <button>Delete</button>
                        </a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</x-slot>
</x-app-layout>
