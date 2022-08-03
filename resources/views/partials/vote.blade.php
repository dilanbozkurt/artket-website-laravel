<div class="modal fade" id="voteModal" tabindex="-1" role="dialog" aria-labelledby="voteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="voteModalLabel">{{ __('Vote') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center">
                <form  action="{{ route('vote',['id' => $post['id']])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="vote_num" class="knob" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125"
                    value="100" data-width="100" data-height="60" data-fgColor="#aaaaaa">
                    {{-- <hr> --}}
                    
            </div>
            <div class="modal-footer">
                <input type="submit" name="vote" value="Vote" style="background-color:white;color:black;" class="btn d-flex flex-row icons d-flex align-items-center">
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



<script>
    $(function($) {

  $(".knob").knob({
      change : function (value) {
          //console.log("change : " + value);
      },
      release : function (value) {
          //console.log(this.$.attr('value'));
          console.log("release : " + value);
      },
      cancel : function () {
          console.log("cancel : ", this);
      },
      /*format : function (value) {
          return value + '%';
      },*/
      draw : function () {

          // "tron" case
          if(this.$.data('skin') == 'tron') {

              this.cursorExt = 0.3;

              var a = this.arc(this.cv)  // Arc
                  , pa                   // Previous arc
                  , r = 1;

              this.g.lineWidth = this.lineWidth;

              if (this.o.displayPrevious) {
                  pa = this.arc(this.v);
                  this.g.beginPath();
                  this.g.strokeStyle = this.pColor;
                  this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                  this.g.stroke();
              }

              this.g.beginPath();
              this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
              this.g.stroke();

              this.g.lineWidth = 2;
              this.g.beginPath();
              this.g.strokeStyle = this.o.fgColor;
              this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
              this.g.stroke();

              return false;
          }
      }
  });

  // Example of infinite knob, iPod click wheel
  var v, up=0,down=0,i=0
      ,$idir = $("div.idir")
      ,$ival = $("div.ival")
      ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
      ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
  $("input.infinite").knob(
                      {
                      min : 0
                      , max : 20
                      , stopper : false
                      , change : function () {
                                      if(v > this.cv){
                                          if(up){
                                              decr();
                                              up=0;
                                          }else{up=1;down=0;}
                                      } else {
                                          if(v < this.cv){
                                              if(down){
                                                  incr();
                                                  down=0;
                                              }else{down=1;up=0;}
                                          }
                                      }
                                      v = this.cv;
                                  }
                      });
  });
</script> 