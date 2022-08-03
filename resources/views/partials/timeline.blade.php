<!-- background-image: url("upload/images/Abstract-Art-Logo-Design.png"); -->

<section class="cd-timeline js-cd-timeline">
    <div class="max-width-lg cd-timeline__container">

    @foreach($timeline_post as $tp)
    <div class="cd-timeline__block">

        <div class="cd-timeline__img cd-timeline__img--movie">
            <!-- <img src="assets/img/cd-icon-movie.svg" alt="Movie"> -->
            </div> <!-- cd-timeline__img -->
    

        <div class="cd-timeline__content text-component">
        
        <h2>{{ $tp->title }}</h2>
        <p style="width: 400px;" class="color-contrast-medium">{{ $tp->description }}</p>

        @if($tp->type=='audio')
            <div class="card" style="margin-bottom: 10px;">
            <audio style="width: 100%;"  controls>
                @foreach ($audio_posts as $ap)
                    @if ($ap->post_id==$tp->id)
                        <source src="../{{ $ap->audio_target }}" type="audio/mpeg">
                    @endif
                @endforeach 
            </audio>
        </div>
        @endif

        @if($tp->type=='image')
        <div class="card" style="margin-bottom: 10px;">
            <img src="../{{ $tp->image_path }}" alt="Picture">
        </div>
        @endif

        @if($tp->type=='video')
            <div class="card" style="margin-bottom: 10px;">
                <video width="100%" height="200" controls>
                     @foreach ($video_posts as $vp)
                        @if ($vp->post_id==$tp->id)
                        <source src="../{{ $vp->video_target }}" type="video/mp4">
                        @endif
                    @endforeach 
                </video>
            </div>
        @endif

        <div class="flex justify-between items-center">
            <span class="cd-timeline__date">{{ $tp->created_at }}</span>
            <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($tp['id'])])}}" class="btn btn--subtle">View Post</a>
        </div>
        </div> <!-- cd-timeline__content -->
    </div> <!-- cd-timeline__block -->
    @endforeach
    

    {{-- AUDIO --}}


    {{-- <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--movie">
        <!-- <img src="assets/img/cd-icon-movie.svg" alt="Movie"> -->
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
        <h2>Audio Title</h2>
        <!-- <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
         -->
         <div class="card" style="margin-bottom: 10px;">
         <audio width="400" controls>
            <source src="upload\audios\The Artist Song  Nursery Rhymes  Kids Songs with Sweet Tweets.mp3" type="audio/mpeg">
        </audio>
        </div>
        <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Jan 18</span>
            <a href="#0" class="btn btn--subtle">Go to the post</a>
        </div>
        </div> <!-- cd-timeline__content -->
    </div> <!-- cd-timeline__block --> --}}

    {{-- IMAGE --}}

    {{-- <div class="cd-timeline__block">

        <div class="cd-timeline__content text-component">
        <h2>Image Title</h2>
        <!-- <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p> -->
<div class="card" style="margin-bottom: 10px;">
<img src="../upload/images/arkhe-sanat-akademisi-resim-is-ogretmenligi-01.jpg" alt="Picture">
</div>
        <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Jan 24</span>
            <a href="#0" class="btn btn--subtle">Read more</a>
        </div>
        </div> <!-- cd-timeline__content -->
    </div> <!-- cd-timeline__block --> --}}


    {{-- VIDEO --}}

    {{-- <div class="cd-timeline__block">
        <div class="cd-timeline__img cd-timeline__img--location">
        <!-- <img src="assets/img/cd-icon-location.svg" alt="Location"> -->
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">
        <h2>Video Title</h2>
        <!-- <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p> -->
        <div class="card" style="margin-bottom: 10px;">
            <video width="400" height="200" controls>
            <source src="upload\videos\New Social Network - Part 23 - @ Mentions.mp4" type="video/mp4">
            </video>
        </div>
        <div class="flex justify-between items-center">
            <span class="cd-timeline__date">Feb 14</span>
            <a href="#0" class="btn btn--subtle">Read more</a>
        </div>
        </div> <!-- cd-timeline__content -->
    </div> <!-- cd-timeline__block --> --}}

    </div> <!-- cd-timeline__content -->

</section> <!-- cd-timeline -->
