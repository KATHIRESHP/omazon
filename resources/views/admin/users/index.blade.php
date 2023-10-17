@extends('layouts.app')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="bg-white dark-bg-gray-800 overflow-hidden shadow-sm rounded p-1">
                <div class="text-dark h4 m-4">Users</div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-weight-bold text-gray-500 uppercase">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-weight-bold text-gray-500 uppercase">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-weight-bold text-gray-500 uppercase">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="text-end">
                                    <div class="btn-group">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Roles</a>
                                        <form method="POST" action="{{ route('user.delete', $user->id) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
