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
})


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