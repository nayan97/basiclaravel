(function($){
$(document).ready(function(){

    // validate Function
    function validate(msg, type ='danger'){
        return `<p class = "alert alert-${type}">${msg} !<button class="close" data-dismiss="alert">&times;</button></p>`
    }

        // Student data show
    function studentsData(){
        $.ajax({
            url: 'get-students',
            success:function(data){
                $('#student_data').html(data);

            }   
        });
    }
    studentsData();


    // student modal show 
    $('#add_student').click(function(e){
        e.preventDefault();
        $('#student_modal').modal('show');
    });

      //student form submit

    $('#student_form').submit(function(e){
        e.preventDefault(); 
          let name  = $('#student_form input[name="name"]').val();
          let email = $('#student_form input[name="email"]').val();
          let cell  = $('#student_form input[name="cell"]').val();
         // let photo = $('#student_form input[name="photo"]').val();

          if(name = ''|| email == '' || cell == ''){
            $('.msg').html(validate('All fields are required '))
          }else{

            $.ajax({
               url: 'students',
               method: 'POST',
               data: new FormData(this),
               contentType: false,
               processData: false,
               success: function(data){
                if(data == true){
                    $('#student_form')[0].reset();
                    $('#student_modal').modal('hide');
                    swal('New Student added Successfully');
                    studentsData();
                }else{
                    swal('All field Are needed');
                }

               }  
            });
          }


    });

    // data delete

    $(document).on('click', '#del_id', function(e){
        e.preventDefault();

        let id = $(this).attr('del_id');

        $.ajax({
            url : 'del-student/' + id,
            success: function (data){
                studentsData();
                swal('Data deleted successfully');
            }
        });

    });


    // profile show 
    $(document).on('click', '.show-student', function(e){
        e.preventDefault();
        let id = $(this).attr('student_id');
        $('#student_show_modal').modal('show');
        
    });



    //Edit data

    $(document).on('click', '#edit_student', function(e){
        e.preventDefault();

        let stu_id = $(this).attr('eid_id');
        $('#student_edit_modal').modal('show');
        
    });


});
})(jQuery);