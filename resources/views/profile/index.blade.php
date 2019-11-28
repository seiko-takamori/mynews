@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($profiles as $profile)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    日付：{{ $profile->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                   名前： {{ $profile->name }}
                                </div>
                                <div class="body mt-3">
                                    性別：{{ $profile->gender }}
                                </div>
                                <div class="body mt-3">
                                   趣味： {{ $profile->hobby }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection