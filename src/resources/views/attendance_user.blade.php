@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance_user.css') }}">
@endsection

@section('content')
<div class="attendance-users__content">
  <form action="/attendance/users" class="attendance-users_form" method="get">
    @csrf
    <div class="header__wrap">
      <p class="header__text">ユーザー一覧</p>
      <p class="header__text-right">{{ $displayDate->format('Y-m-d') }} 現在</p>
    </div>
    <div class="table__wrap">
      <table class="attendance-users__table">
        <tr class="table__row">
          <th class="attendance-users__table-item">ID</th>
          <th class="attendance-users__table-item">名前</th>
          <th class="attendance-users__table-item">Email</th>
        </tr>
      </table>
      <table class="attendance-users__table">
        <tr class="table__rows">
          @foreach ($users as $user)
            <th class="attendance-users__table-items">{{ $user ->id }}</th>
            <th class="attendance-users__table-items">{{ $user ->name }}</th>
            <th class="attendance-users__table-items">{{ $user ->email }}</th>
          @endforeach
        </tr>
      </table>
    </div>
  </form>
  {{ $users->links() }}
</div>
@endsection