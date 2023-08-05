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
            //window.location.href = "AddMember";
          }else if(result==1){
            alert("Success")
            //window.location.href = "AddMember";
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