@extends('template')

@section('content')
    <div class="row mt-5">
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center mb-0">Search</h4>
                </div>
                <div class="card-body">
                    <form role="form" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="#">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <ul class="list-unstyled mb-0">
                        @foreach($data['dados'] as $dados)
                        <li>{{ $dados['name'] }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            @if (isset($data['tweet']))
            @foreach($data['tweet'] as $tweet)
            <div class="col-12 mb-2">
                <div data-id="{{ $tweet['id'] }}" class="card card-body mb-3 rounded-0">
                    <div>
                        <a href="{{ $tweet['user_link'] }}" target="_blank">{{ $tweet['user'] }}</a>
                    </div>
                    <div>
                        <p>{{ $tweet['text'] }}</p><a href="{{ $tweet['link'] }}" class="btn btn-warning rounded-0" target="_blank">Ver completo</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3 class="mb-3">< Make a search by hashtag (don't forget the # before keyword)</h3>
            <p><b>Filters:</b><br>Day: today<br>Count: 15<br>Order by recent</p>
            @endif
        </div>
    </div>
@endsection
