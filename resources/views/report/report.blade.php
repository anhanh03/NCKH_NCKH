@extends('layouts.app')

@section('content')
<form action="{{ route('report') }}" method="POST">
    @csrf
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <label for="reason">Lý do báo cáo:</label>
    <textarea name="reason" id="reason" cols="30" rows="5"></textarea>
    <button type="submit">Gửi báo cáo</button>
</form>

@endsection
