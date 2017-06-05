
var manageCustomerTable;

$(document).ready(function() {
	// top nav bar
	$('#navCustomer').addClass('active');
	// manage product data table



	manageCustomerTable = $('#manageCustomerTable').DataTable({
		'ajax': 'php_action/fetchCustomer.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addCustomerModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitCustomerForm")[0].reset();

		// remove text-error
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');


		// submit product form
		$("#submitCustomerForm").unbind('submit').bind('submit', function() {

			// form validation
			var clientName = $("#clientName").val();
			var phoneNumber = $("#phone-number").val();
			var secondaryNumber = $("#secondary-number").val();
			var address = $("#address").val();
			var landmark = $("#landmark").val();
			var familyType = $("#family-type").val();
			var familyCount = $("#family-count").val(),
				clientID, currentDate, phoneNumberLastFive;
			currentDate = new Date();
			currentDate = currentDate.toString();
			currentDate = currentDate.split(" ");
			phoneNumberLastFive = phoneNumber.substr(phoneNumber.length - 3);


			clientID = "cust"+currentDate[2]+currentDate[1]+currentDate[3]+phoneNumberLastFive;

			$('<input />').attr('type', 'hidden').attr('name', "clientID").attr('value', clientID).appendTo('#submitCustomerForm');

			//var googleMap = $("#google-map").val();

			if(clientName == "") {
				$("#clientName").closest('.center-block').after('<p class="text-danger">Client name field is required</p>');
				$('#clientName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#clientName").find('.text-danger').remove();
				// success out for form
				$("#clientName").closest('.form-group').addClass('has-success');
			}	// /else

			if(phoneNumber == "") {
				$("#phone-nmber").after('<p class="text-danger">Phone number field is required</p>');
				$('#phone-nmber').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#phone-nmber").find('.text-danger').remove();
				// success out for form
				$("#phone-nmber").closest('.form-group').addClass('has-success');
			}	// /else

			if(address == "") {
				$("#address").after('<p class="text-danger">Address field is required</p>');
				$('#address').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#address").find('.text-danger').remove();
				// success out for form
				$("#address").closest('.form-group').addClass('has-success');
			}	// /else

			if(landmark == "") {
				$("#landmark").after('<p class="text-danger">landmark field is required</p>');
				$('#landmark').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#landmark").find('.text-danger').remove();
				// success out for form
				$("#landmark").closest('.form-group').addClass('has-success');
			}	// /else

			if(familyType == "") {
				$("#family-type").after('<p class="text-danger">Family type Name field is required</p>');
				$('#family-type').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#family-type").find('.text-danger').remove();
				// success out for form
				$("#family-type").closest('.form-group').addClass('has-success');
			}	// /else

			if(familyCount == "") {
				$("#family-count").after('<p class="text-danger">Family count field is required</p>');
				$('#family-count').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#family-count").find('.text-danger').remove();
				// success out for form
				$("#family-count").closest('.form-group').addClass('has-success');
			}	// /else

			if(clientName && phoneNumber && address && landmark && familyType && familyCount) {
				// submit loading button
				$("#createCustomerBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {

						if(response.success == true) {
							// submit loading button
							$("#createCustomerBtn").button('reset');

							$("#submitCustomerForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

							// shows a successful message after operation
							$('#add-customer-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          // reload the manage student table
							manageCustomerTable.ajax.reload(null, true);

							// remove text-error
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success

					} // /success function
				}); // /ajax function
			}	 // /if validation is ok

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked


	// remove product

}); // document.ready fucntion

function editCustomer(customerId) {

	if(customerId) {
		$("#customerId").remove();
		// remove text-error
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedCustomer.php',
			type: 'post',
			data: {customerId: customerId},
			dataType: 'json',
			success:function(response) {
			// alert(response.product_image);
				// modal spinner


				// $("#editProductImage").fileinput({
		  //     overwriteInitial: true,
			 //    maxFileSize: 2500,
			 //    showClose: false,
			 //    showCaption: false,
			 //    browseLabel: '',
			 //    removeLabel: '',
			 //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			 //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			 //    removeTitle: 'Cancel or reset changes',
			 //    elErrorContainer: '#kv-avatar-errors-1',
			 //    msgErrorClass: 'alert alert-block alert-danger',
			 //    defaultPreviewContent: '<img src="stock/'+response.product_image+'" alt="Profile Image" style="width:100%;">',
			 //    layoutTemplates: {main2: '{preview} {remove} {browse}'},
		  // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
				// });

				// product id
				$(".editcustomerFooter").append('<input type="hidden" name="client_id" id="client_id" value="'+response.client_id+'" />');



				// product name
				$("#editClientName").val(response.client_name);
				$("#editPhone-number").val(response.phone_number);
				$("#editSecondary-number").val(response.secondary_number);
				$("#editAddress").val(response.address);
				$("#editLandmark").val(response.Landmark);
				// quantity
				$("#editFamily-type").val(response.family_type);
				// rate
				$("#editFamily-count").val(response.family_count);



				// update the product data function
				$("#editCustomerForm").unbind('submit').bind('submit', function() {

					// form validation
					var clientName = $("#editClientName").val(),
						phoneNumber = $("#editPhone-number").val(),
						secondaryNumber = $("#editSecondary-number").val(),
						address = $("#editAddress").val(),
						landmark = $("#editLandmark").val(),
						familyType = $("#editFamily-type").val(),
						familyCount = $("#editFamily-count").val();



					if(clientName == "") {
						$("#editClientName").after('<p class="text-danger">Product Name field is required</p>');
						$('#editClientName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editClientName").find('.text-danger').remove();
						// success out for form
						$("#editClientName").closest('.form-group').addClass('has-success');
					}	// /else

					if(phoneNumber == "") {
						$("#editPhone-number").after('<p class="text-danger">Quantity field is required</p>');
						$('#editPhone-number').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editPhone-number").find('.text-danger').remove();
						// success out for form
						$("#editPhone-number").closest('.form-group').addClass('has-success');
					}	// /else

					if(secondaryNumber == "") {
						$("#editSecondary-number").after('<p class="text-danger">Rate field is required</p>');
						$('#editSecondary-number').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editSecondary-number").find('.text-danger').remove();
						// success out for form
						$("#editSecondary-number").closest('.form-group').addClass('has-success');
					}	// /else

					if(address == "") {
						$("#editAddress").after('<p class="text-danger">Brand Name field is required</p>');
						$('#editAddress').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editAddress").find('.text-danger').remove();
						// success out for form
						$("#editAddress").closest('.form-group').addClass('has-success');
					}	// /else



					if(familyType == "") {
						$("#editFamily-type").after('<p class="text-danger">Product cost Name field is required</p>');
						$('#editFamily-type').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editFamily-type").find('.text-danger').remove();
						// success out for form
						$("#editFamily-type").closest('.form-group').addClass('has-success');
					}	// /else

					if(familyCount == "") {
						$("#editFamily-count").after('<p class="text-danger">Transport cost field is required</p>');
						$('#editFamily-count').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editFamily-count").find('.text-danger').remove();
						// success out for form
						$("#editFamily-count").closest('.form-group').addClass('has-success');
					}	// /else


					if(clientName && phoneNumber && secondaryNumber && address && familyType) {
						// submit loading button
						$("#editCustomerBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editCustomerBtn").button('reset');

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

									// shows a successful message after operation
									$('#edit-customer-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageCustomerTable.ajax.reload(null, true);

									// remove text-error
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success

							} // /success function
						}); // /ajax function
					}	 // /if validation is ok

					return false;
				}); // update the product data function



			} // /success function
		}); // /ajax to fetch product image


	} else {
		alert('error please refresh the page');
	}
} // /edit product function


// remove product
function removeCustomer(customerId) {
	//alert('customerId'+customerId)
	if(customerId) {

		// remove product button clicked
		$("button#removeCustomerBtn").unbind('click').bind('click', function() {

			// loading remove button
			$("button#removeCustomerBtn").button('loading');
			$.ajax({
				url: 'php_action/removeCustomer.php',
				type: 'post',
				data: {customerId: customerId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("button#removeCustomerBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeCustomerModal").modal('hide');

						// update the product table
						manageCustomerTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeCustomerMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if productid
} // /remove product function

function clearForm(oForm) {
	// var frm_elements = oForm.elements;
	// console.log(frm_elements);
	// 	for(i=0;i<frm_elements.length;i++) {
	// 		field_type = frm_elements[i].type.toLowerCase();
	// 		switch (field_type) {
	// 	    case "text":
	// 	    case "password":
	// 	    case "textarea":
	// 	    case "hidden":
	// 	    case "select-one":
	// 	      frm_elements[i].value = "";
	// 	      break;
	// 	    case "radio":
	// 	    case "checkbox":
	// 	      if (frm_elements[i].checked)
	// 	      {
	// 	          frm_elements[i].checked = false;
	// 	      }
	// 	      break;
	// 	    case "file":
	// 	    	if(frm_elements[i].options) {
	// 	    		frm_elements[i].options= false;
	// 	    	}
	// 	    default:
	// 	        break;
	//     } // /switch
	// 	} // for
}

$("#margin, #quantity, #product-cost, #transport, #bottel,#margin").on("keyup", function(){
	var quantity = parseInt($("#quantity").val()),
		productCost = parseInt($("#product-cost").val()),
		transportCost = parseInt($("#transport").val()),
		bottelCost = parseInt($("#bottel").val()),
		marginCost = parseInt($("#margin").val()),
		rate = (productCost/quantity)+transportCost+bottelCost+marginCost;
	rate =Math.round(rate);
	$("#rate").val(rate);
});
