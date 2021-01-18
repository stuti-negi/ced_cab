$(document).ready(function(){
    //  ................................to display data in the table in show.php....................

    function loaddata()  
     {
          $.ajax({
            url:"showuser.php",
            type:"POST",
            success : function(data){
                $("#table_data").html(data);
                $("#datatable").dataTable();

            }
        });
       
        }
loaddata();

//........................delete data from table in delete.php...............................
// $(document).on("click",".delete-btn",function(){
// if(confirm("Are sure you want to delete this record ?"))
// {
//     var studentId = $(this).data("id");
//     var element=this;
//     // alert(studentId);
//     $.ajax({
//         url:"delete.php",
//         type:"POST",
//         data:{
//             ID:studentId
//         },
//         success : function(data){
//             if(data==1){
//                 $(element).closest("tr").fadeOut();
//                 alert("Record deleted successfully ");
//             }
//             else{
//             alert("data not removed ");
//             }
//         }
//  });
// }
// });

// // .............................................update data in data base. in update.php............................
$(document).on("click",".update-btn",function(){
// ....to show modal
$("#edit").modal('show');
var userId = $(this).data("eid");
// alert(userId);
$.ajax({
  url:"updateuser.php",
  type:"POST",
  data:{
    ID: userId
  },
  success: function(data){
    $(".modal-body").html(data);
  }
});
});
// // ..............................save the updated data in the database in updateform.php..........................
$(document).on("click","#savedata",function(){
    var useid= $("#edit_id").val();
    var uname=$("#euname").val();

var status=$("input:radio[name='status']:checked").val();
var num=$("#number").val();

$.ajax({
url: "updateuser_db.php",
type:"POST",
data:{
    uid:useid,   
    uname:uname,
    ustatus:status,
    unumber:num,
   
},
success : function(data){
    if(data==1)
    {
        $("#edit").modal('hide');
        // $("#datatable").dataTable();
  loaddata();
}
else{
    alert(data);
//   alert("data not updated");

}
},
});
});
// // ...........................LIVE SEARCH BOX.....................
// $("#search").on("keyup",function(){
// var search_term=$(this).val();
// $.ajax({
// url:"livesearch.php",
// type : "POST",
// data : {
// search : search_term  },
// success : function(data){
//  $("#table_data").html(data);
// }

// });

// });



});