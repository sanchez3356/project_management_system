$(document).ready(function () {
    const searchInput = $("#search_input");
    const searchResults = $("#search-results");
    const searchForm = $("#navbar-search");

    // Handle search input changes
    searchInput.on("input", function () {
        const query = searchInput.val();
        if (query.length > 2) {
            // Send an AJAX request to fetch search results
            $.ajax({
                url: searchForm.attr("action"),
                type: "GET",
                data: { query: query },
                success: function (data) {
                    displaySearchResults(data.results);
                },
                error: function () {
                    console.log(
                        "An error occurred while fetching search results."
                    );
                },
            });
        } else {
            searchResults.empty(); // Clear results when query is too short
            searchResults.hide();
        }
    });

    function displaySearchResults(results) {
        searchResults.empty(); // Clear previous results

        if (Object.keys(results).length === 0) {
            searchResults.append(
                '<p class="text-center text-danger w-100 p-2">No results found.</p>'
            );
        } else {
            // Show the searchResults element if there are results
            searchResults.show();
        }

        // Loop through results and display them
        $.each(results, function (table, data) {
           
            if (data) {
                searchResults.append('<h6> ' + table + ' : ' + data.type + '</h6>');
                console.log(data);  
                const resultItem = $(
                    '<div class="result-item w-100 p-2"></div>'
                    );
                    resultItem.append(
                        '<p class="no-' + table + '"><span class="fw-bold">' + data.name + '</span> -- ' + data.data + '</p>'
                    );
                    // Add more content based on the search result structure
                    searchResults.append(resultItem);

                // $.each(data, function (index, item) {
                //     console.log(item);  
                // });
            }
        });
    }
});
