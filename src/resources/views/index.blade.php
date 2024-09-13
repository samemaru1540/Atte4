@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__content">
  <div class="attendance__alert">
    {{ \Auth::user()->name }}さんお疲れ様です！
  </div>
  <div class="attendance__panel">
    <form action="attend" class="attend-form" method="post">
      @csrf
      <button class="attendance__form-submit" name="attend" type="submit">勤務開始</button>
    </form>
    <form action="leave" class="leave-form" method="post">
      @csrf
      <button class="attendance__form-submit" name="leave" type="submit">勤務終了</button>
    </form>
    <form action="break" class="break-form" method="post">
      @csrf
      <button class="attendance__form-submit" name="break" type="submit">休憩開始</button>
    </form>
    <form action="breakEnd" class="break_end" method="post">
      @csrf
      <button class="attendance__form-submit" name="break_end" type="submit">休憩終了</button>
    </form>
  </div>
</div>
@endsection