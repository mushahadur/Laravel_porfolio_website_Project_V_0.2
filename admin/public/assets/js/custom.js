// For get services Data
function getCoursesData(){

    axios.get('/getCoursesData')
        .then(function (response) {

            if(response.status==200){
                $('#mainDivCourse').removeClass('d-none');
                $('#loaderDivCourse').addClass('d-none');

                $('#course_table').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function (i, item) {
                    $('<tr>').html(
                        "<td>" + dataJSON[i].course_name + "</td>"+
                        "<td>" + dataJSON[i].course_fee + "</td>"+
                        "<td>" + dataJSON[i].course_totalclass + "</td>"+
                        "<td>" + dataJSON[i].course_totalenroll + "</td>"+

                        "<td><a  class='coursesDitailBtn' data-id="+dataJSON[i].id +"  ><i class='fas fa-eye'></i></a></td>"+
                        "<td><a  class='coursesEditBtn' data-id="+dataJSON[i].id +"  ><i class='fas fa-edit'></i></a></td>"+
                        "<td><a  class='coursesDeleteBtn' data-id="+dataJSON[i].id +" ><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#course_table');
                });

                // For  services Table Delete Icon Click
                $('.coursesDeleteBtn').click(function (){
                    var id = $(this).data('id');
                    $('#coursesDeleteId').html(id);
                    //$('#serviceDeleteConformationBtn').attr('data-id',id);
                    $('#deleteCourseModal').modal('show');
                });

                // For  Delete Modal Icon Hide Click
                $('#cluseBtn').click(function (){
                    $('#deleteCourseModal').modal('hide');
                });

                // For  Update Modal Icon Hide Click
                $('#courseEditModalDataDismissId').click(function (){
                    $('#updateCourseModal').modal('hide');
                });
                // For  Update Modal Icon Hide Click
                $('#courseEditModalCancelId').click(function (){
                    $('#updateCourseModal').modal('hide');
                });

                //   For Update Icon Click
                $('.coursesEditBtn').click(function (){
                    var id = $(this).data('id');
                    $('#coursesEditId').html(id);
                    coursesUpdateById(id);
                    $('#updateCourseModal').modal('show');
                });

            }
            else{
                $('#loaderDivCourse').removeClass('d-none');
                $('#wrongDivCourse').addClass('d-none');
            }
        }).catch(function (error) {
        $('#loaderDivCourse').removeClass('d-none');
        $('#wrongDivCourse').addClass('d-none');
    })
}


// For  Cancel Course  Modal
$('#courseAddModalCancelId').click(function (){
    $('#addCourseModal').modal('hide');
});
// For  Data Dismiss Course  Modal
$('#courseAddModalDataDismissId').click(function (){
    $('#addCourseModal').modal('hide');
});



// For   Course Add Conformation   Modal Click
$('#CourseAddConfirmBtn').click(function (){
    var CourseName = $('#CourseNameId').val();
    var CourseDes = $('#CourseDesId').val();
    var CourseFee = $('#CourseFeeId').val();
    var CourseEnroll = $('#CourseEnrollId').val();
    var CourseClass = $('#CourseClassId').val();
    var CourseLink = $('#CourseLinkId').val();
    var CourseImg = $('#CourseImgId').val();

    coursesAdd(CourseName, CourseDes, CourseFee, CourseEnroll, CourseClass, CourseLink, CourseImg);
});


// Add a New Courses Method
function coursesAdd(CourseNameId, CourseDesId, CourseFeeId, CourseEnrollId, CourseClassId, CourseLinkId, CourseImgId){
    if(CourseNameId.length==0){
        $('#coursesNameRequire').removeClass('d-none');
    }
    else if(CourseDesId.length==0){
        $('#coursesDesRequire').removeClass('d-none');
    }
    else if(CourseFeeId.length==0){
        $('#CourseFeRequire').removeClass('d-none');
    }
    else if(CourseEnrollId.length==0){
        $('#CourseEnrollRequire').removeClass('d-none');
    }
    else if(CourseClassId.length==0){
        $('#coursesClassRequire').removeClass('d-none');
    }
    else if(CourseLinkId.length==0){
        $('#coursesLinkRequire').removeClass('d-none');
    }
    else if(CourseImgId.length==0){
        $('#coursesImgRequire').removeClass('d-none');
    }
    else{
        $('#CourseAddConfirmBtn').html("<div class=' spinner-border spinner-border-sm' role='status'></div>");   // Animation set.......

        axios.post('/CoursesAdd', {
            course_name:CourseNameId,
            course_des:CourseDesId,
            course_fee:CourseFeeId,
            course_totalenroll:CourseEnrollId,
            course_totalclass:CourseClassId,
            course_link:CourseLinkId,
            course_img:CourseImgId

        }).then(function (response) {
            $('#CourseAddConfirmBtn').html("Add a New Course");
            if(response.status==200){
                if(response.data==1){
                    $('#addCourseModal').modal('hide');
                    getCoursesData();
                }
                else{
                    $('#addCourseModal').modal('hide');
                }
            }
            else{
                $('#addCourseModal').modal('hide');
            }
        }).catch(function (error) {
            $('#serviceEditWrong').removeClass('d-none');
            $('#serviceEditLoader').addClass('d-none');
        })
    }

}



