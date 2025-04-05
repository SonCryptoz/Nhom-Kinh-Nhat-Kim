<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Div với Nút Bấm và Form</title>
    <style>
        @media screen and (max-width: 760px) {
            .wrapper-container {
                display: flex;
                justify-content: center;
                /* Căn giữa theo chiều ngang */
                width: 100%;
                /* Đảm bảo nó rộng toàn bộ */
            }

            .main-container {
                background-image: url('/public/assets/images/backgroud10buoc.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                display: flex;

                width: 100%;
                aspect-ratio: 1 / 1;
                /* Chiều cao bằng chiều rộng (tỷ lệ 1:1) */
                position: relative;




                /* Đưa tâm của nó về chính giữa */
            }

            .button-group h1 {
                width: 180%;
                font-size: 10px;
                /* Chữ to */
                font-weight: bold;
                /* Chữ đậm */
                font-style: italic;
                /* Chữ nghiêng */
                color: #ff4500;
                /* Màu cam đậm (có thể thay đổi) */
                text-align: center;
                /* Căn giữa */
                margin-bottom: 1em;
                margin-left: 1em;

                /* Tạo khoảng cách với phần dưới */
            }


            .button-group {
                display: flex;
                flex-direction: column;
                gap: 3px;
                top: 2%;
                /* Đẩy xuống 10% so với chiều cao màn hình */
                /* Cố định vị trí */
                position: absolute;
                /* Hoặc `fixed` nếu muốn giữ nguyên khi cuộn */
                bottom: 1em;
                left: 1em;

                /* Điều chỉnh kích thước linh hoạt */
                width: clamp(150px, 45%, 400px);
                /* Không nhỏ hơn 150px, không lớn hơn 400px */
                min-height: 200px;
                /* Giữ chiều cao tối thiểu */
            }


            .button-group button {
                width: 80%;
                border: 1px solid #ccc;
                background-color: #000000;
                color: white;
                font-size: 1.2vw;
                /* Giữ tỷ lệ theo chiều rộng màn hình */
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
                padding: 0.5vh 0.5vw;
                /* Giữ kích thước theo tỷ lệ màn hình */
            }


            .button-group button:hover {
                background-color: #0056b3;
            }

            .info-box-custom {
                position: absolute;
                /* Cố định trong .main-container */
                /* Cố định ở vị trí không thay đổi */
                top: 24vw;
                /* Điều chỉnh vị trí theo chiều cao màn hình */
                left: 63vw;
                /* Căn giữa theo chiều rộng màn hình */
                transform: translateX(-50%);
                /* Dịch sang trái 50% để giữ giữa */

                width: 40vw;
                /* Dùng % hoặc vw thay vì em */
                height: 40vw;

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;


                color: white;
                font-size: 1.5vw;
                /* Tùy chỉnh kích thước chữ */
                font-weight: bold;
                border-radius: 5px;
                padding: 10px;
            }

        }
        @media   screen and (min-width: 768px) and (max-width: 1279px) {
            .wrapper-container {
                display: flex;
                justify-content: center;
                /* Căn giữa theo chiều ngang */
                width: 100%;
                /* Đảm bảo nó rộng toàn bộ */
            }

            .main-container {
                background-image: url('/public/assets/images/backgroud10buoc.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                display: flex;

                width: 100%;
                aspect-ratio: 1 / 1;
                /* Chiều cao bằng chiều rộng (tỷ lệ 1:1) */
                position: relative;




                /* Đưa tâm của nó về chính giữa */
            }

            .button-group h1 {
                width: 180%;
                font-size: 16px;
                /* Chữ to */
                font-weight: bold;
                /* Chữ đậm */
                font-style: italic;
                /* Chữ nghiêng */
                color: #ff4500;
                /* Màu cam đậm (có thể thay đổi) */
                text-align: center;
                /* Căn giữa */
                margin-bottom: 1em;
                margin-left: 1em;

                /* Tạo khoảng cách với phần dưới */
            }


            .button-group {
                display: flex;
                flex-direction: column;
                gap: 3px;
                top: 10%;
                /* Đẩy xuống 10% so với chiều cao màn hình */
                /* Cố định vị trí */
                position: absolute;
                /* Hoặc `fixed` nếu muốn giữ nguyên khi cuộn */
                bottom: 1em;
                left: 1em;

                /* Điều chỉnh kích thước linh hoạt */
                width: clamp(150px, 40%, 400px);
                /* Không nhỏ hơn 150px, không lớn hơn 400px */
                min-height: 200px;
                /* Giữ chiều cao tối thiểu */
            }


            .button-group button {
                width: 80%;
                border: 1px solid #ccc;
                background-color: #000000;
                color: white;
                font-size: 1.2vw;
                /* Giữ tỷ lệ theo chiều rộng màn hình */
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
                padding: 0.5vh 0.5vw;
                /* Giữ kích thước theo tỷ lệ màn hình */
            }


            .button-group button:hover {
                background-color: #0056b3;
            }

            .info-box-custom {
                position: absolute;
                /* Cố định trong .main-container */
                /* Cố định ở vị trí không thay đổi */
                top: 20vw;
                /* Điều chỉnh vị trí theo chiều cao màn hình */
                left: 62vw;
                /* Căn giữa theo chiều rộng màn hình */
                transform: translateX(-50%);
                /* Dịch sang trái 50% để giữ giữa */

                width: 25vw;
                /* Dùng % hoặc vw thay vì em */
                height: 40vw;

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;


                color: white;
                font-size: 1.2vw;
                /* Tùy chỉnh kích thước chữ */
                font-weight: bold;
                border-radius: 5px;
                padding: 10px;
            }

     
}

        @media screen and (min-width: 1280px) {
            .wrapper-container {
                display: flex;
                justify-content: center;
                /* Căn giữa theo chiều ngang */
                width: 100%;
                /* Đảm bảo nó rộng toàn bộ */
            }

            .main-container {
                background-image: url('/public/assets/images/backgroud10buoc.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                display: flex;
                gap: 20px;
                width: 1080px;
                height: 1080px;
                position: relative;




                /* Đưa tâm của nó về chính giữa */
            }

            .button-group h1 {
                width: 150%;
                font-size: 30px;
                /* Chữ to */
                font-weight: bold;
                /* Chữ đậm */
                font-style: italic;
                /* Chữ nghiêng */
                color: #ff4500;
                /* Màu cam đậm (có thể thay đổi) */
                text-align: center;
                /* Căn giữa */
                margin-bottom: 20px;
                /* Tạo khoảng cách với phần dưới */
            }


            .button-group {
                display: flex;

                flex-direction: column;
                gap: 10px;
                width: 40%;
                margin-left: 50px;
                margin-top: 180px;
            }

            .button-group button {
                border: 1px solid #ccc;
                padding: 10px;

                background-color: #000000;
                color: white;
                font-size: 14px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .button-group button:hover {
                background-color: #0056b3;
            }

            .info-box-custom {

                flex-direction: column;

                padding: 10px;
                width: 355px;
                height: 355px;
                 
                border-radius: 5px;
                position: absolute;
                top: 365px;
                left: 580px;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                font-size: 20px;
                font-weight: bold;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper-container">

        <div class="main-container">

            <div class="button-group" id="buttonContainer">
                <h1>QUY TRÌNH THI CÔNG 10 BƯỚC CỦA NHẤT KIM WINDOW</h1>
                <!-- Các nút sẽ được tạo ở đây bằng JavaScript -->
            </div>
            <div class="info-box-custom" id="infoBox">
                Quý khách có cửa nhôm bị hỏng có thể nhấc máy lên gọi theo số HOTLINE: Mr Hiếu 0977 577 116. Thợ sửa
                chữa cửa nhôm của Sao Việt tiếp nhận yêu cầu của khách hàng ngay lập tức và sẽ đến ngay địa chỉ khách
                hàng trong 15 phút kể từ khi nhận yêu cầu.
            </div>
        </div>
    </div>

    <script>
        const buttonContainer = document.getElementById("buttonContainer");
        const infoBox = document.getElementById("infoBox"); // Lấy phần hiển thị thông tin

        // Danh sách tiêu đề nút và thông tin mô tả tương ứng
        const steps = [
            {
                title: "TIẾP NHẬN NHU CẦU THI CÔNG BÁO GIÁ NHÔM KÍNH",
                description: "Quý khách có cửa nhôm bị hỏng hoặc cần lắp đặt có thể nhấc máy lên gọi theo số HOTLINE: Mr Long 0909 179 579. Thợ sửa chữa cửa nhôm của Nhất Kim WINDOW tiếp nhận yêu cầu của khách hàng ngay lập tức và sẽ đến ngay địa chỉ khách hàng trong 30 phút kể từ khi nhận yêu cầu."
            },
            {
                title: "TƯ VẤN, ĐO ĐẠC VÀ KHẢO SÁT TRỰC TIẾP",
                description: "Chuyên gia của chúng tôi sẽ đến tận nơi để tư vấn, đo đạc kích thước, khảo sát vị trí lắp đặt nhằm đảm bảo chất lượng tối ưu nhất cho quý khách."
            },
            {
                title: "THIẾT KẾ BẢN VẼ KỸ THUẬT VỚI PHƯƠNG ÁN CHI PHÍ TỐT NHẤT",
                description: "Chúng tôi sẽ cung cấp bản vẽ chi tiết và phương án thi công với mức chi phí hợp lý nhất, đảm bảo tính thẩm mỹ và bền vững."
            },
            {
                title: "BÓC TÁCH VẬT LIỆU TỪ BẢN VẼ",
                description: "Sau khi có bản vẽ, đội ngũ kỹ thuật sẽ thực hiện bóc tách vật liệu, tính toán số lượng nguyên vật liệu cần thiết để chuẩn bị cho quá trình thi công."
            },
            {
                title: "CHỐT PHƯƠNG ÁN THI CÔNG & KÝ HỢP ĐỒNG",
                description: "Chúng tôi cùng khách hàng thống nhất phương án thi công, tiến hành ký hợp đồng để đảm bảo quyền lợi đôi bên."
            },
            {
                title: "CHUẨN BỊ VẬT TƯ KÍNH CƯỜNG LỰC & PHỤ KIỆN",
                description: "Chúng tôi tiến hành đặt hàng và chuẩn bị các vật tư cần thiết như kính cường lực, phụ kiện, đảm bảo đúng tiêu chuẩn chất lượng."
            },
            {
                title: "VẬN CHUYỂN VẬT TƯ ĐẾN CÔNG TRÌNH",
                description: "Toàn bộ vật tư sẽ được vận chuyển đến địa điểm thi công theo lịch trình đã thỏa thuận với khách hàng."
            },
            {
                title: "THI CÔNG LẮP ĐẶT CÔNG TRÌNH",
                description: "Đội ngũ kỹ thuật tiến hành lắp đặt chuyên nghiệp, đúng tiến độ và đảm bảo chất lượng công trình."
            },
            {
                title: "HOÀN THÀNH THI CÔNG VÀ LẬP HỒ SƠ NGHIỆM THU",
                description: "Sau khi hoàn thành, chúng tôi sẽ lập hồ sơ nghiệm thu để khách hàng kiểm tra chất lượng công trình."
            },
            {
                title: "BÀN GIAO CÔNG TRÌNH, THỰC HIỆN BẢO HÀNH ĐỊNH KỲ VÀ BẢO TRÌ",
                description: "Cuối cùng, công trình được bàn giao, chúng tôi thực hiện bảo hành định kỳ để đảm bảo công trình luôn bền đẹp."
            }
        ];

        // Tạo các nút
        steps.forEach((step, index) => {
            const button = document.createElement("button");
            button.textContent = `${index + 1}. ${step.title}`;
            // Hiển thị nội dung bước 1 ngay khi vào trang
            infoBox.innerHTML = `<strong>1. ${steps[0].title}</strong><br>${steps[0].description}`;

            // Khi bấm vào nút, hiển thị thông tin chi tiết
            button.addEventListener("click", () => {
                infoBox.innerHTML = `<strong>${index + 1}. ${step.title}</strong><br>${step.description}`;
            });



            // Khi di chuột vào nút, hiển thị thông tin tạm thời
            button.addEventListener("mouseover", () => {
                infoBox.innerHTML = `<strong>${index + 1}. ${step.title}</strong><br>${step.description}`;
            });


            buttonContainer.appendChild(button);
        });


    </script>
</body>

</html>