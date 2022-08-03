<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/top_list.css') }}">

@php($i=1)
@foreach($ordered_posts as $post)
    <div class="tab-content">
        <div class="tab-pane fade show active" role="tabpanel">
            <div class="accordion">
                <div class="card content_pool_item_add content_pool_item">
                        <div class="card-header">
                            <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($post->id) ])}}" noajax="1" class="btn_toplist_play_descriptor">
                                <div class="item">
                                    <div class="item-order fixed">
                                        <p>{{ $i++ }}</p>
                                    </div>

                                    <div class="item-img">
                                        @if($post->type=='text')
                                        <img style="border:solid #5c361a 4px" src="{{ $post->image_path }}" width="125" height="81"/>
                                        @elseif($post->type=='image')
                                        <img style="border:solid #872f26 4px" src="{{ $post->image_path }}" width="125" height="81"/>
                                        @elseif($post->type=='video')
                                        <img style="border:solid #c4572e 4px" src="{{ $post->image_path }}" width="125" height="81"/>
                                        @else
                                        <img style="border:solid #fd933a 4px" src="{{ $post->image_path }}" width="125" height="81"/>
                                        @endif
                                    </div>

                                    <div class="item-link">
                                        <strong>{{ $post->title }}</strong>
                                        <span>{{ $post->description }}</span>
                                        <div class="postcard__bar"></div>
                                        <h6><i>Vote: {{round($post->average,2)  }}</i></h6>
                                    </div>

                                    <i class="fas fa-angle-double-right"></i>

                                </div>
                            </a>
                        </div>

                    </div>

            </div>
    <!-- </div> -->

</div>

      <!-- </nav> -->
</div>
@endforeach

