<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
    <!-- jQuery JS CDN -->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
 <!-- jQuery DataTables JS CDN -->
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <!-- Bootstrap JS CDN -->
 <!--script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script-->
    <!--link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" /-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 <!-- DataTables CSS CDN -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
 <!-- Font Awesome CSS CDN -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
 
<div id="container">
<table class="table table-hover" id="dataTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
<?php
$i=1;
foreach($tableRows as $row){ 
$email = trim($row['email']); // "MyEmailAddress@example.com"
$email = strtolower( $email ); // "myemailaddress@example.com"
$email = md5( $email );
?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row['title'] . ' ' . $row['firstName'] . ' ' . $row['lastName']; ?></td>
      <td><img src="https://www.gravatar.com/avatar/<?php echo $email;?>" /></td>
      <td><?php echo isset($row['phoneNumber']) ? $row['phoneNumber'] : ''; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><a href="javascript:;" class="btn btn-info item-detail view_data" id="<?php echo $row['id'] ?>">more</a></td>
    </tr>
    <?php
    $i++;
 } ?>
  </tbody>
</table>
 <!-- view Modal -->
 <div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title" id="myModalLabel">Phone Details</h4>
       </div>
       <div class="modal-body">
        <!-- Place to print the fetched phone -->
         <div id="phone_result"></div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
 </div>
</div>
<!-- Image loader -->
<div id='loader' style='display: none;'>
  <img src='<?php echo base_url('assets/images/reload.png'); ?>' width='32px' height='32px'>
</div>
<!-- Image loader -->

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<!-- jQuery JS CDN -->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
 <!-- jQuery DataTables JS CDN -->
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <!-- Bootstrap JS CDN -->
 <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
 <!-- Bootstrap JS CDN -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
    <script type="text/javascript">
     // Start jQuery function after page is loaded
        $(document).ready(function(){
         // Initiate DataTable function comes with plugin
         $('#dataTable').DataTable();
         // Start jQuery click function to view Bootstrap modal when view info button is clicked
            $('.view_data').click(function(){
             // Get the id of selected phone and assign it in a variable called phoneData
                var id = $(this).attr('id');
                // Start AJAX function
                $.ajax({
                 // Path for controller function which fetches selected phone data
                    url: "<?php echo base_url() ?>index.php/Welcome/getdata",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {id:id},
                   
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                     // Print the fetched data of the selected phone in the section called #phone_result 
                     // within the Bootstrap modal
                        $('#phone_result').html(data);
                        // Display the Bootstrap modal
                        $('#phoneModal').modal('show');
                    }
             });
             // End AJAX function
         });
     });  
    </script>
</body>
</html>