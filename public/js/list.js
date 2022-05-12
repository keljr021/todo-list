
$(function() {

  //Opens the View Modal for task
  $('.row-priority,.row-title,.row-created').click(function() {
    let id = $(this).parent().attr('data-id');
    $('#view' + id).modal('show');
  });

  $('.complete-checkbox').change(function() {
    let row = $(this).parent().parent();
    let id = $(row).attr('data-id');
    let is_checked = this.checked;

    if (is_checked) {
      $(row).addClass('completed-row');
      $(row).find('.priority-span').addClass('hide');
      $(row).find('.button-span').addClass('hide');
    }
    else {
      $(row).removeClass('completed-row');
      $(row).find('.priority-span').removeClass('hide');
      $(row).find('.button-span').removeClass('hide');
    }

    $.ajax({
      method: 'GET',
      url: '/tasks/' + id + '/' + (is_checked ? 1 : 0) + '/complete',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function() {

        console.log('Marked' + id + ' as ' + is_checked);

      }
    });

  });

  $('.addBtn').click(function() {
    location.href = "/tasks/add";
  });

  $('.editBtn').click(function() {
    let id = $(this).parent().parent().parent().attr('data-id');

    location.href = "/tasks/" + id + "/edit";
  });

  $('.deleteBtn').click(function() {
    let id = $(this).parent().parent().parent().attr('data-id');

    let confirm = window.confirm('Delete this item?')

    if (confirm) {
      console.log('delete item ', id);

      $.ajax({
        method: 'GET',
        url: '/tasks/' + id + '/delete',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {

          //Alert the user
          alert('Item deleted.');

          //Refresh the page after deletion
          location.reload();
        }
      });
    }

  });

});
