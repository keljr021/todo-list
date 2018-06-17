
$(function() {

  $('.addBtn').click(function() {
    location.href = "/tasks/create";
  });

  $('.editBtn').click(function() {
    let id = $(this).parent().parent().attr('data-id');

    location.href = "/tasks/" + id;
  });

  $('.deleteBtn').click(function() {
    let id = $(this).parent().parent().attr('data-id');

    let confirm = window.confirm('Delete this item?')

    if (confirm) {
      console.log('delete item ', id);

      $.ajax({
        method: 'GET',
        url: './tasks/' + id + '/destroy',
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
