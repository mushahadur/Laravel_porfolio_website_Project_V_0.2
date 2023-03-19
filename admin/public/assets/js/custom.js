$(document).ready(function () {
$('#VisitorDt').DataTable();
$('.dataTables_length').addClass('bs-select');
});


function getServicesData(){


    axios.get('/getServicesData')
        .then(function (response) {

            if(response.status==200){
                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                $('#service_table').empty();

                var dataJSON = response.data;
                $.each(dataJSON, function (i, item) {
                    $('<tr>').html(
                        "<td><img class='table-img' src="+dataJSON[i].image+"></td>"+
                        "<td>" + dataJSON[i].name + "</td>"+
                        "<td>" + dataJSON[i].description + "</td>"+
                        "<td><a ><i class='fas fa-edit'></i></a></td>"+
                        "<td><a  class='serviceDeleteBtn' data-id="+dataJSON[i].id +" ><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#service_table');
                });

                $('.serviceDeleteBtn').click(function (){
                    var id = $(this).data('id');
                    $('#serviceDeleteId').html(id);
                    //$('#serviceDeleteConformationBtn').attr('data-id',id);
                    $('#deleteModal').modal('show');
                });

                $('#cluseBtn').click(function (){
                    $('#deleteModal').modal('hide');
                });

                $('#serviceDeleteConformationBtn').click(function (){
                    var id = $('#serviceDeleteId').html();
                    serviceDelete(id);
                })


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

function serviceDelete(deleteId){
    axios.post('/serviceDelete', {id:deleteId})
        .then(function (response) {
            if(response.data==1){
                $('#deleteModal').modal('hide');
                getServicesData();
                //toastr.success('Hi! I am success message.');

            }
            else {
                $('#deleteModal').modal('hide');
                //toastr.error('Delete Failed !!');

            }
        }).catch(function (error) {

    })


}
