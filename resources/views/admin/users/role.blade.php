@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
                <div class="d-flex p-2">
                    <a class="btn btn-link rounded text-decoration-none" href="{{ route('admin.index') }}"> &lt; Back to users</a>
                </div>
            <div class="dark-bg-gray d-flex justify-content-center py-5 overflow-hidden shadow-sm rounded p-1">
                <div class="d-flex flex-column pb-5 text-dark h4">
                    <div>Name: {{ $user->name }}</div>
                    <div>Email: {{ $user->email }}</div>
                </div>
            </div>
            <div class="d-flex bg-primary justify-content-center align-items-center flex-column dark-bg-gray-800 overflow-hidden shadow-sm rounded p-1 mt-3">
                <h3 class="text-xl text-white mt-3">Permission</h3>
                <div>
                    @if($user->permissions)
                        <div class="d-flex gap-4 justify-start px-5">
                            @foreach($user->permissions as $permission)
                                <form method="POST" action="{{ route('users.permission.revoke', [$user->id, $permission->id]) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded px-4 py-2" title="remove {{ $permission->name }}">{{ $permission->name }}</button>
                                </form>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="mt-3 d-flex justify-content-center col-12 p-4">
                    <form method="POST" class="w-50 bg-white border border-secondary rounded p-4"
                          action="{{ route('users.permission.assign', $user->id) }}"
                    >
                        @csrf
                        <div class="mb-3">
                            <label for="permission" class="form-label text-gray-300">Permission Name</label>
                            <select id="permission" name="permission" class="form-select">
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            @error('permission')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button class="btn btn-success px-4 py-2" type="submit">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-primary d-flex justify-content-center flex-column align-items-center dark-bg-gray-800 overflow-hidden shadow-sm rounded p-1 mt-3">
                <h3 class="text-xl text-white m-3">Roles</h3>
                <div>
                    @if($user->roles)
                        <div class="d-flex gap-4 justify-start px-5">
                            @foreach($user->roles as $role)
                                <form method="POST" action="{{ route('users.role.remove', [$user->id, $role->id]) }}" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded px-4 py-2" title="remove {{ $role->name }}">{{ $role->name }}</button>
                                </form>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="mt-3 d-flex justify-content-center col-12 p-4">
                    <form method="POST" class="w-50 bg-white border border-secondary rounded p-4" action="{{ route('users.role.assign', $user->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="role" class="form-label text-gray-300">Role Name</label>
                            <select id="role" name="role" class="form-select">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button class="btn btn-success px-4 py-2" type="submit">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
