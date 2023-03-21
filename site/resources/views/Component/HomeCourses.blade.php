


<div class="container-fluid jumbotron mt-5 shadow">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <img class=" page-top-img fadeIn" src="{{asset('/')}}assets/images/knowledge.svg">
            <h1 class="page-top-title mt-3">- অনলাইন কোর্স সমূহ -</h1>
        </div>
    </div>
</div>

<div class="container py-2">
    <div class="row">
        @foreach($CoursesData as $allCourse )
        <div class="col-md-4" style="padding: 0px 1px 1px;">
            <div class="containerr">
                <img src="{{$allCourse->course_img}}" alt="Avatar" class="image card-img-top">
                <div class="overlay">
                    <div class="text">
                        <h5 class="service-card-title mt-4">{{$allCourse->course_name}}</h5>
                        <h6 class="service-card-subTitle p-0 ">{{$allCourse->course_des}}</h6>
                        <h6 class="service-card-subTitle p-0 ">র{{$allCourse->course_fee}} || {{$allCourse->course_totalenroll}}</h6>
                        <a target="_blank" href="{{$allCourse->course_link}}" class="normal-btn-outline mt-2 mb-4 btn">শুরু করুন </a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>



