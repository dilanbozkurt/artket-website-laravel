

<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="deletePostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePostModalLabel">{{ __('Warning') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                <form  action="{{ route('change_password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p>Do you want to delete this post permanently?</p>
                    </div>
                    {{-- <hr> --}}
                    
            </div>
            <div class="modal-footer">
                <a href="{{ route('delete_own_post', ['id' => $post['id']])}}">OK</a>
            </form>
            </div>
        </div>
    </div>
</div>




		 <!-- Scripts -->
         <script src="{{ asset('js/jquery.min.js') }}"></script>
         <script src="{{ asset('js/bootstrap.min.js') }}"></script>
         <script src="{{ asset('js/jquery.knob.min.js') }}"></script>
             <script src="{{ asset('js/browser.min.js') }}"></script>
             <script src="{{ asset('js/breakpoints.min.js') }}"></script>
             <script src="{{ asset('js/util.js') }}"></script>
             <script src="{{ asset('js/main.js') }}"></script>

