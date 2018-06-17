function editTaskItem(id) {

  location.href = "/tasks/" + id;

}

$(function() {

  $('.editBtn').click(function() {
    let id = $(this).parent().parent().attr('data-id');

    editTaskItem(id);
  });

  $('.deleteBtn').click(function() {
    let id = $(this).parent().parent().attr('data-id');

    console.log('delete item ', id);
  });

  $('.addBtn').click(function() {
    location.href = "/tasks/add";
  })

});
