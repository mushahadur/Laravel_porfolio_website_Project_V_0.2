@extends('Layout.app')

@section('content')

    <div  class="page-wrapper pt-3">
        <div id="mainDiv" class="container d-none">
            <div class="row">
                <div class="col-md-12">
                    <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
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


    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                </div>
                <div class="modal-body">
                    <h4 class="pb-3 text-center">Do You Want to Delete This Data ?</h4>
                    <h4 id="serviceDeleteId" class="pb-3 text-center"></h4>
                </div>
                <div class="modal-footer">
                    <button id="cluseBtn" type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button data-id="" id="serviceDeleteConformationBtn" type="button" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script type="text/javascript">
        getServicesData();
    </script>

@endsection
