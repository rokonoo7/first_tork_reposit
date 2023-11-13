<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <title>Document</title>
</head>
<body>
<div class="w3-center">
<h3>All Perfectly done!</h3>
</div>


@if(session()->has('status'))
<div class="w3-red">
   {{session('status')}}   
</div>
@endif

  <div class="w3-panel">
    <div class="w3-bar">
          <div class="w3-bar-item w3-right w3-button w3-blue" onclick="document.getElementById('id01').style.display='block'">Insert</div>
     </div>
     <div class="w3-red" id="msg"></div>     
<div id="records"></div>
</div>




<!--  CReate Modal -->
<div id="id01" class="w3-modal" style="padding-top:10px">
<div class="w3-modal-content w3-animate-top w3-card-4" style="width:450px;">
<header class="w3-container w3-teal"> 
  <span onclick="model_close()" class="w3-button w3-display-topright my-red w3-large"><b>&times;</b></span>
</header>
 

<div class="w3-panel">
     <div class="w3-border w3-border-blue w3-round" style="max-width:400px;width:100%;margin-left:auto;margin-right:auto">
                        <div class="w3-container w3-blue">
                              <h3> Create</h3>
                        </div>
                        <div class="w3-container">

                          
                            @csrf        
                        
                            <h6>Name</h6>
                            <input required type="text" id="name" name="name" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                            
                            
                            

                            <h6>Email</h6>
                            <input required type="email" id="email" name="email" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                            
                              
                            <h6>Phone</h6>
                            <input required type="text" id="phone" name="phone" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                            
                            
                              
                            <h6>Description</h6>
                            <textarea required type="text" id="description" name="description" class="w3-block w3-border w3-border-gray w3-round w3-large"></textarea><br>  
                            
                              
                  
                            <h6>Image</h6>
                            <input required type="file" id="image" name="image" class="w3-block w3-border w3-border-gray w3-round"><br>  
                            
                            

                            <div class="w3-center w3-margin-top">
                            <button onclick="create()" class="w3-button w3-red w3-round">Create</button>
                            </div>
                            <br>
                           
                             
                          
                        </div> 

          
          
                </div>   

     </div><br>


</div>
</div>




<!--  Update Modal -->
<div id="id02" class="w3-modal" style="padding-top:10px">
<div class="w3-modal-content w3-animate-top w3-card-4" style="width:450px;">
<header class="w3-container w3-teal"> 
  <span onclick="model_close02()" class="w3-button w3-display-topright my-red w3-large"><b>&times;</b></span>
</header>
 

<div class="w3-panel">
     <div class="w3-border w3-border-blue w3-round" style="max-width:400px;width:100%;margin-left:auto;margin-right:auto">
                        <div class="w3-container w3-blue">
                              <h3> Update</h3>
                        </div>
                        <div class="w3-container">
                              
                                  
                             
                            <h6>Name</h6>
                            <input required type="text" id="up_name" name="name" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                            
                            
                            

                            <h6>Email</h6>
                            <input required type="email" id="up_email" name="email" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                            
                              
                            <h6>Phone</h6>
                            <input required type="text" id="up_phone" name="cell" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                            
                              
                                
                            <h6>Description</h6>
                            <input required type="text" id="up_description" name="cell" class="w3-block w3-border w3-border-gray w3-round w3-large"><br>  
                            
                              
                            <h6>Image</h6>
                            <input required type="file" id="up_image" name="image" class="w3-block w3-border w3-border-gray w3-round"><br>  
                            <img src="" style="max-width:70px;" id="image_show">
                            
                               
                            

                            <div class="w3-center w3-margin-top">
                            <button onclick="update_save()" class="w3-button w3-red w3-round">Update</button>
                            </div>
                            <input type="hidden" id="hidden_id">
                            <br>
                           
                            
                            
          
                        </div> 

          
          
                </div>   

     </div><br>


</div>
</div>











<script>
 



//reading data
function readRecords()  
{
      var read="raed";
      $.ajax({
            url:"{{route('ajax_crud.read')}}",  //Edit
            type:'GET',
            data:{ read:read },
            success:function(data,status)
            {
               // console.log(data);
              $('#records').html(data);
                model_close();
            }
      });
}


readRecords(); 

//Closing MOdel
function model_close()
{
      document.getElementById('id01').style.display='none';
}
//Closing MOdel
function model_close02()
{
      document.getElementById('id02').style.display='none';
}

//Inserting



function create()
{
     
      var name=$('#name').val();
      var email=$('#email').val();
      var phone=$('#phone').val();
      var description=$('#description').val();
      var image=$('#image')[0].files[0];
      var _token=$("input[name=_token]").val();
      var fd=new FormData();
      fd.append('name',name);
      fd.append('email',email);
      fd.append('phone',phone);
      fd.append('description',description);
      fd.append('image',image);
      fd.append('_token',_token);
      

      
      $.ajax({
       url:"{{route('ajax_crud.create')}}", 
       type:'POST',
       dataType:'script',
       data:fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {             
             readRecords();
             $('#msg').html(data);
             $('#name').val('');
             $('#email').val('');
             $('#phone').val('');
             $('#description').val('');
             
              // if(data == 1) { $('#img_msg').html("Image Uploaded Successfully"); }
       }
      });
       
} 


//Reading for update
function update_read(id) 
{
      $('#hidden_id').val(id); //Giving to input
      var id=id;
      var _token=$("input[name=_token]").val();

      var fd=new FormData();      
      fd.append('id',id);
      fd.append('_token',_token);


      $.ajax({
       url:"{{route('ajax_crud.edit')}}", 
       type:'POST',
       dataType:'script',
       data:fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {             
        var user=JSON.parse(data);   //Edit
                $('#up_name').val(user.name);
                $('#up_email').val(user.email);
                $('#up_phone').val(user.phone);
                $('#up_description').val(user.description);
                
                var image_url='{{asset('image')}}'+'/'+user.image;
                console.log(image_url);
                $('#image_show').attr('src',image_url);
       }
      });
      document.getElementById('id02').style.display='block';

                
        
}


//Updating
function update_save()
{
      var id=$('#hidden_id').val();
      var up_name=$('#up_name').val();
      var up_email=$('#up_email').val();
      var up_phone=$('#up_phone').val();
      var up_description=$('#up_description').val();
      var _token=$("input[name=_token]").val();
      var up_image=$('#up_image')[0].files[0];
      var up_fd=new FormData();
      up_fd.append('id',id);
      //up_fd.append('up_image',up_files);
      up_fd.append('name',up_name);
      up_fd.append('email',up_email);
      up_fd.append('phone',up_phone);
      up_fd.append('description',up_description);
      up_fd.append('image',up_image);
      up_fd.append('_token',_token);
      $.ajax({
       url:"{{route('ajax_crud.update')}}",
       type:'POST',
       dataType:'script',
       data:up_fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {
             readRecords();
             model_close02();
             $('#msg').html(data);
       }
      });
}




//Deleting
function deleteId(id)
{
      var conf=confirm("Are You Sure??");
      if(conf==true)
      {
        var id=id;
      var _token=$("input[name=_token]").val();

      var fd=new FormData();      
      fd.append('id',id);
      fd.append('_token',_token);


      $.ajax({
       url:"{{route('ajax_crud.delete')}}", 
       type:'POST',
       dataType:'script',
       data:fd,
       contentType:false,
       processData:false,
       success:function(data,status)
       {             
             $('#msg').html(data);
             readRecords();
       }
           });
      }
      
}
</script>      


</body>
</html>