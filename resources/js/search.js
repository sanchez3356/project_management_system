$(document).ready(function () {
    const searchInput = $('#search_input');
    const searchResults = $('#search-results');
    const searchForm = $('#navbar-search');

    // Handle search input changes
    searchInput.on('input', function () {
        const query = searchInput.val();
        if (query.length > 2) {
            // Send an AJAX request to fetch search results
            $.ajax({
                url: searchForm.attr('action'),
                type: 'GET',
                data: { query: query },
                success: function (data) {
                    displaySearchResults(data.results);
                },
                error: function () {
                    console.log('An error occurred while fetching search results.');
                },
            });
        } else {
            searchResults.empty(); // Clear results when query is too short
        }
    });

    function displaySearchResults(results) {
        console.log(results);
        searchResults.empty();

        if (Object.keys(results).length === 0) {
            searchResults.append('<p>No results found.</p>');
        }

        // Loop through results and display them
        $.each(results, function (table, data) {
            if (data.length > 0) {
                searchResults.append('<h4>' + table + '</h4>');

                $.each(data, function (index, item) {
                    const resultItem = $('<div class="result-item"></div>');
                    resultItem.append('<p class="no-'+ index +'">' + item.name + ' -- ' + item.data  + '</p>');
                    // Add more content based on the search result structure
                    searchResults.append(resultItem);
                });
            }
        });
    }
});
