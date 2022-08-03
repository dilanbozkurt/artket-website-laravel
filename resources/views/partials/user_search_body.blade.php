

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_search.css') }}">

 
                        @foreach ($users as $user )

                            <div class="card card-body">
                                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                            <div class="mr-2 mb-3 mb-lg-0">
                                                <a id="pp" href='{{ route('profile',['id' => Crypt::encrypt($user->id) ])}}'>
                                                    <img style="border-radius: 10px;" src="{{ $user->imgfile_path }}" width="150" height="150" alt="">
                                                </a>
                                            </div>
            
                                            <div style="margin-left: 20px;" class="media-body">
                                                <h6 class="media-title font-weight-semibold">
                                                    <a href="{{ route('profile',['id' => Crypt::encrypt($user->id) ])}}" data-abc="true">{{ $user->first_name }} {{ $user->last_name }}</a>
                                                </h6>
                                                <hr>
            
                                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                                    <strong><li class="list-inline-item"><a href="{{ route('profile',['id' => Crypt::encrypt($user->id) ])}}" class="text-muted" data-abc="true">{{ $user->username }}</a></li></strong>
                                                </ul>
            
                                                <p  class="mb-3 rainbow-text">{{ $user->name }}</p>
            
                                            </div>
            
                                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

                                                @if($visiter_followings_list->contains($user->id))
                                                    <a href='{{ route('unfollow',['id' => $user->id])}}'><button type="button" class="btn btn-dark text-white unfollow"><i class="icon-cart-add mr-2"></i> Unfollow</button></a>
                                                @else
                                                    <a href='{{ route('follow',['id' => $user->id])}}'><button  type="button" class="btn btn-success text-white"><i class="icon-cart-add mr-2"></i> Follow</button></a>
                                                @endif
                                                <a href="{{ route('chat')}}"><button type="button" class="btn btn-secondary text-white"><i class="icon-cart-add mr-2"></i> Message</button></a>
                                            </div>
                                        </div>
                                    </div>
@endforeach

