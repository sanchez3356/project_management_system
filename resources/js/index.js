const pageCode = {
    Home: function () {
        var mySwiper = new Swiper(".swiper-container", {
            slidesPerView: 3, // Number of slides visible at a time
            spaceBetween: 20, // Space between slides
            pagination: {
                el: ".swiper-pagination",
                clickable: true, // Enable bullet clicks
            },
        });
        updateProgressBars();
        // Formatting function for row details - modify as you need
        function format(d) {
            return "<div>-- Action " + d[6] + "</div>";
        }
        // Initialize the DataTable
        var table = $("#pro_list").DataTable();

        // Handle click events to toggle child rows
        // Add event listener for opening and closing details
        table.on("click", "td.dt-control", function (e) {
            let tr = e.target.closest("tr");
            let row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
            } else {
                // Open this row
                row.child(format(row.data())).show();
            }
        });

        // Fetch your finance data or use the variable passed from the Blade template
        const url = $("#projectProgressChart").data("url");
        fetchData(url, (data) => {
            // Process the data and format it for the chart
            const seriesData = data.map((project) => {
                return {
                    name: project.project_name,
                    data: project.phases.map((phase) => {
                        return {
                            x: new Date(phase.start_date).getTime(),
                            y: calculatePhaseCompletion(phase.tasks),
                        };
                    }),
                };
            });

            // Create chart options
            const options = {
                series: seriesData,
                chart: {
                    height: 350,
                    type: "area",
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    curve: "smooth",
                },
                xaxis: {
                    type: "datetime",
                },
                tooltip: {
                    x: {
                        format: "dd MMM yyyy",
                    },
                    y: {
                        title: {
                            formatter: (value) => {
                                return "Phase Completion: " + value + "%";
                            },
                        },
                    },
                },
            };

            // Create the ApexCharts instance
            const chart = new ApexCharts(
                document.querySelector("#projectProgressChart"),
                options
            );

            // Render the chart
            chart.render();
        });

        // Function to calculate phase completion based on task statuses
        function calculatePhaseCompletion(tasks) {
            const totalTasks = tasks.length;
            if (totalTasks === 0) return 0;

            const completedTasks = tasks.filter(
                (task) => task.status === "completed"
            ).length;
            const completionPercentage = (completedTasks / totalTasks) * 100;

            return completionPercentage;
        }
        //Main page graph
        // circular progress bar
        const data = $("#progressCircle").data("id");

        var options = {
            series: [data],
            labels: ["Projects completed"],
            colors: ["var(--primary-color)"],
            chart: {
                height: 350,
                type: "radialBar",
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: "70%",
                    },
                },
            },
        };

        var chart = new ApexCharts(
            document.querySelector("#progressCircle"),
            options
        );
        chart.render();
        // circular progress bar

        // Income analysis pie chart
        var options = {
            series: [44, 55, 13, 43, 22],
            chart: {
                width: 320,
                type: "pie",
            },
            labels: ["Team A", "Team B", "Team C", "Team D", "Team E"],
            responsive: [
                {
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200,
                        },
                        legend: {
                            position: "bottom",
                        },
                    },
                },
            ],
        };

        // var chart = new ApexCharts(
        //     document.querySelector("#income_analysis"),
        //     options
        // );
        // chart.render();
        // Income analysis pie chart

        // var options = {
        //     series: [
        //         {
        //             name: "Sales income",
        //             data: [44, 55, 13, 43, 22],
        //         },
        //     ],
        //     chart: {
        //         type: "area",
        //         height: 200,
        //         zoom: {
        //             enabled: false,
        //         },
        //     },
        //     dataLabels: {
        //         enabled: false,
        //     },
        //     stroke: {
        //         curve: "straight",
        //     },

        //     title: {
        //         text: "Fundamental Analysis of Stocks",
        //         align: "left",
        //     },
        //     subtitle: {
        //         text: "Price Movements",
        //         align: "left",
        //     },
        //     labels: series.monthDataSeries1.dates,
        //     xaxis: {
        //         type: "datetime",
        //     },
        //     yaxis: {
        //         opposite: true,
        //     },
        //     legend: {
        //         horizontalAlign: "left",
        //     },
        // };
        // Sales income line chart
        // var chart = new ApexCharts(
        //     document.querySelector("#sales_income"),
        //     options
        // );
        // chart.render();
        // Sales income line chart
    },
    Users: function () {
        // Formatting function for row details - modify as you need
        function format(d) {
            return "<div>-- Action " + d[6] + "</div>";
        }

        // Initialize the DataTable
        var table = $("#user_list").DataTable();

        // Handle click events to toggle child rows
        // Add event listener for opening and closing details
        table.on("click", "td.dt-control", function (e) {
            let tr = e.target.closest("tr");
            let row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
            } else {
                // Open this row
                row.child(format(row.data())).show();
            }
        });
    },
    Projects: function () {
        function format(d) {
            return "<div>-- Action " + d[6] + "</div>";
        }
        // Initialize the DataTable
        var table = $("#project_list").DataTable();

        // Handle click events to toggle child rows
        // Add event listener for opening and closing details
        table.on("click", "td.dt-control", function (e) {
            let tr = e.target.closest("tr");
            let row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
            } else {
                // Open this row
                row.child(format(row.data())).show();
            }
        });
    },
    ProjectsAdd: function () {},
    Profile: function () {
        $("#countrySelect").select2();

        submitFormWithAjax("#basic_info", function (response) {
            alert(response.message);
        });

        submitFormWithAjax("#acc_info", function (response) {
            alert(response.message);
        });

        $("#ProfileVisibility").on("click", function () {
            var url = $(this).data("url");
            console.log(url);
            get(url, (data) => {
                console.log(data);
            });
        });
        $("#removeAvatar").on("click", function () {
            var url = $(this).data("url");
            console.log(url);
            var formData = new FormData();
            formData.append("_method", "PUT"); // Add the "_method" field with the value "PUT"
            formData.append("avatar", "remove");

            console.log(formData);

            postData(url, formData, function (data) {
                console.log(data);
            });
        });

        $("#userAvatar").on("change", function () {
            // Get the selected file
            var file = $(this)[0].files[0];
            var url = $(this).data("url");
            if (file) {
                // You can display a preview of the selected image if needed
                var reader = new FileReader();
                reader.onload = function (e) {
                    // Set the src attribute for all img elements with the class 'profilePreview'
                    $("img.profilePreview").attr("src", e.target.result);
                };
                reader.readAsDataURL(file);

                // Here, you can send the file to the server using AJAX to update the avatar
                // Make an AJAX request with the "PUT" method
                var formData = new FormData();
                formData.append("_method", "PUT"); // Add the "_method" field with the value "PUT"
                formData.append("userAvatar", file);

                console.log(formData);

                postData(url, formData, function (data) {
                    console.log(data);
                });
            }
        });
    },
    Tasks: function () {
        $(".dd").nestable({
            maxDepth: 3,
            callback: function (l, e) {
                console.log(l);
                console.log(e);
                // Extract the task ID, new status, and old status from the item data
                const taskId = l.attr("data-id");
                const newStatus = l.parents("li.dd-item").attr("data-status");
                const oldStatus = l.attr("data-status");
                const route = l.attr("data-route");
                // Make an AJAX request with the "PUT" method
                var formData = new FormData();
                formData.append("_method", "PUT"); // Add the "_method" field with the value "PUT"
                formData.append("taskId", taskId);
                formData.append("newStatus", newStatus);
                formData.append("oldStatus", oldStatus);
                postData(route, formData, function (data) {
                    alert(data);
                });
            },
        });
        submitFormWithAjax("#tasks", function (response) {
            alert(response.message);
        });
    },
    ClientProfile: function () {
        // circular progress bar
        var profileChart = document.querySelector("#profileCircle");
        var prog = Math.round(profileChart.getAttribute("data-progress"));
        var options = {
            series: [prog],
            labels: ["Profile complete"],
            colors: ["var(--primary-color)"],
            chart: {
                height: 250,
                type: "radialBar",
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: "70%",
                    },
                },
            },
        };
        var chart = new ApexCharts(profileChart, options);
        chart.render();
        // circular progress bar
    },
    Finances: function () {
        // Formatting function for row details - modify as you need
        function format(d) {
            return "<div>-- Action " + d[6] + "</div>";
        }
        // Initialize the DataTable
        var table = $("#transactions_list").DataTable();

        // Handle click events to toggle child rows
        // Add event listener for opening and closing details
        table.on("click", "td.dt-control", function (e) {
            let tr = e.target.closest("tr");
            let row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
            } else {
                // Open this row
                row.child(format(row.data())).show();
            }
        });

        submitFormWithAjax("#account_form", function (response) {
            alert(response.message);
        });
        submitFormWithAjax("#transaction_form", function (response) {
            alert(response.message);
        });
        // Fetch your finance data or use the variable passed from the Blade template
        const financeChart = $("#financeChart");
        const url = financeChart.data("url");
        $("#accountFilter, #monthFilter").on("change", function () {
            // Fetch the selected filter values
            const selectedAccount = $("#accountFilter").val();
            const selectedMonth = $("#monthFilter").val();

            // Construct the URL with filter parameters
            const url =
                financeChart.data("url") +
                `?account=${selectedAccount}&month=${selectedMonth}`;

            fetchData(url, (data) => {
                // Process and update the chart with filtered data
                createChart(data);
            });
        });
        fetchData(url, (data) => {
            createChart(data);
        });
        function createChart(data) {
            // Process the data or perform actions with it
            const transactionsData = Object.keys(data).map((account) => {
                $("h6 span.account-name").text(account);
                return data[account];
            });
            const transactions = transactionsData[0];
            // Check if there are no transactions
            if (Object.keys(transactions).length === 0) {
                showAlert("error", "No transactions to display.");
                return;
            } else {
                showAlert("success", "Displaying available transactions");
            }

            const incomeData = transactions
                .filter((transaction) => transaction.type === "income")
                .map((transaction) => {
                    return {
                        x: new Date(transaction.date).getTime(),
                        y: transaction.amount,
                        type: transaction.type,
                        method: transaction.method,
                    };
                });
            const expenditureData = transactions
                .filter((transaction) => transaction.type === "expenditure")
                .map((transaction) => {
                    return {
                        x: new Date(transaction.date).getTime(),
                        y: transaction.amount,
                        type: transaction.type,
                        method: transaction.method,
                    };
                });

            // Create the ApexCharts line graph with the formatted data
            const options = {
                series: [
                    {
                        name: "Income",
                        data: incomeData,
                    },
                    {
                        name: "Expenditure",
                        data: expenditureData,
                    },
                ],
                chart: {
                    height: 350,
                    type: "area",
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    curve: "smooth",
                },
                xaxis: {
                    type: "datetime",
                },
                tooltip: {
                    x: {
                        format: "dd MMM yyyy",
                    },
                    y: {
                        title: {
                            formatter: (value) => {
                                return "Transaction type: " + value + "";
                            },
                        },
                    },
                },
            };

            // Create the ApexCharts instance
            const chart = new ApexCharts(
                document.querySelector("#financeChart"),
                options
            );
            chart.render();
        }
    },
    Inbox: function () {
        /////////////////////////////////////////
        const mail = $(".mail-inbox");
        const urls = mail.data("url");
        fetchData(urls, (data) => {
            // Process and update the chart with filtered data
            createMail(data);
        });

        $(".mail-side .nav li a").on("click", function (e) {
            var data = $(this).data("mail");
            console.log(data);
            // Construct the URL with filter parameters
            const url = mail.data("url") + `?data=${data}`;

            fetchData(url, (data) => {
                // Process and update the chart with filtered data
                console.log(data);
                createMail(data);
            });
        });

        $("#flexCheckDefault").change(function () {
            // Check or uncheck all checkboxes in the mail list based on the main checkbox state
            $(".mail-list .form-check-input").prop("checked", this.checked);
        });
        // Individual checkbox change event
        $(".mail-list .btn-warning").click(function () {
            const url = $(this).data("url");
            get(url, (data) => {
                $("#mail-detail-open").html(data); // Assuming you have a container div with id 'card-container'
                $("#mail-detail-open").show();
            });
        });

        $(".mail-list .form-check-input").change(function () {
            // Uncheck the main checkbox if any individual checkbox is unchecked
            if (!$(this).prop("checked")) {
                $("#flexCheckDefault").prop("checked", false);
            }
        });
        function createMail(data) {
            $(".mail-inbox .mail-list ul").html(data.htmlContent);
        }
    },
    Resume: function () {

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
                
        submitFormWithAjax("#education_form", function (response) {
            alert(response.message);
        });
        submitFormWithAjax("#career_form", function (response) {
            alert(response.message);
        });
        submitFormWithAjax("#reference_form", function (response) {
            alert(response.message);
        });
        submitFormWithAjax("#contact_form", function (response) {
            alert(response.message);
        });
        submitFormWithAjax("#skill_form", function (response) {
            alert(response.message);
        });
        submitFormWithAjax("#language_form", function (response) {
            alert(response.message);
        });
        submitFormWithAjax("#interest_form", function (response) {
            alert(response.message);
        });
    },
    News: function () {
        // Initialize the DataTable
        var table = $("#email_list").DataTable();
    },
    ProjectsDetails: function () {
        // Function to update delete button state based on checkbox status
        function updateDeleteButtonState() {
            const $deleteButton = $(".task-delete");
            const $checkboxes = $(".task-checkbox");
            const checkedCheckboxes = $checkboxes.filter(":checked");

            if (checkedCheckboxes.length > 0) {
                $deleteButton.removeAttr("disabled");
            } else {
                $deleteButton.attr("disabled", "disabled");
            }
        }

        // Handle checkbox changes
        $(".task-checkbox").on("change", function () {
            updateDeleteButtonState();
        });

        // Handle task show/edit clicks (Replace this with your AJAX logic)
        $(".task-show").on("click", function () {
            const route = $(this).data("route");
            // Send an AJAX request to edit the task with the taskId
            alert(route);
            fetchData(route, (data) => {
                console.log(data);
            });
            // Implement your AJAX logic here
        });

        $(".task-edit").on("click", function () {
            const route = $(this).data("route");
            // Send an AJAX request to edit the task with the taskId
            alert(route);
            fetchData(route, (data) => {
                console.log(data);
                var taskModal = $("#taskModal");
                taskModal.find("#taskModalLabel").text("Update task details");
                taskModal.find('input[name="phase"]').val(data.phases_id);
                taskModal.find('input[name="task"]').val(data.task);
                taskModal
                    .find('textarea[name="description"]')
                    .text(data.description);
                taskModal.find('input[name="deadline"]').val(data.deadline);
                taskModal
                    .find(
                        'select[name="status"] option[value="' +
                            data.status +
                            '"]'
                    )
                    .attr("selected", "selected");
                // Update the form action URL
                var actionUrl = taskModal.data("route") + "/" + data.id;
                taskModal.find("form").attr("action", actionUrl);
                // Add the hidden method field
                taskModal
                    .find("form")
                    .append('<input type="hidden" name="_method" value="PUT">');
                taskModal.find('button[type="submit"]').text("Update");

                taskModal.modal("show");
            });
            // Implement your AJAX logic here
        });

        var phase;
        $(".task-add").click(function () {
            phase = $(this).data("id");
            $("#task_form input[name='phase']").val(phase); // Set the value of the hidden input
            $("#taskModal").modal("show");
        });
        submitFormWithAjax("#task_form", function (response) {
            alert(response);
        });
        submitFormWithAjax("#phase_form", function (response) {
            alert(response);
        });
    },
    Gallery: function () {
        const gallery = $("#gallery");
        const url = gallery.data("url");
        fetchData(url, (data) => {
            // Process and update the chart with filtered data
            $("#gallery .gallery-loader").hide();
            $("#gallery .card-body").html(data.cards);
        });

        // Event listener for checkbox changes
        $("input.image-checkbox").change(function () {
            updateDeleteButtonState();
        });

        // Event listener for delete button click
        $("#deleteAllBtn").click(function () {
            deleteSelectedImages();
        });

        $("#galleryFilter .btn").on("click", function (e) {
            var data = $(this).data("filter");
            // Construct the URL with filter parameters
            const url = gallery.data("url") + `?images=${data}`;
            fetchData(url, (data) => {
                // Process and update the chart with filtered data
                $("#gallery .gallery-loader").hide();
                $("#gallery .card-body").html(data.cards);
            });
        });

        // Function to update the state of the delete button
        function updateDeleteButtonState() {
            var checkedCheckboxes = $("input.image-checkbox:checked");
            var deleteAllBtn = $("#deleteAllBtn");

            if (checkedCheckboxes.length > 0) {
                // Enable the delete button
                deleteAllBtn.removeAttr("disabled");
            } else {
                // Disable the delete button
                deleteAllBtn.attr("disabled", "disabled");
            }
        }

        // Function to delete selected images
        function deleteSelectedImages() {
            var selectedImages = [];
            $(".image-checkbox:checked").each(function () {
                selectedImages.push($(this).val());
            });

            var deleteAllUrl = $("#deleteAllBtn").data("url");

            // Make an AJAX request using the postData function
            postData(
                deleteAllUrl,
                { images: selectedImages, _token: "{{ csrf_token() }}" },
                function (response) {
                    // Handle success (optional)
                    console.log(response);
                }
            );
        }
    },
    // Add more pages and their corresponding functions as needed
};

