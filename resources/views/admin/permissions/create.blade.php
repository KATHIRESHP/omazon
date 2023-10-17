@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-1">
                <div class="flex p-2">
                    <a class="px-4 py-2 rounded text-blue-400 underline decoration-1" href="{{route('roles.index')}}"> < Back to permissions</a>
                </div>
                <div class="flex pb-12 justify-center">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{route('permissions.store')}}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-300"> Permission Name</label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    @error('name')
                                    <span class="text-sm text-red-700">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-6 mt-4 flex justify-end">
                                <button class="px-4 py-2 rounded bg-green-600 hover:bg-green-400" type="submit">Create</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
