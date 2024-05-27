$(document).ready(function() {
    var currentPage = 1;
    var statusQuery = {
      'tablePending': 'Pending',
      'tableInitialScreening': 'Initial Screening',
      'tableSecondaryScreening': 'Secondary Screening'
    };

    function fetchStudents(tableId, status, page) {
      $.ajax({
        url: 'http://127.0.0.1:8000/api/v1/student',
        method: 'GET',
        data: {
          includeApplication: true,
          'status[eq]': status,
          page: page
        },
        success: function(response) {
          console.log(response); // Log the response to understand its structure
          
          // Clear the table body
          $('#' + tableId + ' tbody').empty();

          // Access the data array in the response
          var students = response.data;

          students.forEach(function(student) {
            var row = '<tr>' +
              '<td>' + (student.application ? student.application.id : '') + '</td>' +
              '<td>' + student.firstName + ' ' + (student.middleName || '') + ' ' + student.lastName + ' ' + (student.nameExtension || '') + '</td>' +
              '<td>' + (student.birthPlace || '') + '</td>' +
              '<td>' + (student.application ? student.application.status : '') + '</td>' +
              '<td>' + (student.birthday || '') + '</td>' +
              '</tr>';
            $('#' + tableId + ' tbody').append(row);
          });

          // Update pagination controls based on the response metadata
          if (response.prev_page_url) {
            $('#prevPage').parent().removeClass('disabled');
            $('#prevPage').data('page', page - 1);
            $('#prevPage').data('table-id', tableId);
            $('#prevPage').data('status', status);
          } else {
            $('#prevPage').parent().addClass('disabled');
          }

          if (response.next_page_url) {
            $('#nextPage').parent().removeClass('disabled');
            $('#nextPage').data('page', page + 1);
            $('#nextPage').data('table-id', tableId);
            $('#nextPage').data('status', status);
          } else {
            $('#nextPage').parent().addClass('disabled');
          }
        },
        error: function(error) {
          console.log('Error:', error);
        }
      });
    }

    // Initial fetch for each table
    for (var tableId in statusQuery) {
      fetchStudents(tableId, statusQuery[tableId], currentPage);
    }

    // Pagination controls
    $('#prevPage').click(function(e) {
      e.preventDefault();
      var page = $(this).data('page');
      var tableId = $(this).data('table-id');
      var status = $(this).data('status');
      if (page && tableId && status && !$(this).parent().hasClass('disabled')) {
        fetchStudents(tableId, status, page);
      }
    });

    $('#nextPage').click(function(e) {
      e.preventDefault();
      var page = $(this).data('page');
      var tableId = $(this).data('table-id');
      var status = $(this).data('status');
      if (page && tableId && status && !$(this).parent().hasClass('disabled')) {
        fetchStudents(tableId, status, page);
      }
    });
  });