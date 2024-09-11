@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<form action="/" class="stamp_form" method="post">
  @csrf
  <div class="attendance__content">
    <div class="attendance__alert">
      {{ \Auth::user()->name }}さんお疲れ様です！
    </div>
    <div class="attendance__panel">
        <button class="attendance__form-submit" name="attend" type="submit">勤務開始</button>
        <button class="attendance__form-submit" name="leave" type="submit">勤務終了</button>
        <button class="attendance__form-submit" name="break" type="submit">休憩開始</button>
        <button class="attendance__form-submit" name="break_end" type="submit">休憩終了</button>
      </div>
    </div>
</form>
@endsection