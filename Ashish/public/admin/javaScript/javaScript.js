var unique_delete_id = null;
var admin_status = null;
$(document).ready(function () {
  /*$displayAllUsers = $( '.displayAllUsers' );
   $addUserForm = $( '.addUserForm' );

   $addUserForm.hide();

   $( '.viewUsers' ).click( function( event ) {
   event.preventDefault();
   $displayAllUsers.fadeIn().siblings( '.addUserForm, .responseMessage' ).hide();
   } );

   $( '.addNewUser' ).click( function( event ) {
   event.preventDefault();
   $addUserForm.fadeIn().siblings( '.displayAllUsers, .responseMessage' ).hide();
   } );*/
  // $('.pop-up-container').hide();
  $('.toggle-popup').click(function (event) {
    event.preventDefault();
    $('.pop-up-container').fadeToggle();
  });

  $('.deleteMessage.currentUserDeleteMessage').hide();
  $('.deleteMessage.currentPageDeleteMessage').hide();

  $('.delete-user').click(function () {
    if(unique_delete_id !== null) {
      $.ajax({
        url    : 'delete_user.php?delete=' + unique_delete_id,
        success: function () {

          var deletion_message;
          if(admin_status == 1){
            deletion_message = "You have successfully deleted the user.";
            $('#' + unique_delete_id).fadeOut("slow");
            unique_delete_id = null;
            admin_status = null;
          } else if (admin_status == 0){
            deletion_message = "You are not authorized to delete any user."
          }
          $('.deleteMessage.currentUserDeleteMessage').html(deletion_message + "<br>").fadeIn("slow");

        },
        error  : function () {
          alert("Deleting user failed.")
        }
      });
    }
    return false;
  });

  $('.delete-page').click(function () {
    if(unique_delete_id !== null) {
      $.ajax({
        url    : 'delete_page.php?delete=' + unique_delete_id,
        success: function () {
          var deletion_message;
          if(admin_status == 1){
            deletion_message = "You have successfully deleted the page.";
            $('#' + unique_delete_id).fadeOut("slow");
            unique_delete_id = null;
            admin_status = null;
          } else if (admin_status == 0){
            deletion_message = "You are not authorized to delete any pages."
          }
          $('.deleteMessage.currentPageDeleteMessage').html(deletion_message + "<br>").fadeIn("slow");
        },
        error  : function () {
          alert("Deleting user failed.")
        }
      });
    }
    return false;
  });

  // For admin panel labels or tags
  $('#labels').tokenfield({
   autocomplete           : {
   source: ['red', 'blue', 'green', 'yellow', 'violet', 'brown', 'purple', 'black', 'white'],
   delay : 100
   },
   showAutocompleteOnFocus: true,
   limit                  : 10
   });

   $(".dropDownWithSearch").select2({
   placeholder: "Select Country",
   allowClear : true
   });

   $(".goToZoo").select2({
   placeholder: "Enter tags or labels",
   tags:["red", "green", "blue", 'yellow', 'violet', 'brown', 'purple', 'black', 'white'],
   tokenSeparators: [",", " "]
   });

});

// I have called this function from the html page directly
function delete_unique_user(id,admin) {
  unique_delete_id = id;
  admin_status = admin;
}

function delete_page(id,admin) {
  unique_delete_id = id;
  admin_status = admin;
}