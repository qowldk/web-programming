<!DOCTYPE html>
<html lang="en">

<head>
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <!-- iamport.payment.js -->
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.2.0.js"></script>
    <script>
    var IMP = window.IMP;
    IMP.init("imp68825158");

    function requestPay() {
        console.log("click")
        IMP.request_pay({
                pg: "kakaopay.TC0ONETIME",
                pay_method: "card",
                merchant_uid: "aa33-3322a004",
                name: "당근 10kg",
                amount: 100,
                buyer_email: "Iamport@chai.finance",
                buyer_name: "포트원 기술지원팀",
                buyer_tel: "010-1234-5678",
                buyer_addr: "서울특별시 강남구 삼성동",
                buyer_postcode: "123-456",
            },
            function(rsp) {
                if (rsp.success) {
                    console.log(rsp)
                    // 결제 성공 시: 결제 승인 또는 가상계좌 발급에 성공한 경우
                    // http://localhost/course/paymentinfo.php에 POST 요청

                    jQuery.ajax({
                        url: "http://localhost/course/paymentinfo.php", // 가맹점 서버
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                        },
                        data: {
                            imp_uid: rsp.imp_uid,
                            merchant_uid: rsp.merchant_uid,
                        },
                        success: function(response) {
                            console.log(response)
                            alert("결제가 완료되었습니다.");
                            // http://localhost/course/paymentinfo.php로 이동
                            location.href = "http://localhost/course/paymentinfo.php";
                        },
                        error: function(response) {
                            console.log(response)
                            alert("실패");
                        }



                    });


                } else {
                    // 결제 실패 시 로직,
                    var msg = '결제에 실패하였습니다.';
                    msg += '에러내용 : ' + rsp.error_msg;
                    alert(msg);
                }



            });
    }
    </script>
    <meta charset="UTF-8" />
    <title>Sample Payment</title>
</head>

<body>
    <button onclick="requestPay()">결제하기</button>
    <!-- 결제하기 버튼 생성 -->
</body>

</html>