const pageTitle = pageTitles;

$(document).ready(function () {
    $(".metismenu").metisMenu();

    document
        .querySelector("#sidebar-toggle")
        .addEventListener("click", function () {
            let wrapper = document.querySelector("#wrapper");
            wrapper.classList.toggle("opened");
        });
    // Dropify file input
    $(".dropify").dropify();
    // Sumernote text input
    $("#summernote").summernote({
        placeholder:
            "The toolbar can be customized and it also supports various callbacks such as <code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many more.",
        tabsize: 2,
        height: 120,
    });

    // Check if a function exists for the current page title, then call it
    if (pageCode[pageTitle]) {
        pageCode[pageTitle]();
    } else {
        // Common code for other pages
        console.log(pageTitle);
    }
    console.log(pageTitle);
    var routeToDelete;
    var create = $(".notifications").data("url");
    get(create, function (data) {
        $(".notifications .notification").html(data); // Assuming you have a container div with id 'card-container'
    });
    var notification = $(".notifications").data("create");
    get(notification, function (data) {
        console.log(data);
    });
    // Show delete confirmation modal when a delete button is clicked
    $(".delete-item").click(function () {
        routeToDelete = $(this).data("route");
        $("#deleteConfirmationModal").modal("show");
    });
    $("#transactions_list").on("click", "td button.delete-item", function (e) {
        routeToDelete = $(this).data("route");
        $("#deleteConfirmationModal").modal("show");
    });
    $("#pro_list").on("click", "td button.delete-item", function (e) {
        routeToDelete = $(this).data("route");
        $("#deleteConfirmationModal").modal("show");
    });
    $("#project_list").on("click", "td button.delete-item", function (e) {
        routeToDelete = $(this).data("route");
        $("#deleteConfirmationModal").modal("show");
    });
    $("#project_list").on("click", "td button.favorite", function (e) {
        var fetchRoute = $(this).data("route");
        var postRoute = $(this).data("post");
        fetchData(fetchRoute, (data) => {
            // Make an AJAX request with the "PUT" method
            var formData = new FormData();
            // formData.append("_method", "PUT"); // Add the "_method" field with the value "PUT"
            formData.append("project", data.project_title);
            formData.append("image", data.project_image);
            formData.append("description", data.project_description);
            formData.append("project_type", data.project_type);
            postData(postRoute, formData, function (data) {
                alert(data);
                console.log(data);
            });
        });
    });
    // Event listener for button clicks
    $(".btn-group .btn").click(function () {
        // Remove the "active" class from all buttons
        $(".btn-group .btn").removeClass("active");

        // Add the "active" class to the clicked button
        $(this).addClass("active");
    });
    // Handle the delete button in the modal
    $("#confirmDelete").click(function () {
        // Send an AJAX request to delete the item using the routeToDelete
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            url: routeToDelete,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
            },
            success: function (response) {
                console.log(response);
                showAlert("success", response.message);
                // Handle success, e.g., remove the item from the list
            },
            error: function (xhr) {
                // Handle errors
                console.log(xhr);
                // Optional: Show an error message
                showAlert("error", xhr.message);
            },
        });

        // Close the modal
        $("#deleteConfirmationModal").modal("hide");
    });

    // This code will run after the DOM has fully loaded
    console.log("DOM is fully loaded.");
});

