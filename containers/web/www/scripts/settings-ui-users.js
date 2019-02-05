$(function(){
    $('#user-create-submit').click(function(e){
        e.preventDefault();
        $('#formResults').text($('#useraddForm').serialize());

$.post('${window.location.origin}/lib/be_users.php',
   $('#useraddForm').serialize()