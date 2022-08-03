<!-- background-image: url("upload/images/Abstract-Art-Logo-Design.png"); -->

<section class="cd-timeline js-cd-timeline">
    <div class="max-width-lg cd-timeline__container">

    @foreach($repost_posts as $rp)
    <div class="cd-timeline__block">

        <div class="cd-timeline__img cd-timeline__img--movie">
            {{-- <img src="../{{ $user->imgfile_path }}" alt="User Image">  --}}
        </div> <!-- cd-timeline__img -->

        <div class="cd-timeline__content text-component">

        @if($rp->comment)

            <header>
                <div class="title" style="max-width:200px;overflow-wrap: break-word;border-top:dashed 1px;border-bottom:dashed 1px;">
                    {{-- <h2><a href="#">{{ $rp->comment }}</a></h2> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-quote" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                        <path d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
                      </svg>
                    <p style="color: rgb(55, 53, 53);margin-left:10px;">{{ $rp->comment }}</p>
                </div>

                <div class="meta">

                    <a href='{{ route('profile',['id' => Crypt::encrypt($rp->user_id) ])}}' class="author"><span style="color: #112a1c" class="name">{{ $rp->username }}</span><img style="border-radius:50px;margin-left:5px" width="25%" src="../{{ $rp->imgfile_path }}" alt="" /></a>
                </div>
            </header>

        @else
        <header>
            <div class="title" style="max-width:200px;overflow-wrap: break-word;border-top:dashed 1px;border-bottom:dashed 1px;">
                {{-- <h2><a href="#">{{ $rp->comment }}</a></h2> --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-quote" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                    <path d="M7.066 4.76A1.665 1.665 0 0 0 4 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112zm4 0A1.665 1.665 0 0 0 8 5.668a1.667 1.667 0 0 0 2.561 1.406c-.131.389-.375.804-.777 1.22a.417.417 0 1 0 .6.58c1.486-1.54 1.293-3.214.682-4.112z"/>
                  </svg>
                <p style="color: rgb(55, 53, 53);margin-left:10px;">Check out this post!</p>
            </div>

            <div class="meta">

                <a href='{{ route('profile',['id' => Crypt::encrypt($rp->user_id) ])}}' class="author"><span style="color: #112a1c" class="name">{{ $rp->username }}</span><img style="border-radius:50px;margin-left:5px" width="25%" src="../{{ $rp->imgfile_path }}" alt="" /></a>
            </div>
        </header>

        @endif
        
        <h2>{{ $rp->title }}</h2>
        <p style="width: 400px;" class="color-contrast-medium">{{ $rp->description }}</p>

        @if($rp->type=='audio')
            <div class="card" style="margin-bottom: 10px;">
            <audio style="width: 100%;"  controls>
                @foreach ($audio_posts as $ap)
                    @if ($ap->post_id==$rp->post_id)
                        <source src="../{{ $ap->audio_target }}" type="audio/mpeg">
                    @endif
                @endforeach 
            </audio>
        </div>
        @endif

        @if($rp->type=='image')
        <div class="card" style="margin-bottom: 10px;">
            <img src="../{{ $rp->image_path }}" alt="Picture">
        </div>
        @endif

        @if($rp->type=='video')
            <div class="card" style="margin-bottom: 10px;">
                <video width="100%" height="200" controls>
                     @foreach ($video_posts as $vp)
                        @if ($vp->post_id==$rp->post_id)
                        <source src="../{{ $vp->video_target }}" type="video/mp4">
                        @endif
                    @endforeach 
                </video>
            </div>
        @endif

        <div class="flex justify-between items-center">
            <span class="cd-timeline__date">{{ $rp->created_at }}</span>
            <a href="{{ route('go_to_post', ['id' => Crypt::encrypt($rp->post_id)])}}" class="btn btn--subtle">View Post</a>
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


<style>

 header {
			display: -moz-flex;
			display: -webkit-flex;
			display: -ms-flex;
			display: flex;
			border-bottom: solid 1px rgba(160, 160, 160, 0.3);
			left: -1em;
			margin: -3em 0 3em 0;
			position: relative;
			width: calc(85% + 6em);
		}

 header .title {
				-moz-flex-grow: 1;
				-webkit-flex-grow: 1;
				-ms-flex-grow: 1;
				flex-grow: 1;
				/* -ms-flex: 1; */
				padding: 2.3em 2em 1.75em 2em;
                display: flex
                
			}
 header .title h2 {
					font-weight: 900;
					font-size: 1.5em;
				}

 header .title > :last-child {
					margin-bottom: 0;
				}

header .meta {
				padding: 1.5em 2em 0.75em 2em;
				border-left: solid 1px rgba(160, 160, 160, 0.3);
				min-width: 17em;
				text-align: right;
				width: 17em;
			}

 header .meta > * {
					margin: 0 0 1.5em 0;
				}

header .meta > :last-child {
					margin-bottom: 0;
				}

 h
a.image.featured {
			overflow: hidden;
		}


</style>