
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/create_post.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

  </head>
  <body style="background-image:url('../red-green-background.jpg')">
    <section class="ftco-section">
		<div class="container" style="padding-top:100px;text-align:center;">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            <form id="regForm" action="{{ route('create_post', ['type' => 'image'])}}" method="post" enctype="multipart/form-data">
                @csrf
                <h1 id="register">CREATE AN IMAGE POST</h1>
                <div class="all-steps" id="all-steps">  <span class="step"><i class="fa fa-header"></i></span> <span class="step"><i class="fa fa-align-justify"></i></span> <span class="step"><i class="fa fa-picture-o"></i></span>
                     {{-- <span class="step"><i class="fa fa-tag"></i></span>   --}}
                    </div>
                <div class="tab">
                    <h6>Enter the title</h6>
                    <p> <input placeholder="Title..." oninput="this.className = ''" name="title"></p>
                </div>
                <div class="tab">
                    <h6>Enter the description</h6>
                    <p><input placeholder="Description..." oninput="this.className = ''" name="description"></p>
                </div>
                <div class="tab">
                    <div style="height:100%;
                    display:inline-block;
                    align-items:center;
                    justify-content:center;">
                        <div style="width:350px;
                        padding:20px;
                        background:#e4e7e4;
                        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
                                    3px 3px 7px rgba(94, 104, 121, 0.377);">
                            <div class="preview">
                                <img id="file-ip-1-preview" style="  width:100%;
                                display:none;
                              
                                margin-bottom:30px;">
                            </div>
                            <h6>Select the image</h6>
                            <p><input type="file" name="fileToUpload" id="fileToUpload" oninput="this.className = ''" accept="image/*" onchange="showPreview(event);"></p>
                        </div>
                    </div>
                </div>

                {{-- <div class="tab">
                    <h6>Enter the tags</h6>
                    <p><input
                        id="tags"
                        type="text"
                        name="tags"
                        oninput="this.className = ''"
                        placeholder="Tags Should be Comma Separated"
                    ></p> --}}
            {{-- </div> --}}

                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-arrow-left"></i></button> <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-arrow-right"></i></button> </div>
                    <input style="margin-top:20px;" type="submit" value="Create" id="submit-post" name="create" class="btn btn-dark">
                </div>
            </form>
        </div>
    </div>
        </div>
    </section>

    <script type="text/javascript">
        function showPreview(event){
        if(event.target.files.length > 0){
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }
      </script>


<script>

    var currentTab = 0;
    document.addEventListener("DOMContentLoaded", function(event) {


    showTab(currentTab);

    });

    function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    } else {
    document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = '<i class="fa fa-arrow-right"></i>';
    } else {
    document.getElementById("nextBtn").innerHTML = '<i class="fa fa-arrow-right"></i>';


    }
    fixStepIndicator(n)
    }

    function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {

    document.getElementById("nextprevious").style.display = "none";
    document.getElementById("all-steps").style.display = "none";
    document.getElementById("register").style.display = "none";
    document.getElementById("text-message").style.display = "block";


    }
    showTab(currentTab);
    }

    function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) { if (y[i].value=="" ) { y[i].className +=" invalid" ; valid=false; } } if (valid) { document.getElementsByClassName("step")[currentTab].className +=" finish" ; } return valid; } function fixStepIndicator(n) { var i, x=document.getElementsByClassName("step"); for (i=0; i < x.length; i++) { x[i].className=x[i].className.replace(" active", "" ); } x[n].className +=" active" ; }


  </script>


  </body>

</html>
