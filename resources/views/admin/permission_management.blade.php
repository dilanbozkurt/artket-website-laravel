@include('admin.sidebar')

<body class="">
          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="col-md-12">
                      @if (session()->has('message'))
                      <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span><b> {{ session()->get('message') }} </b></span>
                      </div>
                      @endif
                    </div>
                    <h4 class="card-title"> Permissions</h4>

                    <div class="col-md-12">
                      <button onclick="show_permission_form()" id="perButton" class="btn btn-light" style="float:right">New Permission</button>
                      <form method="get" action="{{ route('create_permission')}}" >
                        @csrf
                      <div id="newPermissionForm" style="background: rgb(182, 182, 182);height:250px;display:none;padding:50px;border-radius:20px">
                        <input type="text" class="form-control" placeholder="Enter the permission name..." name="name">
                        <br>
                        <input type="text" class="form-control" placeholder="Enter a label for this permission..." name="label">
  
                        <br>
                        <button type="submit" class="btn btn-success" style="float:right">Create Permission</button>
                      </form>
                      </div>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            ID
                          </th>
                          <th>
                            Permission
                          </th>
                          <th>
                            Date Created
                          </th>
                          <th class="text-right">
                            Action
                          </th>
                        </thead>
                        <tbody>
                          @foreach ($permissions as $permission)
                          <tr>
                            <td>
                              {{ $permission->id }}
                            </td>
                            <td>
                            {{ $permission->name }}
                            </td>
                            <td>
                            {{ $permission->created_at }}
                            </td>
                            <td class="text-right">
                              <a class="btn btn-danger" href="{{ route('delete_permission', ['id' => $permission->id])}}">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
    
        </div>
      </div>

    </body>


    <script>
      function show_permission_form() {
      var form = document.getElementById("newPermissionForm");

      var button = document.getElementById('perButton');

      form.style.display = 'block';
      button.style.display = 'none';


  // if (user_spams_div.style.display === "none") {
  //   user_spams_div.style.display = "block";
  //   post_spams_div.style.display="none";
  // }else {
  //   user_spams_div.style.display = "none";
  //   post_spams_div.style.display="block";
  // }
}
    </script>