// For  Courses Modal Delete Icon Yes Click
$('#coursesDeleteConformationBtn').click(function (){
    var id = $('#coursesDeleteId').html();
    coursesDelete(id);
});

// Courses Individual Delete By ID
function coursesDelete(deleteId){

    $('#coursesDeleteConformationBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");   // Animation set.........

    axios.post('/CoursesDelete', {id:deleteId})
        .then(function (response) {
            $('#coursesDeleteConformationBtn').html("Yes");
            if(response.data==1){
                $('#deleteCourseModal').modal('hide');
                getCoursesData();

            }
            else {
                $('#deleteCourseModal').modal('hide');
                //toastr.error('Delete Failed !!');
            }
        }).catch(function (error) {
    })
}


// Service Update  By ID
function coursesUpdateById(detailsId){
    axios.post('/getCoursesDetails', {id:detailsId})
        .then(function (response) {
            if(response.status==200){
                $('#coursesEditForm').removeClass('d-none');
                $('#courseEditLoader').addClass('d-none');

                var dataJSON = response.data;
                $('#CourseNameUpdateId').val(dataJSON[0].course_name);
                $('#CourseDesUpdateId').val(dataJSON[0].course_des);
                $('#CourseFeeUpdateId').val(dataJSON[0].course_fee);
                $('#CourseEnrollUpdateId').val(dataJSON[0].course_totalenroll);
                $('#CourseClassUpdateId').val(dataJSON[0].course_totalclass);
                $('#CourseLinkUpdateId').val(dataJSON[0].course_link);
                $('#CourseImgUpdateId').val(dataJSON[0].course_img);
            }
            else{
                $('#courseEditWrong').removeClass('d-none');
                $('#courseEditLoader').addClass('d-none');
            }
        }).catch(function (error) {
        $('#courseEditWrong').removeClass('d-none');
        $('#courseEditLoader').addClass('d-none');
    })
}

// For   Course Update Conformation   Modal Click
$('#CourseUpdateConfirmBtn').click(function (){
    var CourseEditId        = $('#coursesEditId').html();
    var CourseEditName      = $('#CourseNameUpdateId').val();
    var CourseEditDes       = $('#CourseDesUpdateId').val();
    var CourseEditFee       = $('#CourseFeeUpdateId').val();
    var CourseEditEnroll    = $('#CourseEnrollUpdateId').val();
    var CourseEditClass     = $('#CourseClassUpdateId').val();
    var CourseEditLink      = $('#CourseLinkUpdateId').val();
    var CourseEditImg       = $('#CourseImgUpdateId').val();

    courseUpdateById(CourseEditId, CourseEditName, CourseEditDes, CourseEditFee, CourseEditEnroll, CourseEditClass, CourseEditLink, CourseEditImg);
});

// Courses Update  By ID
function courseUpdateById(CourseId,CourseNameId, CourseDesId, CourseFeeId, CourseEnrollId, CourseClassId, CourseLinkId, CourseImgId){

    $('#CourseUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");   // Animation set.......

    axios.post('/CourseUpdate', {
        id:CourseId,
        course_name:CourseNameId,
        course_des:CourseDesId,
        course_fee:CourseFeeId,
        course_totalenroll:CourseEnrollId,
        course_totalclass:CourseClassId,
        course_link:CourseLinkId,
        course_img:CourseImgId

    }).then(function (response) {
        $('#CourseUpdateConfirmBtn').html("Update Save");
        if(response.status==200){
            $('#updateCourseModal').modal('hide');
            getCoursesData();
        }
        else{
            $('#updateCourseModal').modal('hide');
        }
    }).catch(function (error) {
        $('#courseEditLoader').removeClass('d-none');
        $('#courseEditWrong').addClass('d-none');
    })
}


