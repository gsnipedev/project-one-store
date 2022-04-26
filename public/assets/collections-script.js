$(document).ready(function () {
  content = "";
  $.ajax({
    type: "GET",
    url: "http://localhost:8080/itemsapi/allCollection",
    //data: "data",
    dataType: "json",
    success: function (response) {
      data = response.Response;
      $.each(data, function (indexInArray, valueOfElement) {
        //console.log(valueOfElement);

        content += `


        <div class="col-lg-4" data-aos="zoom-out-right">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-xl-5 overflow-hidden">
                        <img src="${valueOfElement.collection_imgUrl}" class="rounded-start" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body font-rubik">
                            <h5 class="card-title">${valueOfElement.collection_name}</h5>
                            <p class="card-text">${valueOfElement.collection_desc}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>

                    </div>
                    <div class="card-footer roboto-condensed shoppingButton">
                        Shopping Now
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
        `;
      });
      $("#collectionItemContainer").html(content);
      $(".shoppingButton").click(function (e) {
        e.preventDefault();
        itemName = $(this)
          .parent()
          .children(":nth-child(2)")
          .children(":nth-child(1)")
          .children(":nth-child(1)")
          .html();
        console.log(itemName);

        $(".heroTitle").html(`${itemName} Collection`);
      });
    },
  });
});

function collectionShowAll() {
  $.ajax({
    type: "get",
    url: "http://localhost:8080/itemsapi",
    data: {
      apiKey: "tesApiKey",
    },
    dataType: "json",
    success: function (response) {
      colData = response.items;
      console.log(colData);
      content = "";

      $.each(colData, async function (indexInArray, valueOfElement) {
        content += `
        <div class="col-6 col-md-3 mb-3 collection-item-card" name="${valueOfElement.item_id}" data-aos="fade-in">
                    <div class="overflow-hidden collection-img-card" style="width: auto;">
                        <img src="${valueOfElement.item_image}"
                            alt="" class="img-fluid itemImage" width="300" height="400">
                    </div>
                    <div class="mt-2">
                        <span class="roboto-condensed">${valueOfElement.item_name}</span>
                        <br>
                        <span class="font-rubik">$${valueOfElement.price}.00</span>
                        <div class="row">
                            <div class="col-4">
                                <span class="roboto-condensed"><i class="fa-solid fa-star text-warning"></i></span>
                                <span class="font-rubik">9.9/10</span>
                            </div>
                            <div class="col">
                                <i class="fa-solid fa-heart item-like-button ${
                                  checkLike(valueOfElement.item_id) == true ? "text-danger" : "text-dark"
                                }" data-item-name="${
          valueOfElement.item_name
        }"></i>&nbsp;<span class="item-likes-count">${valueOfElement.total_like}</span>
                                &nbsp;
                                <i class="fa-solid fa-comment item-comment-button"></i> 99
                            </div>
                        </div>
                    </div>

                </div>
        
        `;
      });
      $(".item-collection-container").html(content);
      $(".item-like-button").click(function (e) {
        e.preventDefault();
        console.log($(this).attr("data-item-name"));
        likeDislike($(this).attr("data-item-name"));
        if ($(this).hasClass("text-danger")) {
          $(this).removeClass("text-danger");
          likesCount = $($(this).parent().children(":nth-child(2)")).html();
          likesCount = parseInt(likesCount) - 1;
          $(this).parent().children(":nth-child(2)").html(likesCount);
          return;
        }
        $(this).removeClass("text-dark");
        $(this).addClass("text-danger");
        likesCount = $($(this).parent().children(":nth-child(2)")).html();
        likesCount = parseInt(likesCount) + 1;
        $(this).parent().children(":nth-child(2)").html(likesCount);
      });
      $(".collection-img-card").click(function (e) {
        e.preventDefault();
        window.location.href = `product/?item-id=${$(this).parent().attr("name")}`;
      });
    },
  });
}

$(document).ready(function () {
  collectionShowAll();
});

function tesBool(val) {
  if (val == 28) {
    return false;
  }
  return true;
}

function checkLike(elem) {
  var result = false;
  $.ajax({
    type: "GET",
    url: "http://localhost:8080/itemsapi/getLikes",
    data: {
      elements: elem,
    },
    dataType: "json",
    async: false,
    success: function (response) {
      //console.log(response.Like_Status);
      if (response.Like_Status == null) {
        result = false;
        return;
      }
      $.each(response.Like_Status, function (indexInArray, valueOfElement) {
        //console.log(valueOfElement);
        if (response.username == valueOfElement.username) {
          result = true;
        }
      });
    },
  });
  return result;
}

function likeDislike(elem) {
  $.ajax({
    type: "GET",
    url: `http://localhost:8080/itemsapi/likeDislike/${elem}`,
    data: {
      elements: elem,
    },
    dataType: "json",
    success: function (response) {
      console.log(response);
    },
  });
}

//console.log(checkLike(21));
