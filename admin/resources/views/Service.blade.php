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
                                    <button type="button" class="btn btn-success"  data-mdb-toggle="modal" data-mdb-target="#serviceAddModal">
                                        Add a New Service
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </header>
{{--        Header and Navbar End--}}
        <div id="mainDiv" class="container d-none pt-3">
            <div class="row">
                <div class="col-md-12">
                    <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Image</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">Description</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="service_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="loaderDiv"  class="container pt-5">
            <div class="row p-5">
                <div class="col-md-12  text-center p-5">
                    <img class="" src="{{asset('/')}}assets/images/loader.svg" alt="" height="100px" width="100px">
                </div>
            </div>
        </div>


        <div id="wrongDiv"  class="container d-none">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <h2>Something went Wrong !!</h2>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal For delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                </div>
                <div class="modal-body">
                    <h4 class="pb-3 text-center">Do You Want to Delete This Data ?</h4>
                    <h4 id="serviceDeleteId" class="pb-3 text-center d-none"></h4>
                </div>
                <div class="modal-footer">
                    <button id="cluseBtn" type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button data-id="" id="serviceDeleteConformationBtn" type="button" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal For Update -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0 text-center">
                    <h4 >Update Form Modal</h4>
                </div>
                <div class="modal-body mx-2">
                    <h4 id="serviceEditId" class="text-center d-none"></h4>
                    <div id="serviceEditForm"  class="w-100 d-none">
                        <input type="text" class="form-control" id="serviceNameId" placeholder="Enter Service Name"><br>
                        <input type="text" class="form-control" id="serviceDesId" placeholder="Enter Service Description"><br>
                        <input type="text" class="form-control" id="serviceImgId" placeholder="Enter Service Image Link">
                    </div>
                    <img id="serviceEditLoader" class="" src="{{asset('/')}}assets/images/loader.svg" alt="" style="height: 250px; width: 250px; padding-left: 150px;">
                    <h4 id="serviceEditWrong" class="text-center d-none">Something went Wrong !!</h4>
                </div>
                <div class="modal-footer">
                    <button id="editModalBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chancel</button>
                    <button data-id="" id="serviceUpdateBtn" type="button" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>



    <!--Add a New Service Modal -->
    <div
        class="modal fade"
        id="serviceAddModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add a New Service</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="serviceEditForm"  class="w-100">
                        <div class="mb-3">
                            <label  class="form-label"> Service Name</label>
                            <input type="text" class="form-control" id="serviceNameAddId" placeholder="Enter Service Name">
                            <p id="serviceNameRequire" class="text-danger d-none">Name is Require</p>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label"> Service Description</label>
                            <input type="text" class="form-control" id="serviceDesAddId" placeholder="Enter Service Description">
                            <p id="serviceDescriptionRequire" class="text-danger d-none">Description is Require</p>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Service Image</label>
                            <input type="text" class="form-control" id="serviceImgAddId" placeholder="Enter Service Image Link">
                            <p id="serviceImageRequire" class="text-danger d-none">Image is Require</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button id="addNewServiceBtn" type="button" class="btn btn-primary">Add a New Service</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">

        getServicesData();

     // For get services Data
        function getServicesData(){

            axios.get('/getServicesData')
                .then(function (response) {

                    if(response.status==200){
                        $('#mainDiv').removeClass('d-none');
                        $('#loaderDiv').addClass('d-none');

                        $('#serviceDataTable').DataTable().destroy();
                        $('#service_table').empty();

                        var dataJSON = response.data;
                        $.each(dataJSON, function (i, item) {
                            $('<tr>').html(
                                "<td><img class='table-img' src="+dataJSON[i].image+"></td>"+
                                "<td>" + dataJSON[i].name + "</td>"+
                                "<td>" + dataJSON[i].description + "</td>"+
                                "<td><a  class='editBtn' data-id="+dataJSON[i].id +"  ><i class='fas fa-edit'></i></a></td>"+
                                "<td><a  class='serviceDeleteBtn' data-id="+dataJSON[i].id +" ><i class='fas fa-trash-alt'></i></a></td>"
                            ).appendTo('#service_table');
                        });

                        // For  services Table Delete Icon Click
                        $('.serviceDeleteBtn').click(function (){
                            var id = $(this).data('id');
                            $('#serviceDeleteId').html(id);
                            //$('#serviceDeleteConformationBtn').attr('data-id',id);
                            $('#deleteModal').modal('show');
                        });

                        // For  Delete Modal Icon Hide Click
                        $('#cluseBtn').click(function (){
                            $('#deleteModal').modal('hide');
                        });
                        // For  Update Modal Icon Hide Click
                        $('#editModalBtn').click(function (){
                            $('#editModal').modal('hide');
                        });

                        //   For Update Icon Click
                        $('.editBtn').click(function (){
                            var id = $(this).data('id');
                            $('#serviceEditId').html(id);
                            serviceDetails(id);
                            $('#editModal').modal('show');
                        });

                        $('#serviceDataTable').DataTable({"order":false});
                        $('.dataTables_length').addClass('bs-select');
                    }
                     else{
                        $('#loaderDiv').removeClass('d-none');
                        $('#wrongDiv').addClass('d-none');
                    }
                }).catch(function (error) {
                $('#loaderDiv').removeClass('d-none');
                $('#wrongDiv').addClass('d-none');
            })
        }

        // For  services Modal Delete Icon Yes Click
        $('#serviceDeleteConformationBtn').click(function (){
            var id = $('#serviceDeleteId').html();
            serviceDelete(id);
        });

        // Service Individual Delete By ID
        function serviceDelete(deleteId){

            $('#serviceDeleteConformationBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");   // Animation set.........

            axios.post('/serviceDelete', {id:deleteId})
                .then(function (response) {
                    $('#serviceDeleteConformationBtn').html("Yes");
                    if(response.data==1){
                        $('#deleteModal').modal('hide');
                        getServicesData();

                    }
                    else {
                        $('#deleteModal').modal('hide');
                        //toastr.error('Delete Failed !!');
                    }
                }).catch(function (error) {
            })
        }

        // Service Individual Details By ID
        function serviceDetails(detailsId){
            axios.post('/getServiceDetails', {id:detailsId})
                .then(function (response) {
                    if(response.status==200){
                        $('#serviceEditForm').removeClass('d-none');
                        $('#serviceEditLoader').addClass('d-none');

                        var dataJSON = response.data;
                        $('#serviceNameId').val(dataJSON[0].name);
                        $('#serviceDesId').val(dataJSON[0].description);
                        $('#serviceImgId').val(dataJSON[0].image);
                    }
                    else{
                        $('#serviceEditWrong').removeClass('d-none');
                        $('#serviceEditLoader').addClass('d-none');
                    }
                }).catch(function (error) {
                $('#serviceEditWrong').removeClass('d-none');
                $('#serviceEditLoader').addClass('d-none');
            })
        }


        // For  services Modal Update Icon Save Click
        $('#serviceUpdateBtn').click(function (){
            var id = $('#serviceEditId').html();
            var name = $('#serviceNameId').val();
            var des = $('#serviceDesId').val();
            var img = $('#serviceImgId').val();
            serviceUpdateById(id, name,des, img);
        });

        // Service Update  By ID
        function serviceUpdateById(serviceId,serviceName, serviceDes, serviceImg){

            $('#serviceUpdateBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");   // Animation set.......

            axios.post('/ServiceUpdate', {
                id:serviceId,
                name:serviceName,
                des:serviceDes,
                img:serviceImg

            }).then(function (response) {
                $('#serviceUpdateBtn').html("Update");
                if(response.status==200){
                    $('#editModal').modal('hide');
                    getServicesData();
                }
                else{
                    $('#editModal').modal('hide');
                }
            }).catch(function (error) {
                $('#serviceEditWrong').removeClass('d-none');
                $('#serviceEditLoader').addClass('d-none');
            })
        }


        // Add A New  services Modal Icon Save Click
        $('#addNewServiceBtn').click(function (){
            var name = $('#serviceNameAddId').val();
            var des = $('#serviceDesAddId').val();
            var img = $('#serviceImgAddId').val();
            serviceAdd(name,des,img);
        });

        // Add a New Service Method
        function serviceAdd(serviceName, serviceDes, serviceImg){
            if(serviceName.length==0){
                $('#serviceNameRequire').removeClass('d-none');
            }
            else if(serviceDes.length==0){
                $('#serviceDescriptionRequire').removeClass('d-none');
            }
            else if(serviceImg.length==0){
                $('#serviceImageRequire').removeClass('d-none');
            }
            else{
                $('#addNewServiceBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");   // Animation set.......

                axios.post('/ServiceAdd', {
                    name:serviceName,
                    des:serviceDes,
                    img:serviceImg

                }).then(function (response) {
                    $('#addNewServiceBtn').html("Add a New Service");
                    if(response.status==200){
                        if(response.data==1){
                            $('#serviceAddModal').modal('hide');
                            getServicesData();
                        }
                        else{
                            $('#serviceAddModal').modal('hide');
                        }
                    }
                    else{
                        $('#serviceAddModal').modal('hide');
                    }
                }).catch(function (error) {
                    $('#serviceEditWrong').removeClass('d-none');
                    $('#serviceEditLoader').addClass('d-none');
                })
            }

        }

    </script>

@endsection
