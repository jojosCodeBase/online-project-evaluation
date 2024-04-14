// Function to toggle password visibility
function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var checkbox = document.getElementById('showPasswordCheckbox');

    if (checkbox.checked) {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
}

function setCategory(id, type) {
    $.ajax({
        url: "/admin/getCategories/",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (type == 'name') {
                $.each(response.categories, function (index, category) {
                    if(category.id == id){
                        $('#category').text(category.name);
                    }
                });
            } else {
                var categories = $('#edit-category-select');
                categories.empty();

                $.each(response.categories, function (index, category) {
                    categories.append('<option value="' + category.id + '">' + category.name + '</option>');
                });
                $('#edit-category-select').val(id);
            }
        },
        error: function (status, error) {
            console.error('AJAX requst failed: ', status, error);
        }
    });
}

function setFranchise(callback) {
    $.ajax({
        url: "/admin/fetchFranchise/",
        type: "GET",
        dataType: "json",
        success: function (response) {
            $('#edit-franchise').css('display', 'none');
            $('#edit-franchise-select').css('display', 'block');
            var franchises = $('#edit-franchise-select');
            franchises.empty();

            $.each(response.franchises, function (index, franchise) {
                franchises.append('<option value="' + franchise.name + '">' + franchise.name + '</option>');
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX requst failed: ', status, error);
        }
    });
    callback();
}

function editModal(id) {
    $.ajax({
        url: "/admin/getInfo/" + id,
        type: "GET",
        dataType: "json",
        success: function (response) {
            var stdInfo = response.student[0];
            $('#edit-name').val(stdInfo.name);
            $('#edit-exam').val(stdInfo.exam_name);

            if (stdInfo.mode == 'of') {
                $('#edit-franchise-select').css('display', 'block');
                $('#edit-franchise').css('display', 'none');
                setFranchise(function () {
                    $('#edit-franchise-select').val(stdInfo.franchise);
                });
            } else {
                $('#edit-franchise').css('display', 'block');
                $('#edit-franchise').val(stdInfo.franchise);
                $('#edit-franchise-select').css('display', 'none');
            }
            console.log(stdInfo.category);
            setCategory(stdInfo.category, 'null');

            // $('#edit-category').val(stdInfo.category);
            $('#edit-exam-date').val(stdInfo.exam_month_year);
            $('#edit-mode').val(stdInfo.mode);
            $('#edit-rank').val(stdInfo.rank);
            $('#edit-state').val(stdInfo.state);
            $('#edit-marks').val(stdInfo.total_marks);
            $('#edit-placement').val(stdInfo.placement);
            $('#edit-since').val(stdInfo.since);
            $('#edit-comments').val(stdInfo.review);
            $('#edit-rating').val(stdInfo.rating);
            $('#edit-enroll-no').val(stdInfo.regno);
            document.getElementById('student-image-edit').src = assetPath + '/' + stdInfo.profile;
        },
        error: function (status, error) {
            console.error('AJAX requst failed: ', status, error);
        }
    });
}

function deleteModal(id) {
    $('#stid').val(id);
}

function viewModalInit(id) {
    $.ajax({
        url: "/admin/getInfo/" + id,
        type: "GET",
        dataType: "json",
        success: function (response) {
            var stdInfo = response.student[0];
            $('#name').text(stdInfo.name);
            $('#franchise').text(stdInfo.franchise);
            $('#exam').text(stdInfo.exam_name);
            setCategory(stdInfo.category, 'name');

            $('#exam-date').text(stdInfo.exam_month_year);
            if (stdInfo.mode == "on")
                stdInfo.mode = "Online";
            else
                stdInfo.mode = "Offline";

            $('#mode').text(stdInfo.mode);
            $('#rank').text(stdInfo.rank);
            $('#state').text(stdInfo.state);
            $('#marks').text(stdInfo.total_marks);
            $('#placement').text(stdInfo.placement);
            $('#since').text(stdInfo.since);
            $('#comments').text(stdInfo.review);
            $('#rating').text(stdInfo.rating);
            $('#enroll-no').text(stdInfo.regno);
            document.getElementById('student-image-view').src = assetPath + '/' + stdInfo.profile;
        },
        error: function (status, error) {
            console.error('AJAX requst failed: ', status, error);
        }
    });
}

function deleteCategoryModal(id) {
    // this function is used to get the id of the category and set it to the input field of deleteModel
    $.ajax({
        url: "/admin/category/getInfo/" + id,
        type: "GET",
        dataType: "json",
        success: function (response) {
            $('#ctg_id').val(response.category[0].id);
        },
        error: function (status, error) {
            console.error('AJAX requst failed: ', status, error);
        }
    });
}

function editFranchiseModal(id) {
    $.ajax({
        url: "/admin/franchise/getInfo/" + id,
        type: "GET",
        dataType: "json",
        success: function (response) {
            $('#franchise_id').val(response.franchise[0].id);
            $('#franchise_name').val(response.franchise[0].name);
            $('#franchise_url').val(response.franchise[0].url);
        },
        error: function (status, error) {
            console.error('AJAX requst failed: ', status, error);
        }
    });
}

function deleteFranchiseModal(id) {
    // this function is used to get the id of the franchise and set it to the input field of deleteModel
    $.ajax({
        url: "/admin/franchise/getInfo/" + id,
        type: "GET",
        dataType: "json",
        success: function (response) {
            $('#fid').val(response.franchise[0].id);
        },
        error: function (status, error) {
            console.error('AJAX requst failed: ', status, error);
        }
    });
}

function editCategoryModal(id) {
    $.ajax({
        url: "/admin/category/getInfo/" + id,
        type: "GET",
        dataType: "json",
        success: function (response) {
            $('#category_id').val(response.category[0].id);
            $('#category_name').val(response.category[0].name);
        },
        error: function (status, error) {
            console.error('AJAX requst failed: ', status, error);
        }
    });
}


if (document.getElementById('mode')) {
    $('#mode').on('change', () => {
        if ($('#mode').val() == 'of') {
            $('#franchiseSelect')
                .css('display', 'block')
                .find('select')
                .attr('required', 'required');

            $.ajax({
                url: "/admin/fetchFranchise/",
                type: "GET",
                dataType: "json",
                success: function (response) {
                    var franchises = $('#franchise-list');
                    franchises.empty();

                    franchises.append('<option value="">Select franchise from list</option>');

                    $.each(response.franchises, function (index, franchise) {
                        franchises.append('<option value="' + franchise.id + '">' + franchise.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('AJAX requst failed: ', status, error);
                }
            });

        } else {
            $('#franchiseSelect')
                .css('display', 'none')
                .find('select')
                .removeAttr('required');
        }
    });
}

function expandCard(cardId) {
    var card = document.getElementById('card' + cardId);
    var button = card.querySelector('.btn');
    var isExpanded = card.classList.toggle('expanded');
    var hiddenItems = card.querySelector('.hidden-items');
    hiddenItems.classList.toggle('visible');

    if (!isExpanded) {
        // If collapsing, scroll to the top of the card
        var cardPosition = card.getBoundingClientRect().top + window.scrollY;
        window.scrollTo({
            top: cardPosition,
            behavior: 'smooth'
        });
    }

    // Update button text based on card state
    button.textContent = isExpanded ? 'Show Less' : 'More Info';
}

document.addEventListener('DOMContentLoaded', function () {
    // Your JavaScript code here
    var checkbox = document.getElementById('showPasswordCheckbox');
    if (checkbox)
        checkbox.addEventListener('change', togglePasswordVisibility);

    const textarea = document.getElementById('student_review');
    const maxChars = 200;

    if (textarea) {
        textarea.addEventListener('input', function () {
            const currentChars = this.value.length;
            $('#remaining-chars').text(currentChars);
            if (currentChars > maxChars) {
                this.value = this.value.slice(0, maxChars);
                $('#remaining-chars').text(maxChars);
            }
        });
    }

    $('#keep_profile_image').on('change', function () {
        if ($(this).is(':checked')) {
            // If the checkbox is checked, show the closest ancestor div with the class "form-group"
            $('#edit-profile-image-input').hide();
        } else {
            // If the checkbox is not checked, hide the closest ancestor div with the class "form-group"
            $('#edit-profile-image-input').show();
        }
    });


    $('#edit-mode').on('change', function () {
        if ($('#edit-mode').val() == 'of') {
            setFranchise();
        } else {
            $('#edit-franchise').css('display', 'block');
            $('#edit-franchise').val('Global');
            $('#edit-franchise-select').css('display', 'none');
        }
    });


    (() => {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                let isValid = true;

                // Check validity of input fields with the required attribute
                form.querySelectorAll('input[required]').forEach(input => {
                    if (!input.checkValidity()) {
                        isValid = false;
                    }
                });

                // Check validity of select elements with the required attribute
                form.querySelectorAll('select[required]').forEach(select => {
                    if (!select.checkValidity()) {
                        isValid = false;
                    }
                });

                // Prevent form submission if any required field is invalid
                if (!isValid) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();

});
