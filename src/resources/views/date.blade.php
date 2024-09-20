@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
@endsection

@section('content')
<div class="attendance__content">
    <form class="header__wrap" action="{{ route('per/date') }}" method="post">
      @csrf
      <button class="date__change-button" name="prevDate"><</button>
      <input type="hidden" name="date" value="{{ $displayDate }}">
      <p class="header__text">{{ $displayDate->format('Y-m-d') }}</p>
      <button class="date__change-button" name="nextDate">></button>
    </form>
    <form action="/date" class="date_form" method="get">
      @csrf
      <div class="table__wrap">
        <table class="attendance__table">
          <tr class="table__row">
            <th class="attendance__table-item">名前</th>
            <th class="attendance__table-item">勤務開始</th>
            <th class="attendance__table-item">勤務終了</th>
            <th class="attendance__table-item">休憩時間</th>
            <th class="attendance__table-item">勤務時間</th>
          </tr>
        </table>
        <table class="attendance__table">
            <tr class="table__rows">
              @foreach ($users as $user)
                <th class="attendance__table-items">{{ $user ->name }}</th>
                <th class="attendance__table-items">{{ $user ->attend }}</th>
                <th class="attendance__table-items">{{ $user ->leave }}</th>
                <th class="attendance__table-items">{{ $user ->break }}</th>
                <th class="attendance__table-items">{{ $user ->break_end }}</th>
              @endforeach
          </tr>
        </table>
      </div>
    </form>
  {{ $users->links() }}
</div>
@endsection