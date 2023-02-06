<script data-cfasync="false"
    src="{{asset('public/backend/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}">
</script>
<script src="{{asset('backend/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/assets/js/chart.js')}}"></script>
<script src="{{asset('backend/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('backend/assets/js/app.js')}}"></script>


<script src="{{asset('https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js')}}"></script>



<script>
    // time 
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


// date 
const d = new Date();
document.getElementById("date").innerHTML = d;
</script>





<script>
    var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
  
     // DataTables initialisation
     var table = $('#example').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });
</script>