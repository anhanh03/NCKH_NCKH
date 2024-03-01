@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Error') }}</div>

                    <div class="card-body">
                        <h2>{{ $errorTitle }}</h2>
                        <p>{{ $errorMessage }}</p>
                        {{-- Nếu cần gọi đến trang lỗi hãy gọi --}}
                        {{-- return redirect()->route('error', ['errorCode' => '404', 'errorMessage' => 'Page not found']); --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection