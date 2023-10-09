function setAmount(min, amount) {
  $("#custom_amount").val(amount);
}

function infoSectionToggle() {
  let selectedPaymentMethod = $("#payment-gateway").children("option:selected").val();
  if ($('input[type="checkbox"]:checked').length > 0 && selectedPaymentMethod != 'PayUmoney') {
    $('#donation-info-section').fadeOut();
  } else {
    $('#donation-info-section').fadeIn(5);
  }
}
$(document).ready(function () {
  $('input[type="checkbox"]').click(function () {
    infoSectionToggle();
  })
});

$(document).ready(function () {
  $('input[type="checkbox"]').click(function () {
    var selectedPaymentMethod = $('select[name="gateway"]').children("option:selected").val();

    if ($(this).prop("checked") == true) {
      if (selectedPaymentMethod == "paystack") {
        $('#stripe-card-input').removeClass('d-block');
        $('#stripe-card-input').addClass('d-none');

        $('#paytm-section').removeClass('d-none');
        $('#paytm-section').addClass('d-none');

        $('#authorize-net-input').removeClass('d-block');
        $('#authorize-net-input').addClass('d-none');

        $('#razorpay-section').removeClass('d-block');
        $('#razorpay-section').addClass('d-none');

        $('#flutterwave-section').removeClass('d-block');
        $('#flutterwave-section').addClass('d-none');

        $('#paystack-section').removeClass('d-none');
      } else if (selectedPaymentMethod == "flutterwave") {
        $('#paytm-section').removeClass('d-none');
        $('#paytm-section').addClass('d-none');

        $('#stripe-card-input').removeClass('d-block');
        $('#stripe-card-input').addClass('d-none');

        $('#authorize-net-input').removeClass('d-block');
        $('#authorize-net-input').addClass('d-none');

        $('#razorpay-section').removeClass('d-block');
        $('#razorpay-section').addClass('d-none');

        $('#paystack-section').removeClass('d-block');
        $('#paystack-section').addClass('d-none');

        $('#flutterwave-section').removeClass('d-none');
      } else if (selectedPaymentMethod == "paytm") {
        $('#stripe-card-input').removeClass('d-block');
        $('#stripe-card-input').addClass('d-none');

        $('#authorize-net-input').removeClass('d-block');
        $('#authorize-net-input').addClass('d-none');

        $('#razorpay-section').removeClass('d-block');
        $('#razorpay-section').addClass('d-none');

        $('#paystack-section').removeClass('d-block');
        $('#paystack-section').addClass('d-none');

        $('#flutterwave-section').removeClass('d-block');
        $('#flutterwave-section').addClass('d-none');

        $('#paytm-section').removeClass('d-none');

      } else if (selectedPaymentMethod == "razorpay") {
        $('#paytm-section').removeClass('d-none');
        $('#paytm-section').addClass('d-none');

        $('#stripe-card-input').removeClass('d-block');
        $('#stripe-card-input').addClass('d-none');

        $('#authorize-net-input').removeClass('d-block');
        $('#authorize-net-input').addClass('d-none');

        $('#paystack-section').removeClass('d-block');
        $('#paystack-section').addClass('d-none');

        $('#flutterwave-section').removeClass('d-block');
        $('#flutterwave-section').addClass('d-none');

        $('#razorpay-section').removeClass('d-none');
      }
    } else if ($(this).prop("checked") == false) {
      $('#donation-info-section').removeClass('d-none');
      $('#authorize-net-input').addClass('d-none');
      $('#paystack-section').addClass('d-none');
      $('#flutterwave-section').addClass('d-none');
      $('#paytm-section').addClass('d-none');
    }
  });
  $('select[name="gateway"]').change(function () {
    var selectedPaymentMethod = $(this).children("option:selected").val();

    let value = $(this).val();
    let dataType = parseInt(value);
    if (selectedPaymentMethod == "stripe") {
      $('#paytm-section').removeClass('d-block');
      $('#paytm-section').addClass('d-none');

      $('#razorpay-section').removeClass('d-block');
      $('#razorpay-section').addClass('d-none');

      $('#authorize-net-input').removeClass('d-block');
      $('#authorize-net-input').addClass('d-none');

      $('#paystack-section').removeClass('d-block');
      $('#paystack-section').addClass('d-none');

      $('#flutterwave-section').removeClass('d-block');
      $('#flutterwave-section').addClass('d-none');

      $('#stripe-card-input').removeClass('d-none');
    }
    else if (selectedPaymentMethod == "paytm" && $("input[name='checkbox']:checked")
      .length > 0) {
      $('#stripe-card-input').removeClass('d-block');
      $('#stripe-card-input').addClass('d-none');

      $('#authorize-net-input').removeClass('d-block');
      $('#authorize-net-input').addClass('d-none');
      $('#paystack-section').removeClass('d-block');
      $('#paystack-section').addClass('d-none');

      $('#flutterwave-section').removeClass('d-block');
      $('#flutterwave-section').addClass('d-none');

      $('#razorpay-section').removeClass('d-block');
      $('#razorpay-section').addClass('d-none');

      $('#paytm-section').removeClass('d-none');
    } else if (selectedPaymentMethod == "razorpay" && $("input[name='checkbox']:checked")
      .length > 0) {
      $('#paytm-section').removeClass('d-block');
      $('#paytm-section').addClass('d-none');

      $('#stripe-card-input').removeClass('d-block');
      $('#stripe-card-input').addClass('d-none');

      $('#authorize-net-input').removeClass('d-block');
      $('#authorize-net-input').addClass('d-none');
      $('#paystack-section').removeClass('d-block');
      $('#paystack-section').addClass('d-none');

      $('#flutterwave-section').removeClass('d-block');
      $('#flutterwave-section').addClass('d-none');

      $('#razorpay-section').removeClass('d-none');
    } else if (selectedPaymentMethod == "paystack" && $("input[name='checkbox']:checked")
      .length > 0) {
      $('#paytm-section').removeClass('d-block');
      $('#paytm-section').addClass('d-none');

      $('#stripe-card-input').removeClass('d-block');
      $('#stripe-card-input').addClass('d-none');

      $('#authorize-net-input').removeClass('d-block');
      $('#authorize-net-input').addClass('d-none');

      $('#razorpay-section').removeClass('d-block');
      $('#razorpay-section').addClass('d-none');

      $('#flutterwave-section').removeClass('d-block');
      $('#flutterwave-section').addClass('d-none');

      $('#paystack-section').removeClass('d-none');
    } else if (selectedPaymentMethod == "flutterwave" && $("input[name='checkbox']:checked")
      .length > 0) {
      $('#paytm-section').removeClass('d-block');
      $('#paytm-section').addClass('d-none');

      $('#stripe-card-input').removeClass('d-block');
      $('#stripe-card-input').addClass('d-none');

      $('#authorize-net-input').removeClass('d-block');
      $('#authorize-net-input').addClass('d-none');

      $('#razorpay-section').removeClass('d-block');
      $('#razorpay-section').addClass('d-none');

      $('#paystack-section').removeClass('d-block');
      $('#paystack-section').addClass('d-none');

      $('#flutterwave-section').removeClass('d-none');
    } else if (selectedPaymentMethod == "authorize.net") {
      $('#paytm-section').removeClass('d-block');
      $('#paytm-section').addClass('d-none');

      $('#stripe-card-input').removeClass('d-block');
      $('#stripe-card-input').addClass('d-none');

      $('#razorpay-section').removeClass('d-block');
      $('#razorpay-section').addClass('d-none');

      $('#paystack-section').removeClass('d-block');
      $('#paystack-section').addClass('d-none');

      $('#flutterwave-section').removeClass('d-block');
      $('#flutterwave-section').addClass('d-none');

      $('#authorize-net-input').removeClass('d-none');
    } else {
      $('#offline-gateway-' + value).removeClass('d-none');
      $('#stripe-card-input').addClass('d-none');
      $('#razorpay-section').addClass('d-none');
      $('#paytm-section').addClass('d-none');
      $('#paystack-section').addClass('d-none');
      $('#flutterwave-section').addClass('d-none');
      $('#authorize-net-input').addClass('d-none');

    }
  });
});



