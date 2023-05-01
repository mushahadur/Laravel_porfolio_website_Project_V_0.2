// For get services Data
function getProjectData(){

    axios.get('/getProjectsData')
        .then(function (response) {

            if(response.status==200){
                $('#mainDivProject').removeClass('d-none');
                $('#loaderDivProject').addClass('d-none');

                $('#projectDataTable').DataTable().destroy();
                $('#projects_table').empty();
                var dataJSON = response.data;

                $.each(dataJSON, function (i, item) {
                    $('<tr>').html(
                        "<td><img class='adminProjectImg'  src="+dataJSON[i].project_img+"></td>"+
                        "<td>" + dataJSON[i].project_name + "</td>"+
                        "<td>" + dataJSON[i].project_des + "</td>"+
                        "<td><a  class='ProjectsEditBtn' data-id="+dataJSON[i].id +"  ><i class='fas fa-edit'></i></a></td>"+
                        "<td><a  class='ProjectsDeleteBtn' data-id="+dataJSON[i].id +" ><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#projects_table');
                });

                // For  services Table Delete Icon Click
                $('.ProjectsDeleteBtn').click(function (){
                    var id = $(this).data('id');
                    $('#ProjectDeleteId').html(id);
                    //$('#serviceDeleteConformationBtn').attr('data-id',id);
                    $('#ProjectsDeleteBtn').modal('show');
                });

                // For  Delete Modal Icon Hide Click
                $('#cluseBtn').click(function (){
                    $('#ProjectsDeleteBtn').modal('hide');
                });


                // For  Update Modal Icon Hide Click
                $('#editModalBtnChancel').click(function (){
                    $('#editProjectModal').modal('hide');
                });

                //   For Update Icon Click
                $('.ProjectsEditBtn').click(function (){
                    var id = $(this).data('id');
                    $('#ProjectEditId').html(id);
                    projectUpdateById(id);
                    $('#editProjectModal').modal('show');
                });


                $('#projectDataTable').DataTable({"order":false});
                $('.dataTables_length').addClass('bs-select');
            }
            else{
                $('#loaderDivProject').removeClass('d-none');
                $('#wrongDivProject').addClass('d-none');
            }
        }).catch(function (error) {
        $('#loaderDivProject').removeClass('d-none');
        $('#wrongDivProject').addClass('d-none');
    })
}



// For   Project Add Conformation   Modal Click
$('#ProjectAddConfirmBtn').click(function (){
    var ProjectName = $('#ProjectNameAddId').val();
    var ProjectDes = $('#ProjectDesAddId').val();
    var ProjectImg = $('#ProjectImgAddId').val();
    var ProjectLink = $('#ProjectLinkAddId').val();

    ProjectsAdd(ProjectName, ProjectDes, ProjectImg, ProjectLink);
});


// Add a New Projects Method
function ProjectsAdd(ProjectName, ProjectDes, ProjectImg, ProjectLink){
    if(ProjectName.length==0){
        $('#ProjectNameRequire').removeClass('d-none');
    }
    else if(ProjectDes.length==0){
        $('#ProjectDescriptionRequire').removeClass('d-none');
    }
    else if(ProjectImg.length==0){
        $('#ProjectImageRequire').removeClass('d-none');
    }
    else if(ProjectLink.length==0){
        $('#ProjectLinkRequire').removeClass('d-none');
    }

    else{
        $('#ProjectAddConfirmBtn').html("<div class=' spinner-border spinner-border-sm' role='status'></div>");   // Animation set.......

        axios.post('/ProjectsAdd', {
            Project_name:ProjectName,
            Project_des:ProjectDes,
            Project_img:ProjectImg,
            Project_link:ProjectLink

        }).then(function (response) {
            $('#ProjectAddConfirmBtn').html("Add a New Project");
            if(response.status==200){
                if(response.data==1){
                    $('#projectsAddModal').modal('hide');
                    getProjectData();
                }
                else{
                    $('#projectsAddModal').modal('hide');
                }
            }
            else{
                $('#projectsAddModal').modal('hide');
            }
        }).catch(function (error) {
            $('#loaderDivProject').removeClass('d-none');
            $('#wrongDivProject').addClass('d-none');
        })
    }

}


// For  Courses Modal Delete Icon Yes Click
$('#ProjectDeleteConformationBtn').click(function (){
    var id = $('#ProjectDeleteId').html();
    projectDelete(id);
});

// Project Individual Delete By ID
function projectDelete(deleteId){

    $('#ProjectDeleteConformationBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");   // Animation set.........

    axios.post('/ProjectsDelete', {id:deleteId})
        .then(function (response) {
            $('#ProjectDeleteConformationBtn').html("Yes");
            if(response.data==1){
                $('#ProjectsDeleteBtn').modal('hide');
                getProjectData();

            }
            else {
                $('#ProjectsDeleteBtn').modal('hide');
                //toastr.error('Delete Failed !!');
            }
        }).catch(function (error) {
        $('#ProjectsDeleteBtn').modal('hide');
    })
}



// Project Update  By ID
function projectUpdateById(detailsId){
    axios.post('/getProjectsDetails', {id:detailsId})
        .then(function (response) {
            if(response.status==200){
                $('#editProjectModal').removeClass('d-none');
                $('#ProjectEditLoader').addClass('d-none');

                var dataJSON = response.data;
                $('#ProjectNameId').val(dataJSON[0].Project_name);
                $('#ProjectDesId').val(dataJSON[0].Project_des);
                $('#ProjectImgId').val(dataJSON[0].Project_img);
                $('#ProjectLinkId').val(dataJSON[0].Project_link);

            }
            else{
                $('#ProjectEditLoader').removeClass('d-none');
                $('#ProjectEditWrong').addClass('d-none');
            }
        }).catch(function (error) {
        $('#ProjectEditLoader').removeClass('d-none');
        $('#ProjectEditWrong').addClass('d-none');
    })
}





