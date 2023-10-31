
@extends('Layout.app')

@section('content')

    <div  class="page-wrapper pt-3">

        {{--        Header and Navbar Start--}}

        <header>
            <section class="py-2 shadow" style="background-color: rgba(198,227,215,0.6);">
                <div class="container">
                    <div class="row text-secondary ">
                        <div class="col-md-6">
                            <ul class="nav">
                                <li class=" border-end pe-3 border-white">
                                    {{--                                    <a href=""><img  src="{{asset('/')}}assets/img/logo.png" alt="logo" style="height:50px;"> </a>--}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="nav float-end" >
                                <li class="nav-item py-2">
                                    <button type="button" class="btn btn-success"  data-mdb-toggle="modal" data-mdb-target="#projectsAddModal">
                                        Add a New Project
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        {{--        Header and Navbar End--}}
        <div id="mainDivProject" class="container d-none pt-3">
            <div class="row">
                <div class="col-md-12">
                    <table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Image</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Description</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="projects_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="loaderDivProject"  class="container pt-5">
            <div class="row p-5">
                <div class="col-md-12  text-center p-5">
                    <img class="" src="{{asset('/')}}assets/images/loader.svg" alt="" height="100px" width="100px">
                </div>
            </div>
        </div>


        <div id="wrongDivProject"  class="container d-none">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <h2>Something went Wrong !!</h2>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal For delete -->
    <div class="modal fade" id="ProjectsDeleteBtn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                </div>
                <div class="modal-body">
                    <h4 class="pb-3 text-center">Do You Want to Delete This Data ?</h4>
                    <h4 id="ProjectDeleteId" class="pb-3 text-center d-none"></h4>
                </div>
                <div class="modal-footer">
                    <button id="cluseBtn" type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button data-id="" id="ProjectDeleteConformationBtn" type="button" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal For Update -->
    <div class="modal fade" id="editProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0 text-center">
                    <h4 >Update Form Modal</h4>
                </div>
                <div class="modal-body mx-2">
                    <h4 id="ProjectEditId" class="text-center d-none"></h4>
                    <div id="ProjectEditForm"  class="w-100 d-none">
                        <input type="text" class="form-control" id="ProjectNameId" placeholder="Enter Project Name"><br>
                        <input type="text" class="form-control" id="ProjectDesId" placeholder="Enter Project Description"><br>
                        <input type="text" class="form-control" id="ProjectImgId" placeholder="Enter Project Image Link">
                        <input type="text" class="form-control" id="ProjectLinkId" placeholder="Enter Project Link">
                    </div>
                    <img id="ProjectEditLoader" class="" src="{{asset('/')}}assets/images/loader.svg" alt="" style="height: 250px; width: 250px; padding-left: 150px;">
                    <h4 id="ProjectEditWrong" class="text-center d-none">Something went Wrong !!</h4>
                </div>
                <div class="modal-footer">
                    <button id="editModalBtnChancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chancel</button>
                    <button data-id="" id="ProjectUpdateBtn" type="button" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>



    <!--Add a New Project Modal -->
    <div
        class="modal fade"
        id="projectsAddModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add a New Project</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="ProjectEditForm"  class="w-100">
                        <div class="mb-3">
                            <label  class="form-label"> Project Name</label>
                            <input type="text" class="form-control" id="ProjectNameAddId" placeholder="Enter Project Name">
                            <p id="ProjectNameRequire" class="text-danger d-none">Name is Require</p>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label"> Project Description</label>
                            <input type="text" class="form-control" id="ProjectDesAddId" placeholder="Enter Project Description">
                            <p id="ProjectDescriptionRequire" class="text-danger d-none">Description is Require</p>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Project Image</label>
                            <input type="text" class="form-control" id="ProjectImgAddId" placeholder="Enter Project Image Link">
                            <p id="ProjectImageRequire" class="text-danger d-none">Image is Require</p>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Project Link</label>
                            <input type="text" class="form-control" id="ProjectLinkAddId" placeholder="Enter Project Link Address">
                            <p id="ProjectLinkRequire" class="text-danger d-none">Project Link is Require</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button id="ProjectAddConfirmBtn" type="button" class="btn btn-primary">Add a New Project</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        getProjectData();

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



    </script>

@endsection
