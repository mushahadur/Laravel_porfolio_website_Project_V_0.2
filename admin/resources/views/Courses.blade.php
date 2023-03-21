@extends('Layout.app')

@section('content')

    <div class="page-wrapper">


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
                                    <button type="button" class="btn btn-success"  data-mdb-toggle="modal" data-mdb-target="#addCourseModal">
                                        Add a New Courses
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        {{--        Header and Navbar End--}}

        <div id="mainDivCourse" class="container d-none pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-5">
                        <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Fee</th>
                                <th class="th-sm">Class</th>
                                <th class="th-sm">Enroll</th>
                                <th class="th-sm">Detail</th>
                                <th class="th-sm">Edit</th>
                                <th class="th-sm">Delete</th>
                            </tr>
                            </thead>
                            <tbody id="course_table">

                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">2000-/</th>
                                <th class="th-sm">120</th>
                                <th class="th-sm">100</th>
                                <th class="th-sm"><a href="" ><i class="fas fa-eye"></i></a></th>
                                <th class="th-sm"><a href="" ><i class="fas fa-edit"></i></a></th>
                                <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <div id="loaderDivCourse"  class="container pt-5">
            <div class="row p-5">
                <div class="col-md-12  text-center p-5">
                    <img class="" src="{{asset('/')}}assets/images/loader.svg" alt="" height="100px" width="100px">
                </div>
            </div>
        </div>


        <div id="wrongDivCourse"  class="container d-none">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <h2>Something went Wrong !!</h2>
                </div>
            </div>
        </div>

    </div>


{{--    Add a new Course Modal--}}
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button id="courseAddModalDataDismissId" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
                                <p id="coursesNameRequire" class="text-danger text-sm-left d-none">Name Field is require</p>
                                <input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
                                <p id="coursesDesRequire" class="text-danger text-sm-left  d-none">Description Field is require</p>
                                <input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
                                <p id="CourseFeRequire" class="text-danger text-sm-left  d-none">Fee Field is require</p>
                                <input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
                                <p id="CourseEnrollRequire" class="text-danger text-sm-left  d-none">Enroll Field is require</p>
                            </div>
                            <div class="col-md-6">
                                <input id="CourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">
                                <p id="coursesClassRequire" class="text-danger  text-sm-left d-none">Class Field is require</p>
                                <input id="CourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
                                <p id="coursesLinkRequire" class="text-danger text-sm-left  d-none">Link Field is require</p>
                                <input id="CourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
                                <p id="coursesImgRequire" class="text-danger text-sm-left  d-none">Image Field is require</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="courseAddModalCancelId" type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Add a New Course</button>
                </div>
            </div>
        </div>
    </div>





    <!-- Modal For delete Course -->
    <div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                </div>
                <div class="modal-body">
                    <h4 class="pb-3 text-center">Do You Want to Delete This Data ?</h4>
                    <h4 id="coursesDeleteId" class="pb-3 text-center"></h4>
                </div>
                <div class="modal-footer">
                    <button id="cluseBtn" type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <button data-id="" id="coursesDeleteConformationBtn" type="button" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>



    {{--    Update Course Modal Start--}}
    <div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update This Course</h5>
                    <button id="courseEditModalDataDismissId" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="coursesEditForm" class="modal-body  text-center">
                    <div class="container">
                        <h4 id="coursesEditId" class="pb-3 text-center"></h4>
                        <div class="row">
                            <h4 id="coursesEditId" class="text-center"></h4>
                            <div class="col-md-6">
                                <input id="CourseNameUpdateId" type="text"  class="form-control mb-3" placeholder="Course Name">
                                <p id="coursesNameRequire" class="text-danger text-sm-left d-none">Name Field is require</p>
                                <input id="CourseDesUpdateId" type="text"  class="form-control mb-3" placeholder="Course Description">
                                <p id="coursesDesRequire" class="text-danger text-sm-left  d-none">Description Field is require</p>
                                <input id="CourseFeeUpdateId" type="text"  class="form-control mb-3" placeholder="Course Fee">
                                <p id="CourseFeRequire" class="text-danger text-sm-left  d-none">Fee Field is require</p>
                                <input id="CourseEnrollUpdateId" type="text" class="form-control mb-3" placeholder="Total Enroll">
                                <p id="CourseEnrollRequire" class="text-danger text-sm-left  d-none">Enroll Field is require</p>
                            </div>
                            <div class="col-md-6">
                                <input id="CourseClassUpdateId" type="text"  class="form-control mb-3" placeholder="Total Class">
                                <p id="coursesClassRequire" class="text-danger  text-sm-left d-none">Class Field is require</p>
                                <input id="CourseLinkUpdateId" type="text"  class="form-control mb-3" placeholder="Course Link">
                                <p id="coursesLinkRequire" class="text-danger text-sm-left  d-none">Link Field is require</p>
                                <input id="CourseImgUpdateId" type="text"  class="form-control mb-3" placeholder="Course Image">
                                <p id="coursesImgRequire" class="text-danger text-sm-left  d-none">Image Field is require</p>
                            </div>
                        </div>
                    </div>
                </div>
                <img id="courseEditLoader" class="" src="{{asset('/')}}assets/images/loader.svg" alt="" style="height: 250px; width: 250px; padding-left: 150px;">
                <h4 id="courseEditWrong" class="text-center d-none">Something went Wrong !!</h4>
                <div class="modal-footer">
                    <button id="courseEditModalCancelId" type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="CourseUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update Save</button>
                </div>
            </div>
        </div>
    </div>
    {{--    Update Course Modal End--}}




@endsection


@section('script')
    <script type="text/javascript">
        getCoursesData();

    </script>

@endsection
