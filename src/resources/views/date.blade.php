@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/default.css') }}">
@endsection

@section('content')
<form action="/date" class="date_form" method="get">
  @csrf
  <table>
    <tr>
      <th>名前</th>
      <th>勤務開始</th>
      <th>勤務終了</th>
      <th>休憩時間</th>
      <th>勤務時間</th>
    </tr>
  </table>
</form>
@endsection