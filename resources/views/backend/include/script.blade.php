<script data-cfasync="false" src="{{asset('backend/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}">
</script>
<script src="{{asset('backend/assets/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('backend/assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('backend/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/assets/js/chart.js')}}"></script>

<script src="{{asset('backend/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{asset('backend/assets/js/app.js')}}"></script>
<script>
    function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();



const d = new Date();
document.getElementById("date").innerHTML = d;
</script>