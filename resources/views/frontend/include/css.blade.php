<link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/assets/img/favicon.png')}}">

<link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/assets/css/material.css')}}">

<link rel="stylesheet" href="{{asset('backend/assets/css/line-awesome.min.css')}}">

<link rel="stylesheet" href="{{asset('backend/assets/plugins/morris/morris.css')}}">

<link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">





{{-- scanner --}}
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
  var video = document.getElementById("MyCameraOpen");
    var text = document.getElementById("employee_id");

    var scanner = new Instascan.Scanner({
        video : video
    });

  Instascan.Camera.getCameras()
  .then(function (Our_Camera) {
    if (Our_Camera.length > 0) {
      scanner.start(Our_Camera[0]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  })


  scanner.addListener('scan', function (input_value) {
    text.value=input_value;
    document.forms[0].submit();
   })
    // console.log(content);

</script>