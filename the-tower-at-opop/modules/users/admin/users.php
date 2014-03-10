<?php

$section = "users";

include_once($_SERVER['DOCUMENT_ROOT']."/admin-modules.inc.php");

$session->get_permissions("ADMIN", "MODULES", "USERS", false, true);

include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/header.inc.php");

?>
<link rel="stylesheet" type="text/css" href="<?php echo MAINURL."template/admin/ui.jqgrid.css"; ?>" />
<script type="text/javascript" src="<?php echo MAINURL."js/jqgrid/jquery.jqGrid.min.js"; ?>"></script>
<script type="text/javascript" src="<?php echo MAINURL."js/jqgrid/i18n/grid.locale-en.js"; ?>"></script>
<script type="text/javascript">

	var status 		= null;
	var string 		= null;
	var resizeTimer;
	
	function resizeGrids() {
    	var reportObjectsGrid = $("#jqTable");
    	reportObjectsGrid.setGridWidth($("#jqGrid").width());
	};

	$(window).bind('resize', function () {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(resizeGrids, 60);
	});

	$(function() {

		$("#jqTable").jqGrid({
			url:'<?php echo MAINURL."users/admin/adminprocess.php"; ?>',
			datatype: "json",
			colNames:['Fullname', 'Status', 'Options'],
			colModel:[				
				{name:'fullname',index:'lastname, firstname'},
				{name:'status',index:'status', align:"center", width:80, fixed: true},
				{name:'options',index:'options', align:"center", width:80, fixed: true, sortable: false}								
			],
			cmTemplate: { title: false },
			postData: {listUsers: true},
			pager: '#pager',
			sortname: 'lastname, firstname',
			viewrecords: true,
			sortorder: "ASC",
			loadonce: false,
			multiselect: true,
			autowidth: true,
			altClass: "",
			height: "100%",
			hidegrid: false,
			altRows: true,
			mtype: "POST",
			gridComplete: function(){ 
				if(jQuery("#jqTable").jqGrid('getGridParam', 'records') == 0) {
					$("#jqGrid").hide();
					$("#noResults").show();
				}
			}
		});

		$("#jqTable").jqGrid("setLabel","fullname","",{"text-align":"left"});

		$('.delete').live('click', function() {
			string = "delete=true&users=true&id=" + $(this).attr('rel') + "";
			$("#deleteModal").dialog('open');
			return false;
		});

		$('input[name=delCheckall]').live('click', function() {	

			var ids 	= jQuery("#jqTable").jqGrid('getGridParam','selarrrow');
				string 	= "delbulk=true&users=true&id=" + ids +"";				

			if(ids.length > 0)
				$("#deleteModal").dialog('open');

		});

		$("#deleteModal").dialog({
			autoOpen: false,
			height: 200,
			width: 350,
			modal: true,
			closeOnEscape: true,
			resizable: false,
			buttons: {
				'Yes, I\'m sure.': function() {
					$.ajax({
						type: "POST",
						url: "<?php echo MAINURL."users/admin/adminprocess.php"; ?>",
						data: string,
						dataType: "json",
						success: function(data){
							$("#deleteModal").dialog('close');
							$("#jqTable").trigger("reloadGrid");
						}
					});
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});

		$('.activate').live('click', function() {
			string = "changeStatus=true&id=" + $(this).attr('rel') + "&status=1";
			$('#statusModal').dialog('open');
			return false;
		});

		$('.deactivate').live('click', function() {
			string = "changeStatus=true&id=" + $(this).attr('rel') + "&status=0";
			$('#statusModal').dialog('open');
			return false;
		});

		$("#statusModal").dialog({
			autoOpen: false,
			height: 200,
			width: 350,
			modal: true,
			closeOnEscape: true,
			resizable: false,
			buttons: {
				'Change Status': function() {

					$.ajax({
						type: "POST",
						url: "<?php echo MAINURL."users/admin/adminprocess.php"; ?>",
						data: string,
						dataType: "json",
						success: function(data) {
							$("#statusModal").dialog('close');
							$("#jqTable").trigger("reloadGrid");
						}
					});			

					return false;

				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});

		$('.addHours').live('click', function() {
			
			var user_id = $(this).attr('rel');
			
			$("form[name=addHours] input[name=user_id]").val(user_id);

			$("#modalAddHours").dialog('open');

			return false;
		});

		$("#modalAddHours").dialog({
			autoOpen: false,
			height: 275,
			width: 350,
			modal: true,
			closeOnEscape: true,
			resizable: false,
			buttons: {
				'Add Hours': function() {

					if($("form[name=addHours]").valid())
						submit_AddHours();

				},
				Cancel: function() {
					$(this).dialog('close');
				}
			}
		});

		$("form[name=addHours]").validate({
			rules: {
				hours: {
					required: true,
					number: true,
					minlength: 1,
					maxlength: 3
				}		
			},
			messages: {
				regpass: { 
					number: 'Please enter a valid hour amount.'
				}
			},
			errorPlacement: function(error, element) {

				if(element.attr("name") == "hours")
					error.insertAfter(".errorHours");

			}
		});

		function submit_AddHours() {

			var form = $('form[name=addHours]').serialize();
			
			//alert(form);
			//return false;
			
			$.ajax({
				type: "POST",
				url: "<?php echo MAINURL."store/admin/adminprocess.php"; ?>",
				data: form,
				dataType: "json",
				success: function(data) {

					if(data.success)
						document.location.href="<?php echo MAINURL."store/admin/assigned-hours.php"; ?>";

					$("#modalAddHours").dialog('close');

					if(data.error)
						alert(data.message);

				}		
			});
			return false;
		}

	});

</script>

<div id="modalAddHours" title="Add Hours" style="display: none;">

    <input type="text" name="empty" style="margin: -5000px 0 0 0;" />

    <form name="addHours">

    	<label>What type of hours?</label>
        <input type="radio" name="type" value="HS" checked="checked" />&nbsp;Home Studies&nbsp;
        <input type="radio" name="type" value="LW" />&nbsp;Live Workshops

    	<label>Amount of Hours</label>
        <input type="text" name="hours" class="input_full" />
        <div class="errorHours"></div>

        <input type="hidden" name="user_id" />
        <input type="hidden" name="addHours" value="1" />
    </form>

</div>

<div id="wrapper">
    <a href="<?php echo MAINURL."users/admin/users-add.php"; ?>" title="Add" id="buttonAdd">Add</a>
    <?php include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/subnav.".$section.".inc.php"); ?>
    <div class="container">
        <div id="content">
            <h1>All Users</h1>
            <div id="noResults" style="display:none;">There were no results found.</div>
            <div id="jqGrid">
                <table id="jqTable"></table>
                <div id="pager"></div>
                <input type="submit" name="delCheckall" value="Delete Selected" id="tableDelete" />
            </div>
        </div>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/template/admin/footer.inc.php"); ?>