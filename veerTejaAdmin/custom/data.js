// Add New Agent
$('#addagentform').on('submit', function(e){
e.preventDefault();
let data = new FormData(this);
    data.append(event.submitter.name, event.submitter.value);
    $.ajax({
      type: "POST", 
      url: "getData/form_submit.php",              
      data: data, 
      contentType: false,       
      cache: false,             
      processData:false,
      success: function(result){
        if(result==0){
          alert("Failed !!!")
        }else if(result==1){
          $('#modal-default').modal('hide'); 
          $('#modal-alert').modal('show'); 
          //call table data
          agent_table_data()
        }
      }
    });
});


//function to load agent table
function agent_table_data(){
  $('#agent_table_body').html('')
  $.ajax({
    type: "GET", 
    url: "getData/getAgentList.php",              
    contentType: false,       
    cache: false,             
    processData:false,
    success: function(result){
      $('#agent_table').append(result)
     //return result;
    }
  });
}

// Add New Member
$('#addmember').on('submit', function(e){
  e.preventDefault();
  $("#addmembebtn").attr("disabled", true);
  $("#addmembebtn").html("Saving...");

  let data = new FormData(this);
      data.append(event.submitter.name, event.submitter.value);
      $.ajax({
        type: "POST", 
        url: "getData/form_submit.php",              
        data: data, 
        contentType: false,       
        cache: false,             
        processData:false,
        success: function(result){
          if(result==0){
            alert("Failed !!!")
            window.location.href = "AddMember";
          }else if(result==1){
            alert("Success")
            window.location.href = "AddMember";
          }
        }
      });
  });


// Approve req
$('#approvereq').on('submit', function(e){
  
  e.preventDefault();
  $("#acbtn").attr("disabled", true);
  $("#acbtn").html("Loading...");

  let data = new FormData(this);
      data.append(event.submitter.name, event.submitter.value);
      $.ajax({
        type: "POST", 
        url: "getData/form_submit.php",              
        data: data, 
        contentType: false,       
        cache: false,             
        processData:false,
        success: function(result){
          if(result==0){
            alert("Failed !!!")
            window.location.href = `tokenrequestreview?orderid=${$('#orderid').text()}`;
          }else if(result==1){
            alert("Success")
            window.location.href = `tokenrequestreview?orderid=${$('#orderid').text()}`;
          }
          $("#acbtn").attr("disabled", false);
          $("#acbtn").html("Approve");
        }
      });
  });


  // Scroll Text Update
$('#scrolltextform').on('submit', function(e){
  e.preventDefault();
  $("#uscrolltextbtn").attr("disabled", true);
  $("#uscrolltextbtn").html("Updating...");

  let data = new FormData(this);
      data.append(event.submitter.name, event.submitter.value);
      $.ajax({
        type: "POST", 
        url: "getData/form_submit.php",              
        data: data, 
        contentType: false,       
        cache: false,             
        processData:false,
        success: function(result){
          if(result==0){
            alert("Failed !!!")
            //window.location.href = "AddMember";
          }else if(result==1){
            alert("Success")
            //window.location.href = "AddMember";
          }
          $("#uscrolltextbtn").attr("disabled", false);
          $("#uscrolltextbtn").html("Update");
        }
      });
  });



    // close date form 
$('#closedateform').on('submit', function(e){
  e.preventDefault();
  $("#closedatebtn").attr("disabled", true);
  $("#closedatebtn").html("Updating...");

  let data = new FormData(this);
      data.append(event.submitter.name, event.submitter.value);
      $.ajax({
        type: "POST", 
        url: "getData/form_submit.php",              
        data: data, 
        contentType: false,       
        cache: false,             
        processData:false,
        success: function(result){
          if(result==0){
            alert("Failed !!!")
            //window.location.href = "AddMember";
          }else if(result==1){
            alert("Success")
            window.location.href = "Settings";
          }
          $("#closedatebtn").attr("disabled", false);
          $("#closedatebtn").html("Update");
        }
      });
  });


  //check for offtoken verify
  $('#offtokeninput').keyup(function(){
    if($(this).val().trim().length==0){
      return;
    }
    $("#terror").html("");
    $("#addmembebtn").attr("disabled", false);
      var id=$(this).val();

        $.ajax({
          type: "get", 
          url: "getData/verifyofflinetoken.php",              
          data: {"id":id}, 
          dataType: 'json',
          contentType: 'application/json',
          success: function(result){
            if(result==0){
              $("#terror").html("");
            }else if(result==1){
              $("#terror").html("Token No. Already Exist.");
              $("#addmembebtn").attr("disabled", true);
            }
          }
        });
    });

    //get data of user by mobile no.
  $('#mem_mobile').keyup(function(){
    if($("#mem_mobile").val().trim().length==10){
      //enable inputs
      $("#member_name").attr("readonly", true);
      $("#father_name").attr("readonly", true);

    //Empty Value from input 
      $("#member_name").val('');
      $("#father_name").val('');
      $('#district').val('');
      $('#selectagent').val('');
      $('#idtype').val('');
      $('#idnumber').val('');
      $('#member_id').val(0);
         //alert("hgjkl")
        var mobileid=$(this).val();
        $.ajax({
          type: "get", 
          url: "getData/checkmembermobile.php",              
          data: {"mobileid":mobileid}, 
          dataType: 'json',
          contentType: 'application/json',
          success: function(result){
            if(result==0){
              $("#member_name").attr("readonly", false);
              $("#father_name").attr("readonly", false);
            }else{
             $("#member_name").val(result[0].member_name);
             $("#father_name").val(result[0].father_name);
             $('#district').val(result[0].district);
             $('#selectagent').val(result[0].agent);
             $('#idtype').val(result[0].id_type);
             $('#idnumber').val(result[0].id_number);
             $('#member_id').val(result[0].id);
             //console.log(result[0].id)
            }
            
          }
        });
       }else{
        return;
       }
        
    });