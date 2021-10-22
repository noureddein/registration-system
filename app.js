$(document).ready(function () {
    load_data();
    reload_index()
    onclick_button()
    // reload_comments(id)
})


function fetchData(id) {
    $.ajax({
        method: "POST",
        url: "fetch-edit.php",
        data: { "id": id },
        success: function (data) {
            $('#dialog_container').html(data);
        }
    })
}

function deleteUser(str) {
    const id = str;
    $.ajax({
        type: "POST",
        url: "delete.php",
        data: { "id": id },
        success: function () {
            load_data()
        }
    })
}

function load_data() {
    $.ajax({
        url: "fetch.php",
        method: "POST",
        success: function (data) {
            $('#user_data').html(data);
        }
    });
}



function updateData() {
    $.ajax({
        url: 'fetch-edit.php',
        method: 'GET',
        success: function () {
            user_data = document.getElementById('update_user_info')
            const id = user_data.userId.value
            const first_name = user_data.firstName.value
            const last_Name = user_data.lastName.value
            const email = user_data.userEmail.value
            const user_type = user_data.userType.value
            const user_gender = user_data.gender.value
            $.ajax({
                method: 'POST',
                url: 'update-user-db.php',
                data: {
                    "id": id,
                    "first_name": first_name,
                    "last_Name": last_Name,
                    "email": email,
                    "user_type": user_type,
                    "user_gender": user_gender
                },
                success: function () {
                    $('#dialog_box').modal('hide');
                    load_data();
                }
            })
        }
    })
}

function deleteImage(id) {
    $.ajax({
        url: 'server.php',
        method: "POST",
        data: { "img_id": id },
        success: function () {
            $.ajax({
                url: 'server.php',
                method: 'POST',
                data: {
                    'delete_all_comments': id
                },
                success: function () {
                    reload_index()
                }
            })
        }
    })

}




function add_comment(id) {
    let att_id = `text_area_comment${id}`
    let text_area = document.getElementById(att_id)
    if (text_area.value !== '') {
        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: {
                'img_comment_id': id,
                'comment_text': text_area.value,
            },
            success: function () {
                // window.location.href = 'index.php'
                // reload_comments(id)
                reload_index()
            }
        })
    }

}


function reload_index() {
    $.ajax({
        method: 'GET',
        url: './fetching/fetching-image.php',
        success: function (data) {
            $('.uploaded_images').html(data)
        }
    })
}

function deleteComment(id) {
    $.ajax({
        url: './fetching/deleting-comm.php',
        method: 'POST',
        data: { 'id': id },
        success: function () {
            reload_index()
        }

    })
}

// ================

const dashboard_container = $('.dashboard_container')
const check_box = $('#check_box')
const dashboard_details = $('.dashboard_details')
// const imgs_section = $('.imgs_section')
function onclick_button() {
    if (!check_box.is(':checked')) {
        console.log('not Checked')
        dashboard_container.css({ 'display': 'none' })

    } else {
        console.log('checked')
        dashboard_container.css({ 'display': 'block' })

    }
}

// document.getElementById('search_box').addEventListener("submit", search_box)
function search_box(event) {
    event.preventDefault();
    const search_query = event.target.search_box_input.value
    console.log(search_query)
    $.ajax({
        method: "POST",
        url: 'fetch.php',
        data: ({ search_query: search_query }),
        success: function (data) {
            $('#user_data').html(data);
        }

    })
}

// document.getElementById('drop_list_search').addEventListener('submit',drop_list_search)
// function drop_list_search() {
//     const value = $('#drop_list_filter').val()
//     console.log(value)
// }

$('#drop_list_filter').change(function () {
    const value = $(this).val()
    console.log(value)
    $.ajax({
        method: "POST",
        url: "fetch.php",
        data: ({ search_by_list: value }),
        success: function (data) {
            $('#user_data').html(data);
        }
    })
})