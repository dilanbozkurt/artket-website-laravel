@include('admin.sidebar')

<style>

.table .btn {
    margin: 5px;
}

  .toggle {
    align-items: center;
    border-radius: 100px;
    display: flex;
    font-weight: 700;
    margin-bottom: 16px;
  }
  .toggle:last-of-type {
    margin: 0;
  }
  
  .toggle__input {
    clip: rect(0 0 0 0);
    clip-path: inset(50%);
    height: 1px;
    overflow: hidden;
    position: absolute;
    white-space: nowrap;
    width: 1px;
  }
  .toggle__input:not([disabled]):active + .toggle-track, .toggle__input:not([disabled]):focus + .toggle-track {
    border: 1px solid transparent;
    box-shadow: 0px 0px 0px 2px #121943;
  }
  .toggle__input:disabled + .toggle-track {
    cursor: not-allowed;
    opacity: 0.7;
  }
  
  .toggle-track {
    background: #e5efe9;
    border: 1px solid #5a72b5;
    border-radius: 100px;
    cursor: pointer;
    display: flex;
    height: 30px;
    margin-right: 12px;
    position: relative;
    width: 60px;
    margin-left: 10px;
  }
  
  .toggle-indicator {
    align-items: center;
    background: #121943;
    border-radius: 24px;
    bottom: 2px;
    display: flex;
    height: 24px;
    justify-content: center;
    left: 2px;
    outline: solid 2px transparent;
    position: absolute;
    transition: 0.25s;
    width: 24px;
  }
  
  .checkMark {
    fill: #fff;
    height: 20px;
    width: 20px;
    opacity: 0;
    transition: opacity 0.25s ease-in-out;
  }
  
  .toggle__input:checked + .toggle-track .toggle-indicator {
    background: #121943;
    transform: translateX(30px);
  }
  .toggle__input:checked + .toggle-track .toggle-indicator .checkMark {
    opacity: 1;
    transition: opacity 0.25s ease-in-out;
  }
  
  @media screen and (-ms-high-contrast: active) {
    .toggle-track {
      border-radius: 0;
    }
  }
      .bg-c-lite-green {
          background: linear-gradient(to right, #ee5a6f, #f29263)
      }
      
      .user-profile {
          padding: 20px 0
      }
      
      .card-block {
          padding: 1.25rem
      }
      
      .m-b-25 {
          margin-bottom: 25px
      }
      
      .img-radius {
          border-radius: 5px;
      
      }
      .f-w-600 {
          font-weight: 600
      }
  
      form{
        display: flex;
        width: 100%;
      }
      </style>

{{-- UPDATE E BASTIĞINDA PERMISSIONLARIN LİSTESİ GELECEK İŞARETLİ OLANLARI ASSIGN EDECEK --}}
<body class="">
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Roles</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            Role
                          </th>
                          <th>
                            Permissions
                          </th>
                          <th class="text-right">
                            Action
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            Admin
                            </td>
                            <td>

                                <div style="display:flex;">
                                  @foreach ($admin_permissions as $ap )
                                    <button class="btn btn-primary btn-block">{{ $ap->name }}</button>       
                                  @endforeach                   
                                </div>

                            </td>
                            <td class="text-right">
                            <button class="btn btn-dark" onclick="showUpdate('1')" type="submit" name="delete">Update</button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            Artist
                            </td>
                            <td>

                              <div style="display:flex;">
                                @foreach ($artist_permissions as $ap )
                                  <button class="btn btn-primary btn-block">{{ $ap->name }}</button>       
                                @endforeach                   
                              </div>
                            </td>
                            <td class="text-right">
                              <button class="btn btn-dark" onclick="showUpdate('2')" type="submit" name="delete" >Update</button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            Endustry Professional
                            </td>
                            <td>

                              <div style="display:flex;">
                                @foreach ($prof_permissions as $pp )
                                  <button class="btn btn-primary btn-block">{{ $pp->name }}</button>       
                                @endforeach                   
                              </div>
                            </td>
                            <td class="text-right">
                              <button class="btn btn-dark" onclick="showUpdate('3')" type="submit" name="delete" >Update</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12" id="profForm" style="display: none">
                <div class="card card-user">
                    <div class="card-header">
                      <h5 class="card-title">Update Endustry Professional Permissions</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">               
                        @foreach ($prof_permissions as $pr_p)
                                  
                        <label class="toggle" for="{{ $pr_p->id }}">
                          <input type="checkbox" class="toggle__input prof" id="{{ $pr_p->id }}" checked/>

                            <span class="toggle-track">
                                <span class="toggle-indicator">
                                    <!-- 	This check mark is optional	 -->
                                    <span class="checkMark">
                                        <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                            <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                        </svg>
                                    </span>
                                </span>
                            </span>
                            {{ $pr_p->name }}
                        </label> 
                        @endforeach  

                        @foreach ($not_prof_permissions as $npr_p)
                                  
                        <label class="toggle" for="{{ $npr_p->id }}">
                          <input type="checkbox" class="toggle__input prof" name="3" id="{{ $npr_p->id }}"/>

                            <span class="toggle-track">
                                <span class="toggle-indicator">
                                    <!-- 	This check mark is optional	 -->
                                    <span class="checkMark">
                                        <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                            <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                        </svg>
                                    </span>
                                </span>
                            </span>
                            {{ $npr_p->name }}
                        </label> 
                        @endforeach 
                      </div>
                    </div>
                </div>
              </div> 

              <div class="col-md-12" id="adminForm" style="display: none">
                <div class="card card-user">
                    <div class="card-header">
                      <h5 class="card-title">Update Admin Permissions</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">     
                          @foreach ($admin_permissions as $ad_p)
                                  
                        <label class="toggle" for="{{ $ad_p->id }}">
                          <input type="checkbox" class="toggle__input admin" id="{{ $ad_p->id }}" checked/>

                            <span class="toggle-track">
                                <span class="toggle-indicator">
                                    <!-- 	This check mark is optional	 -->
                                    <span class="checkMark">
                                        <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                            <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                        </svg>
                                    </span>
                                </span>
                            </span>
                            {{ $ad_p->name }}
                        </label> 
                        @endforeach  

                        @foreach ($not_admin_permissions as $nad_p)
                                  
                        <label class="toggle" for="{{ $nad_p->id }}">
                          <input type="checkbox" class="toggle__input admin" id="{{ $nad_p->id }}"/>

                            <span class="toggle-track">
                                <span class="toggle-indicator">
                                    <!-- 	This check mark is optional	 -->
                                    <span class="checkMark">
                                        <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                            <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                        </svg>
                                    </span>
                                </span>
                            </span>
                            {{ $nad_p->name }}
                        </label> 
                        @endforeach 
                      </div>
                    </div>
                </div>
              </div> 

              <div class="col-md-12" id="artistForm" style="display: none">
                <div class="card card-user">
                    <div class="card-header">
                      <h5 class="card-title">Update Artist Permissions</h5>
                    </div>
                    <div class="card-body">
                      <div class="row">     
                        @foreach ($artist_permissions as $ar_p)
                                  
                        <label class="toggle" for="{{ $ar_p->id }}">
                          <input type="checkbox" class="toggle__input artist" id="{{ $ar_p->id }}" checked/>

                            <span class="toggle-track">
                                <span class="toggle-indicator">
                                    <!-- 	This check mark is optional	 -->
                                    <span class="checkMark">
                                        <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                            <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                        </svg>
                                    </span>
                                </span>
                            </span>
                            {{ $ar_p->name }}
                        </label> 
                        @endforeach  

                        @foreach ($not_artist_permissions as $nar_p)
                                  
                        <label class="toggle" for="{{ $nar_p->id }}">
                          <input type="checkbox" class="toggle__input artist" id="{{ $nar_p->id }}"/>

                            <span class="toggle-track">
                                <span class="toggle-indicator">
                                    <!-- 	This check mark is optional	 -->
                                    <span class="checkMark">
                                        <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                            <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                        </svg>
                                    </span>
                                </span>
                            </span>
                            {{ $nar_p->name }}
                        </label> 
                        @endforeach 
                      </div>
                    </div>
                </div>
              </div> 

                      
    
        </div>
      </div>
      

    </body>

<script>
  function showUpdate(label) {
  var admin = document.getElementById("adminForm");
  var artist = document.getElementById("artistForm");
  var prof = document.getElementById("profForm");

  if (label === "1") {
    admin.style.display = "block";
    artist.style.display="none";
    prof.style.display="none";
  }else if(label === "2"){
    admin.style.display = "none";
    artist.style.display="block";
    prof.style.display="none";
  }
  else {
    admin.style.display = "none";
    artist.style.display="none";
    prof.style.display="block";
  }
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    var per_id='';
    var role_id='';
    var value='';
    $(document).ready(function(){

      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });

        $('.toggle__input,.admin').change(function(){

          per_id = $(this).attr('id');

          var input=document.getElementById(per_id);
          role_id = '1';
          if(per_id != "" && role_id != ""){

            $.ajax({
                type: "get",
                url: "/update_role_permission/"+ role_id + '/' + per_id + '/' + $(this).attr('checked'),
                data: "",
                cache: false,
                success: function(data){
                  location.reload(true);
                  $(this).attr('checked', false);
                },
              error: function (jqXHR, status, err) {
              }
                
            });

          }

        });
        $('.toggle__input,.artist').change(function(){

            per_id = $(this).attr('id');

            var input=document.getElementById(per_id);
            role_id = '2';
            if(per_id != "" && role_id != ""){
              $.ajax({
                  type: "get",
                  url: "/update_role_permission/"+ role_id + '/' + per_id + '/' + $(this).attr('checked'),
                  data: "",
                  cache: false,
                  success: function(data){
                    location.reload(true);
                    $(this).attr('checked', false);
                  },
                error: function (jqXHR, status, err) {
                }
                  
              });

            }

            });

            $('.toggle__input,.prof').change(function(){

                per_id = $(this).attr('id');

                var input=document.getElementById(per_id);
                role_id = '3';

                if(per_id != "" && role_id != ""){

                  $.ajax({
                      type: "get",
                      url: "/update_role_permission/"+ role_id + '/' + per_id + '/' + $(this).attr('checked'),
                      data: "",
                      cache: false,
                      success: function(data){
                        location.reload(true);
                        $(this).attr('checked', false);
                      },
                    error: function (jqXHR, status, err) {
                    }
                      
                  });
                }
                });
    });

  </script>