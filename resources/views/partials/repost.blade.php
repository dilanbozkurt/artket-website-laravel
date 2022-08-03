

            <div class="modal fade" id="repostModal" tabindex="-1" role="dialog" aria-labelledby="repostModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="repostModalLabel">{{ __('Repost') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" style="text-align: center">
                            <form  action="{{ route('repost', ['post_id' => $post['id']])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="labels" for="comment"><strong>Enter your comment</strong></label>
                                    <br>
                                    <textarea type="text" placeholder="Comment..." name="comment"></textarea>
                                </div>
                                {{-- <hr> --}}
                                
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="repost" value="Repost" style="background-color:white;color:black;" class="btn btn-dark d-flex flex-row icons d-flex align-items-center">
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