function updateProgressBars() {
    const progressBars = document.querySelectorAll(".progress-bar");
    progressBars.forEach(function (progressBar) {
        const ariaValueNow = progressBar.getAttribute("aria-valuenow");
        progressBar.style.width = ariaValueNow + "%";
    });
}

function postData(url, data, callback) {
    // Get the CSRF token from the meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        url: url, // Replace with your actual URL for updating the avatar
        method: "POST", // Use "POST" method
        data: data,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
        },
        success: function (response) {
            // Handle the success response
            console.log(response);
            if (response.success) {
                callback(response);
                showAlert("success", response.message);
            } else {
                showAlert("error", response.message);
            }
        },
        error: function (error) {
            // Handle the error
            console.log(error);
            showAlert("error", "Error submitting data:", error);
        },
    });
}

function get(url, callback) {
    $.ajax({
        url: url, // Replace with the actual URL of your controller action
        method: "GET",
        success: function (data) {
            callback(data);
        },
        error: function (error) {
            console.error("Error fetching details:", error);
            showAlert("error", "Error fetching details:", error);
        },
    });
}
function fetchData(url, callback) {
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            // Invoke the callback function with the data
            console.log(data);
            callback(data);
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
            showAlert("error", "Error fetching data:", error);
        });
}

function submitFormWithAjax(formSelector, callback) {
    $(formSelector).on("submit", function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(), // Serialize form data
            headers: {
                "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
            },
            success: function (response) {
                console.log(response);
                if (response.success) {
                    // Reset the form
                    if (typeof callback === "function") {
                        callback(response);
                    }
                    $(formSelector)[0].reset();
                    showAlert("success", response.message);
                } else if (response.errors) {
                    $.each(response.errors, function (field, errorMessage) {
                        var errorField = $(formSelector).find(
                            "#" + field + "-error"
                        );
                        errorField.text(errorMessage);
                    });
                    showAlert("error", "Please fix the errors in the form.");
                } else {
                    showAlert("error", response.message);
                }
            },
            error: function () {
                // Handle any AJAX errors
                showAlert(
                    "error",
                    "An error occurred while submitting the form."
                );
            },
        });
    });
}

function showAlert(type, message) {
    var alertClass = type === "success" ? "alert-success" : "alert-danger";
    var alertMessage = type === "success" ? "Success" : "Error";

    $("#messages").html(
        '<div class="alert ' +
            alertClass +
            ' alert-dismissible fade show">' +
            message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
    );
}
