	
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="https://js.pusher.com/4.4/pusher.min.js"></script>

  	<script type="text/javascript">
     // Start jQuery function after page is loaded
        $(document).ready(function(){

        	// CALL FUNCTION SHOW PRODUCT
            show_usulan();
         
         	// Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
 
            var pusher = new Pusher('10beb89b98a65159eba2', {
                cluster: 'ap1',
                forceTLS: true
            });
 
            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                if(data.message === 'success'){
                    show_usulan();
                }
            });

            // FUNCTION SHOW PRODUCT
            function show_usulan(){
                $.ajax({
                    url   : '<?php echo site_url("home/get_terlaksana");?>',
                    type  : 'GET',
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var count = 1;
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                                    '<td>'+ count++ +'</td>'+
                                    '<td>'+ data[i].tanggal +'</td>'+
                                    '<td>'+ data[i].pukul +'</td>'+
                                    '<td>'+ data[i].nama_kegiatan +'</td>'+
                                    '<td>'+ data[i].nama_instansi +'</td>'+
                                    '<td>'+ data[i].tempat +'</td>'+
                                    '<td>'+ data[i].usulan_pimpinan +'</td>'+
                                    '<td>'+ data[i].status +'</td>'+
                                    '</tr>';
                        }
                        $('.usulan').html(html);
                    }
 
                });
            } 

     	});  

    </script>	
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/particles.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/countdowntime/flipclock.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/countdowntime/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/countdowntime/countdowntime.js"></script>

  <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>

	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});

		
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

</body>
</html>