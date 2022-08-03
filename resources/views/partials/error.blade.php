
<div class="modal fade" id="ErrorModal" tabindex="-1" role="dialog" aria-labelledby="cpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ErrorModal">{{ __('Error!') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                    <div class="form-group">
                        <label class="labels" for="old_password"><strong>{{ $message }}</strong></label>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="ok" value="I understand." style="background-color:white;color:black;" class="btn btn-dark d-flex flex-row icons d-flex align-items-center">
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

