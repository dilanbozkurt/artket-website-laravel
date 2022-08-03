

<div class="modal fade" id="spamModal" tabindex="-1" role="dialog" aria-labelledby="spamModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spamModalLabel">Report User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">

                    <div class="card" style="width: 100%;">
                        <div class="card-header">
                          Why are you reporting this user?
                        </div>
                        <ul class="list-group list-group-flush">
                          <a href="{{ route('report_user', ['message' => '1','id' => $user['id']])}}"><li class="list-group-item">Inappropriate content
                        </li></a>
                        <hr>
                        <a href="{{ route('report_user', ['message' => '2','id' => $user['id']])}}"><li class="list-group-item">Scams or fraud
                        </li></a>
                        <hr>
                        <a href="{{ route('report_user', ['message' => '3','id' => $user['id']])}}"><li class="list-group-item">Intellectual property violations
                        </li></a>
                        </ul>
                      </div>
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

