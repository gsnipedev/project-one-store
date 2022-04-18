content = null;

function showAll() {
  $.ajax({
    type: "get",
    url: "http://localhost:8080/Itemsapi",
    dataType: "json",
    data: {
      apiKey: "tesApiKey",
    },
    success: function (response) {
      data = response.items;
      respond = response.Response;
      //console.log(respond);
      content = null;
      if (respond == "success") {
        $.each(data, function (indexInArray, valueOfElement) {
          //console.log(valueOfElement);
          content += `
  
          <tr class="roboto-condensed" id="row${indexInArray}">
              <th scope="row">${valueOfElement.item_id}</th>
              <td>${valueOfElement.item_name}</td>
              <td>${valueOfElement.category_name}</td>
              <td>${valueOfElement.size}</td>
              <td>${valueOfElement.stock}</td>
              <td>${valueOfElement.collection_name}</td>
              <td>${valueOfElement.total_like}</td>
              <td>
              <button type="button" value="${valueOfElement.item_name}" class="btn btn-success admin-update-item" id="admin-update-item" data-bs-toggle="modal" data-bs-target="#updateItemModal">Update</button>
              <button type="button" value="${valueOfElement.item_name}" class="btn btn-info text-light admin-detail-item" data-bs-toggle="modal" data-bs-target="#detailItemModal">Details</button> 
              <button type="button" value="${valueOfElement.item_name}" class="btn btn-danger admin-delete-item">Delete</button>
                      </td>
              
              </tr>
    
          `;
        });

        $("#admin-items-list").html(content);
        $(".admin-delete-item").click(function (e) {
          e.preventDefault();
          //console.log($(this).parent().html());
        });
        $(".admin-delete-item").click(function (e) {
          e.preventDefault();
          itemName = $(this).val();
          Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
          }).then((result) => {
            if (result.isConfirmed) {
              $(this).parent().parent().remove();
              $.ajax({
                type: "delete",
                url: `http://localhost:8080/itemsapi/${itemName}`,
                //data: { _method: "DELETE" },
                //dataType: "json",
                success: function (response) {
                  console.log("deleted");
                  Swal.fire("Deleted!", "Your file has been deleted.", "success");
                },
                error: function () {
                  console.log("error");
                },
              });
            }
          });
        });
      }
    },
  });
}

showAll();

$(document).ready(function () {
  $("#admin-search").click(function (e) {
    e.preventDefault();
    valueWannaSearch = $("#admin-search-input").val();
    if (valueWannaSearch == "") {
      showAll();
      return;
    }
    content = "";
    $.ajax({
      type: "get",
      url: `http://localhost:8080/itemsapi/${valueWannaSearch}`,
      data: {
        apiKey: "tesApiKey",
      },
      dataType: "json",
      success: function (response) {
        //console.log(response);
        data = response.search;
        //console.log(data[0].item_name);
        if (response.status == "Success") {
          $.each(data, function (indexInArray, valueOfElement) {
            console.log(valueOfElement);
            content += `
          
                  <tr class="roboto-condensed">
                      <th scope="row">${valueOfElement.item_id}</th>
                      <td>${valueOfElement.item_name}</td>
                      <td>${valueOfElement.category_name}</td>
                      <td>${valueOfElement.size}</td>
                      <td>${valueOfElement.stock}</td>
                      <td>${valueOfElement.collection_name}</td>
                      <td>${valueOfElement.total_like}</td>
                      <td>
                          <button type="button" value="${valueOfElement.item_name}" class="btn btn-success admin-update-item" id="admin-update-item" data-bs-toggle="modal" data-bs-target="#updateItemModal">Update</button>
                          <button type="button" value="${valueOfElement.item_name}" class="btn btn-info text-light admin-detail-item" data-bs-toggle="modal" data-bs-target="#detailItemModal">Details</button> 
                          <button type="button" value="${valueOfElement.item_name}" class="btn btn-danger admin-delete-item">Delete</button>
                      </td>
                      
                      </tr>
            
                  `;
          });
          $("#admin-items-list").html(" ");
          $("#admin-items-list").html(content);
          $(".admin-delete-item").click(function (e) {
            e.preventDefault();
            console.log($(this).val());
            itemName = $(this).val();
          });
          $(".admin-delete-item").click(function (e) {
            e.preventDefault();
            Swal.fire({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!",
            }).then((result) => {
              if (result.isConfirmed) {
                $(this).parent().parent().remove();
                $.ajax({
                  type: "delete",
                  url: `http://localhost:8080/itemsapi/${itemName}`,
                  //data: { _method: "DELETE" },
                  //dataType: "json",
                  success: function (response) {
                    Swal.fire("Deleted!", "Your file has been deleted.", "success");
                  },
                  error: function () {
                    console.log("error");
                  },
                });
              }
            });
          });
        }
      },
    });
  });
});
categoryContent = `<option value="" disabled selected>Category</option>0`;
$.ajax({
  type: "GET",
  url: "http://localhost:8080/itemsapi/getCategory",
  //data: "data",
  dataType: "json",
  success: function (response) {
    //FREE ME, FREE ANDIKA, FREE GSNIPE
    $data = response.category;
    $.each($data, function (indexInArray, valueOfElement) {
      console.log(valueOfElement.category_name);
      categoryContent += `<option value="${valueOfElement.category_id}">${valueOfElement.category_name}</option>`;
    });
    $(".adminCategorySelect").html(categoryContent);
  },
});

function adminAddItem() {
  console.log("Added");
}

function tessx() {
  console.log($(".adminCategorySelect").val());
}

function adminShowDetail() {
  console.log("detail");
}

$(window).load(function () {
  console.log("loading....");
});
