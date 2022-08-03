<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="row">
    <div class="card-columns">
      @foreach($posts as $post)
        @if($post->type=='text')
          <div class="card card-pin" style="padding: 8px;background-color:#5c361a">
        @elseif($post->type=='image')
          <div class="card card-pin" style="padding: 8px;background-color:#872f26">
        @elseif($post->type=='video')
          <div class="card card-pin" style="padding: 8px;background-color:#c4572e">
        @else
          <div class="card card-pin" style="padding: 8px;background-color:#fd933a">
        @endif
        <img class="card-img" src="{{ $post['image_path'] }}" alt="Card image">
        <div class="overlay">
          <h2 class="card-title title"><{{ $post['title'] }}</h2>
          <div class="more">
          <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post['id'])])}}">
            <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
          </div>
          @if (is_null($post->average))
            <div class="text-center">
              <h1 style="font-size: 64px" class="card-title title">0%</h1>
            </div>
          @else
          <div class="text-center">
            <h1 style="font-size: 64px" class="card-title title">{{ round($post->average,2)  }}%</h1>
          </div>
          @endif
      </div>
      </div>
    @endforeach
          </div>
      </div>