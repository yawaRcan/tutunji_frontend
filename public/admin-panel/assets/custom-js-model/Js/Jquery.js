function deleteConfirmation(id) {
    swal({
        title: "Delete !!!",
        text: "Are you sure You want to Delete this Amenity ?",
        type: "warning",
        value: "active",
        icon: "success",
        showCancelButton: !0,
        confirmButtonText: "Yes, Delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: !0
    }).then(function (e) {

        if (e.value === true) {

            $.ajax({
                type: 'get',
                url: base_url+"amenityDelete/" + id,
                success: function (results) {
                    console.log(results)
                    swal({
                        title: "Done!",
                        text: "Amenity Deleted!",
                        type: "success",
                        button: "OK"
                    }).then(function (e) {
                        console.log(results);
                        window.location.href = base_url + "/amenities_list";
                    });
                }
            });

        } else {
            e.dismiss;
        }

    }, function (dismiss) {
        return false;
    })
}

$(document).ready(function () {
    $(document).on('click', '.editbtn', function () {
        var id = $(this).val();
        /*alert(amenity_id);*/
        $('#editModal').modal('show');

        $.ajax({
            type: "GET",
            url: base_url+"/edit-amenity/"+id,
            success: function (response) {
                if(response.status === 200)
                {
                    //console.log(response.amenity.name);
                    $('#amenity_id').val(response.amenity.id)
                    $('#amenity_name').val(response.amenity.name);
                }
            }
        });
    });
});

$(function () {
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});

/*document.getElementById("uploadBtn").onchange = function () {
    $("#uploadFile").empty().append(this.value);
    /!*document.getElementById("uploadFile").value = this.value;*!/
};*/

/*bkLib.onDomLoaded(function() {
    nicEditors.editors.push(
        new nicEditor().panelInstance(
            document.getElementById('discription') //description textarea id
        )
    );
});*/