// validate the card number for stripe payment gateway
function checkCard(cardNumber) {
  let status = Stripe.card.validateCardNumber(cardNumber);

  if (status == false) {
    $('#card-error').html('Invalid card number!');
  } else {
    $('#card-error').html('');
  }
}

// validate the cvc number for stripe payment gateway
function checkCVC(cvcNumber) {
  let status = Stripe.card.validateCVC(cvcNumber);

  if (status == false) {
    $('#cvc-error').html('Invalid cvc number!');
  } else {
    $('#cvc-error').html('');
  }
}
$(document).ready(function () {
  $("#donateNow").on('click', function (e) {
    e.preventDefault();
    let val = $("#payment-gateway").val();
    if (val == 'authorize.net') {
      sendPaymentDataToAnet();
    } else {
      $("#my-checkout-form").submit();
    }
  });
});

function sendPaymentDataToAnet() {
  // Set up authorisation to access the gateway.
  var authData = {};
  authData.clientKey = clientKey;
  authData.apiLoginID = apiLoginID;

  var cardData = {};
  cardData.cardNumber = document.getElementById("anetCardNumber").value;
  cardData.month = document.getElementById("anetExpMonth").value;
  cardData.year = document.getElementById("anetExpYear").value;
  cardData.cardCode = document.getElementById("anetCardCode").value;

  // Now send the card data to the gateway for tokenization.
  // The responseHandler function will handle the response.
  var secureData = {};
  secureData.authData = authData;
  secureData.cardData = cardData;
  Accept.dispatchData(secureData, responseHandler);
}

function responseHandler(response) {
  if (response.messages.resultCode === "Error") {
    var i = 0;
    let errorLists = ``;
    while (i < response.messages.message.length) {
      errorLists += `<li class="text-danger">${response.messages.message[i].text}</li>`;

      i = i + 1;
    }
    $("#anetErrors").show();
    $("#anetErrors").html(errorLists);
  } else {
    paymentFormUpdate(response.opaqueData);
  }
}

function paymentFormUpdate(opaqueData) {
  document.getElementById("opaqueDataDescriptor").value = opaqueData.dataDescriptor;
  document.getElementById("opaqueDataValue").value = opaqueData.dataValue;
  document.getElementById("my-checkout-form").submit();
}
