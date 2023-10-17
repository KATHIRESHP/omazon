@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-1">
                <div class="flex p-2">
                    <a class="px-4 py-2 rounded text-blue-400 underline decoration-1" href="{{route('roles.index')}}"> <
                        Back to roles</a>
                </div>
                <div class="flex pb-12 justify-center">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form method="POST" action="{{route('roles.update', $role->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-300"> Role Name</label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name"
                                           class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                           value="{{$role->name}}"/>
                                    @error('name')
                                    <span class="text-sm text-red-700">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-6 mt-4 flex justify-end">
                                <button class="px-4 py-2 rounded bg-green-600 hover:bg-green-400" type="submit">Update
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-1 mt-3">
                <h3 class="text-xl text-white m-3">Role Permissions</h3>
                <div>
                    @if($role->permissions)
                        <div class="flex gap-4 justify-start px-5">
                            @foreach($role->permissions as $role_permission)
                                <form
                                    method="POST"
                                    action="{{ route('roles.permission.revoke', [$role->id, $role_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 rounded-md px-4 py-2"
                                            title="remove {{$role_permission->name}}">{{$role_permission->name}}</button>
                                </form>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="mt-3 flex justify-center p-4">
                    <form method="POST" class="w-4/12 bg-white/10 rounded p-4"
                          action="{{route('roles.permission.assign', $role->id)}}">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="permission" class="block text-sm font-medium text-gray-300">Role Name</label>
                            <div class="mt-1">
                                <label for="permission"
                                       class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                                @error('permission')
                                <span class="text-sm text-red-700">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-6 mt-4 flex justify-end">
                            <button class="px-4 py-2 rounded bg-green-600 hover:bg-green-400" type="submit">Assign
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
